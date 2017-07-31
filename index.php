<?php

use Yaf\Application as YApplication;

define('APPLICATION_PATH', dirname(__FILE__));

require APPLICATION_PATH . '/application/library/common.php';

$application = new YApplication( APPLICATION_PATH . "/conf/application.ini");

$application->bootstrap()->run();
?>
