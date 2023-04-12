<?php

namespace System\Error;

class ErrorDisplay
{
    const ERROR_DISPLAY = true;

    private function displayError($displayError)
    {
        if ($displayError) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
    }

    public function setErrorReporting()
    {
        $this->displayError(self::ERROR_DISPLAY);
    }
}