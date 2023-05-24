<?php
require_once 'system/Session/SessionProvider.php';
require_once 'system/helpers/helpers.php';
require_once 'vendor/autoload.php';
require_once 'system/config.php';
require_once 'system/bootstrap/Autoload.php';
require_once 'system/Error/ErrorDisplay.php';
(new System\Session\SessionProvider())->boot();
(new \System\Bootstrap\Autoload())->boot();
(new \System\Error\ErrorDisplay())->setErrorReporting();
require_once BASE_PATH . '/routes/web/routes.php';
require_once BASE_PATH . '/routes/api/routes.php';