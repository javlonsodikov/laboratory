<?php

spl_autoload_register(function ($class) {
    include $class . '.php';

});

use My\Classi\MyClass;

$a = new MyClass();
