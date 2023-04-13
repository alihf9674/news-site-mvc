<?php

namespace System\Session;

class SessionProvider
{
    public function boot()
    {
        session_start();
        if (isset($_SESSION['temporary_flash'])) unset($_SESSION['temporary_flash']);
        if (isset($_SESSION['temporary_error_flash'])) unset($_SESSION['temporary_error_flash']);
        if (isset($_SESSION['flash'])) {
            $_SESSION['temporary_flash'] = $_SESSION['flash'];
            unset($_SESSION['flash']);
        }
        if (isset($_SESSION['error_flash'])) {
            $_SESSION['temporary_error_flash'] = $_SESSION['error_flash'];
            unset($_SESSION['error_flash']);
        }
    }
}