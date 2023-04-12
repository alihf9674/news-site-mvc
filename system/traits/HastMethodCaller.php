<?php

namespace System\Traits;

trait HastMethodCaller
{
    public static function __callStatic($method, $arguments)
    {
        $className = get_called_class();
        $instance = new $className;
        return $instance->methodCaller($instance, $method, $arguments);
    }

    private function methodCaller($object, $method, $arguments)
    {
        $suffix = 'Method';
        $methodName = $method . $suffix;
        return call_user_func_array(array($object, $methodName), $arguments);
    }

}