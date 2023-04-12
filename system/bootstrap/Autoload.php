<?php

namespace System\Bootstrap;

class Autoload
{
    public function boot()
    {
        spl_autoload_register(function ($className) {
            $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
            $className = BASE_PATH . DIRECTORY_SEPARATOR . $className . ".php";
            if (!file_exists($className) && !is_readable($className))
                echo "Could not load class " . $className;
            require_once $className;
        });
    }
}
