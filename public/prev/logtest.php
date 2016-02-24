<?php
require "../vendor/autoload.php";

use Monolog\Logger;


$log = new Logger("System");
$log->pushHandler(new \Monolog\Handler\StreamHandler("log.txt"), Logger::WARNING);
$log->pushHandler(new \Monolog\Handler\ErrorLogHandler(), Logger::WARNING);
$log->addAlert("Function", array("jopking", "hahah"));
$log->addError("title", ["sdsd"]);
