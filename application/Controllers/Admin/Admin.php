<?php

namespace Application\Controllers\Admin;

use Application\Controllers\Controller;
use System\Auth\Auth;

class Admin extends Controller
{
    public function __construct()
    {
        Auth::check();
        if (Auth::user()['permission'] != 'admin') {
            $this->redirect('login');
            exit;
        }
    }
}