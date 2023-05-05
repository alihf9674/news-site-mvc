<?php

namespace Application\Controllers\Auth;

use Application\Controllers\Controller;

class Login extends controller
{
    public function loginView()
    {
        return $this->view('auth/login');
    }
}