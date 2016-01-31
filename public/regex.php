<?php

spl_autoload_register(function ($class) {
    include $class . '.php';
});

use Javlon\RegExp;

$a = new RegExp();

$a = var_export($a->validate("Qale dost", "/([a-zA-Z]+) ([a-zA-Z]+)/i"), true);
//echo $a;
$text = "some intersting Date and:-=_ time text with date ";
//echo preg_replace("/(date|time)/i", "<span class=\"datetime\"><b>$1</b></span>", $text);
//echo preg_match_all("/(Date|time)/i", $text, $matches, PREG_OFFSET_CAPTURE);
//var_dump($matches);
//echo preg_quote($text);
print_r(preg_split("/(\s|date)/ui", trim($text)));


$subject = 'Aaaaaa Bbb';
