<?php
@session_start();
define('SYSTEM_ROOT', dirname(__FILE__) . '/');
define('ROOT', dirname(SYSTEM_ROOT) . '/');

date_default_timezone_set("PRC");

include_once(SYSTEM_ROOT . 'config.php');
require_once(SYSTEM_ROOT . 'db.class.php');

if(!DEBUG) error_reporting(0);
else error_reporting(E_ALL & ~E_NOTICE);



$DB = new DB($host, $user, $pwd, $dbname, $port);
if (!$DB) exit(mysqli_connect_error());
require_once(SYSTEM_ROOT . 'function.php');




