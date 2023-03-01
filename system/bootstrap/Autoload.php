<?php

namespace System\Bootstrap;

class Autoload
{
    public function Autoloader()
    {
        spl_autoload_register(function ($className) {
            $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
            $className = $className . ".php";
            if (file_exists($className)) {
                require_once $className;
            } else {
                echo "Could not load class " . $className;
            }
        });
    }
}
