<?php

namespace Application\Controllers\Auth;

use Application\Controllers\Controller;
use Application\Model\User as UserModel;

class ResetPassword extends Controller
{
    public function resetPasswordView($token)
    {
        return $this->view('auth.reset-password', compact('token'));
    }

    public function resetPassword($request, $token)
    {
        if (empty($request))
            $this->setWarningFlashMessage('فیلد ها باید پر شوند.');
        if (strlen($request['password']) < 6)
            $this->setWarningFlashMessage('رمز عبور باید بیشتر از 6 کاراکتر باشد.');
        $user = UserModel::findUserByForgotToken($token);
        if (!is_null($user)) {
            date_default_timezone_set('Asia/Tehran');
            if ($user['forgot_token_expire'] < date('Y-m-d H:i:s'))
                $this->setWarningFlashMessage('تاریخ توکن به اتمام رسیده است.');
            UserModel::update('users', $user['id'], ['password'], [$this->getPasswordHash($request['password'])]);
            $this->setSuccessFlashMessage('تغییر رمز با موفقیت انجام شد.', 'login');
        }
        $this->setWarningFlashMessage('کاربر یافت نشد.');
    }

    private function getPasswordHash($password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}