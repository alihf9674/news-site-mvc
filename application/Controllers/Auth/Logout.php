<?php

namespace Application\Controllers\Auth;

use Application\Controllers\Controller;
use System\Auth\Auth;

class Logout extends Controller
{
    public function logout()
    {
        Auth::logout();
        return $this->redirect('home');
    }
}