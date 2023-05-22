<?php

namespace Application\Controllers\Admin;

use Application\Controllers\Controller;
use System\Auth\Auth;

class Admin extends Controller
{
    public function __construct()
    {
        Auth::check();
        if(Auth::user()->user_type != 'admin') {
            $this->redirect('login');
            exit;
        }
    }
}