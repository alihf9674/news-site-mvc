<?php

namespace System\Traits;

trait HasSetFlashMessage
{
    protected function setWarningFlashMessage(string $message)
    {
        flash('error', $message);
        $this->back();
        die;
    }
}