<?php

namespace Application\Controllers\Auth;

use Application\Controllers\Controller;
use Application\Model\User as UserModel;
use System\Services\JWT\JWTService;

class Register extends Controller
{
    private array $formInput = ['username', 'email', 'password', 'confirm_password'];

    public function registerView()
    {
        return $this->view('auth/register');
    }

    public function register($request)
    {
        if (empty($request))
            $this->setWarningFlashMessage('فیلد ها باید پر شوند.');
        if (!isValidInput($request, $this->formInput))
            $this->setWarningFlashMessage('لطفا فیلد ها را به صورت صحیح وارد کنید.');
        if (strlen($request['password']) < 6)
            $this->setWarningFlashMessage('رمز عبور باید بیشتر از 6 کاراکتر باشد.');
        if ($request['password'] !== $request['confirm_password'])
            $this->setWarningFlashMessage('تکرار رمز با رمز باید یکسان باشد.');
        if (!filter_var($request['email'], FILTER_VALIDATE_EMAIL))
            $this->setWarningFlashMessage('لطفا فرمت ایمیل را به طور صحیح وارد کنید.');

        $user = UserModel::getUserByEmail($request['email']);
        if (is_null($user))
            $this->setWarningFlashMessage('کاربر با این ایمیل در سیستم ثبت شده است لطفا به صفحه ورود بروید.');

    }
}