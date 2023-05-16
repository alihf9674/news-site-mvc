<?php

namespace Application\Controllers\Auth;

use Application\Controllers\Controller;
use Application\Model\User as UserModel;
use System\Services\Email\EmailService as Email;

class ForgotPassword extends Controller
{
    public function forgotPasswordView()
    {
        return $this->view('auth.forgot');
    }

    public function forgotPassword($request)
    {
        if (empty($request))
            $this->setWarningFlashMessage('فیلد ها باید پر شوند.');
        if (!filter_var($request['user_email'], FILTER_VALIDATE_EMAIL))
            $this->setWarningFlashMessage('لطفا فرمت ایمیل را به طور صحیح وارد کنید.');
        $user = UserModel::findUserByEmail($request['user_email']);
        if (is_null($user))
            $this->setWarningFlashMessage('کاربر با این ایمیل یافت نشد.');
        else {
            $token = $this->randomToken();
            $forgotMessage = $this->forgotMessage($user['username'], $token);
            $result = (new Email)->setSubject('ایمیل فراموشی رمز')
                ->setMessage($forgotMessage)
                ->send($request['user_email']);
            if ($result) {
                date_default_timezone_set('Asia/Tehran');
                UserModel::update('users', $user['id'], ['forgot_token', 'forgot_token_expire'],
                    [$token, date('Y-m-d H:i:s', strtotime('+15 minutes'))]);
                $this->setSuccessFlashMessage('عملیات با موفقیت انجام شد.','login');
            }
            $this->setWarningFlashMessage('ارسال ایمیل انجام نشد.');
        }
    }

    public function forgotMessage($username, $token): string
    {
        return '
        <h1>فعال سازی حساب کاربری</h1>
        <p>' . $username . ' برای فعال سازی حساب کاربری خود لطفا روی لینک زیر کلیک نمایید</p>
        <di><a href="' . $this->url('activation/' . $token) . '">فعال سازی حساب</a></di>
        ';
    }

    private function randomToken(): string
    {
        return bin2hex(openssl_random_pseudo_bytes(32));
    }
}