<?php

namespace System\Traits;

trait HasSetFlashMessage
{
    protected function setWarningFlashMessage(string $message, string $redirect_route = null)
    {
        flash('error', $message);
        if (is_null($redirect_route)) {
            $this->back();
            die;
        }
        $this->redirect($redirect_route);
        die;
    }

    protected function setSuccessFlashMessage(string $message, string $redirect_route = null)
    {
        flash('success', $message);
        if (is_null($redirect_route)) {
            $this->back();
            die;
        }
        $this->redirect($redirect_route);
        die;
    }
}