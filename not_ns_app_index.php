<?php
define('APPLICATION_PATH', dirname(__FILE__));

require APPLICATION_PATH . '/not_ns_app/library/common.php';

$application = new Yaf_Application(APPLICATION_PATH . "/conf/not_ns_app.ini");

$application->bootstrap()->run();
?>
