<?php
session_start();

require_once 'system/helpers/helpers.php';
require_once 'vendor/autoload.php';
require_once 'system/config.php';
require_once 'system/bootstrap/Autoload.php';

(new \System\Bootstrap\Autoload())->Autoloader();

require_once BASE_PATH . '/routes/web/routes.php';