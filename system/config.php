<?php
require_once 'system/helpers/helpers.php';

define('BASE_PATH', dirname(__DIR__));
define('CURRENT_DOMAIN', currentDomain() .'/mvc-site/');
define('DB_HOST', 'localhost');
define('DB_NAME', 'site_mvc');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DISPLAY_ERROR', true);