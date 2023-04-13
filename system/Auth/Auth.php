<?php

namespace System\Auth;

use Application\Model\User;
use System\Session\Session;

class Auth
{
    private string $redirectTo = '/login';
    const SUFFIX = 'Method';

    private function userMethod()
    {
        if (!Session::get('user'))
            return ($this->redirectTo);

        $user = User::find(Session::get('user'));
        if (empty($user)) {
            Session::unset('user');
            return ($this->redirectTo);
        } else
            return $user;
    }

    private function checkMethod(): bool|string
    {
        if (!Session::get('user'))
            return ($this->redirectTo);

        $user = User::find(Session::get('user'));
        if (empty($user)) {
            Session::remove('user');
            return ($this->redirectTo);
        } else
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
        $user = User::getUserByEmail('email', $email)->get();
        if (empty($user)) {
            return false;
        }

        if (password_verify($password, $user[0]->password) and $user[0]->is_active == 1) {
            Session::set('user', $user[0]->id);
            return true;
        } else
            error('login', 'کلمه عبور اشتباه است');
    }

    private function logOutMethod()
    {
        Session::remove('user');
    }

    private function ifLoginByIdMethod($id): bool
    {
        $user = User::find($id);
        if (empty($user)) {
            error('login', 'کاربر وجود ندارد');
            return false;
        } else {
            Session::set('user', $user->id);
            return true;
        }
    }

    public static function __callStatic($name, $arguments)
    {
        $instance = new self();
        return $instance->methodCaller($name, $arguments);
    }

    private function methodCaller($method, $arguments)
    {
        $methodName = $method . self::SUFFIX;
        return call_user_func_array(array($this, $methodName), $arguments);
    }
}