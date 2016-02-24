<?php

spl_autoload_register(function ($class) {
    echo $class;
    include $class . '.php';

});

use Javlon\Logger;

$a = new Logger();
$a->log("qale");