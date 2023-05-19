<?php

namespace System\Auth;

use Application\Model\User;
use System\Session\Session;
use System\Traits\HasSetFlashMessage;
use System\Traits\HasRedirect;
use System\Traits\HasMethodCaller;

class Auth
{
    use HasSetFlashMessage, HasRedirect, HasMethodCaller;

    private string $redirectTo = 'login';

    private function userMethod()
    {
        if (!Session::get('user'))
            return $this->redirect($this->redirectTo);
        $user = User::find(Session::get('user'));
        if (empty($user)) {
            Session::unset('user');
            return $this->redirect($this->redirectTo);
        } else
            return $user;
    }

    private function checkMethod()
    {
        if (!Session::get('user'))
            return $this->redirect($this->redirectTo);
        $user = User::find(Session::get('user'));
        if (empty($user)) {
            Session::remove('user');
            return $this->redirect($this->redirectTo);
        }
        return true;
    }

    private function ifCheckLoginMethod(): bool
    {
        if (!Session::get('user'))
            return false;
        $user = User::find(Session::get('user'));
        if (empty($user))
            return false;
        return true;
    }

    private function loginByEmailMethod($email, $password)
    {
        $user = User::findUserByEmail($email);
        if (empty($user))
            $this->setWarningFlashMessage('کاربری با این مشخصات یافت نشد.');
        if (password_verify($password, $user['password']) && $user['is_active'] == 1) {
            Session::set('user', $user['id']);
            return true;
        }
        $this->setWarningFlashMessage('کلمه عبور اشتباه است');
    }

    private function logoutMethod()
    {
        Session::remove('user');
    }

    private function ifLoginByIdMethod($id): bool
    {
        $user = User::find($id);
        if (empty($user)) {
            $this->setWarningFlashMessage('کاربر وجود ندارد');
            return false;
        } else {
            Session::set('user', $user->id);
            return true;
        }
    }

}