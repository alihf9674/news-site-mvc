<?php

namespace System\Session;

class Session
{
    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get($name)
    {
        return $_SESSION[$name] ?? false;
    }

    public function unset($name)
    {
        if (isset($_SESSION[$name]))
            unset($_SESSION[$name]);
    }

    public static function __callStatic($name, $parameters)
    {
        $instance = new self();
        return call_user_func_array([$instance, $name], $parameters);
    }
}