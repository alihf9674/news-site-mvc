<?php

namespace Application\Controllers\Auth;

use Application\Controllers\Controller;
use Application\Model\User;
use System\Auth\Auth;

class Login extends controller
{
    private array $formInput = ['user_email', 'password'];

    public function loginView()
    {
        return $this->view('auth.login');
    }

    public function login($request)
    {

        if (empty($request))
            $this->setWarningFlashMessage('فیلد ها باید پر شوند.');
        if (!isValidInput($request, $this->formInput))
            $this->setWarningFlashMessage('لطفا فیلد ها را به صورت صحیح وارد کنید.');
        if (strlen($request['password']) < 6)
            $this->setWarningFlashMessage('رمز عبور باید بیشتر از 6 کاراکتر باشد.');
        if (!filter_var($request['user_email'], FILTER_VALIDATE_EMAIL))
            $this->setWarningFlashMessage('لطفا فرمت ایمیل را به طور صحیح وارد کنید.');
        if (Auth::loginByEmail($request['user_email'], $request['password'])) {
            $user = User::findUserByEmail($request['user_email']);
            if ($user['permission'] == 'admin') {
                $this->redirect('admin');
            }

            $this->redirect('home');
        }
    }
}