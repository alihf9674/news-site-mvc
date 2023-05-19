<?php

namespace Application\Controllers\Auth;

use Application\Controllers\Controller;
use System\Services\Email\EmailService as Email;
use Application\Model\User as UserModel;
use System\Services\JWT\JWTService;

class Register extends Controller
{
    private array $formInput = ['username', 'user_email', 'password', 'confirm_password'];

    public function registerView()
    {
        return $this->view('auth.register');
    }

    public function registerStore($request)
    {
        if (empty($request))
            $this->setWarningFlashMessage('فیلد ها باید پر شوند.');
        if (!isValidInput($request, $this->formInput))
            $this->setWarningFlashMessage('لطفا فیلد ها را به صورت صحیح وارد کنید.');
        if (strlen($request['password']) < 6)
            $this->setWarningFlashMessage('رمز عبور باید بیشتر از 6 کاراکتر باشد.');
        if ($request['password'] !== $request['confirm_password'])
            $this->setWarningFlashMessage('تکرار رمز با رمز باید یکسان باشد.');
        if (!filter_var($request['user_email'], FILTER_VALIDATE_EMAIL))
            $this->setWarningFlashMessage('لطفا فرمت ایمیل را به طور صحیح وارد کنید.');

        $user = UserModel::findUserByEmail($request['user_email']);

        if ($user)
            $this->setWarningFlashMessage('کاربر با این ایمیل در سیستم ثبت شده است لطفا به صفحه ورود بروید.');
        else {
            $token = JWTService::JwtEncode([
                'iat' => $this->getCurrentTime(),
                'user_name' => $request['username'],
                'email' => $request['user_email']
            ]);
            $activationMessage = $this->activationMessage($request['username'], $token);
            $result = (new Email)->setSubject('ایمیل فعال سازی حساب کاربری')
                ->setMessage($activationMessage)
                ->send($request['user_email']);
            if ($result) {
                $request['verify_token'] = $token;
                $request['user_info'] = json_encode([
                    'email' => $request['user_email'],
                    'ip' => $this->getUserIpAddress(),
                    'user_agent' => $this->getUserAgent()
                ]);
                $request['password'] = $this->getPasswordHash($request['password']);
                unset($request['confirm_password']);
                UserModel::insert('users', array_keys($request), array_values($request));
                $this->redirect('login');
        }
                $this->setWarningFlashMessage('.ارسال ایمیل با خطا مواجه شد');
        }
    }

    public function activate($token)
    {
        $user = UserModel::findUserByToken($token);
        if (!$user)
            $this->setWarningFlashMessage('.توکن شما معتبر نمیباشد لطفا مجددا تلاش کنید', 'register');
        UserModel::update('users', $user['id'], ['is_active'], [1]);
        $this->setSuccessFlashMessage('حساب کاربری شما با موفقیت فعال شد.', 'login');
    }

    private function activationMessage($username, $token): string
    {
        return '
        <h1>فعال سازی حساب کاربری</h1>
        <p>' . $username . ' عزیز برای فعال سازی حساب کاربری خود لطفا روی لینک زیر کلیک نمایید</p>
        <di><a href="' . $this->url('activate/' . $token) . '">فعال سازی حساب</a></di>
        ';
    }

    private function getPasswordHash($password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    private function getCurrentTime(): int
    {
        return date('Y-m-d H:i:s');
    }

    private function getUserIpAddress()
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    private function getUserAgent()
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }
}
