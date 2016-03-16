<?php
function next_permutation($str)
{
    $arr = str_split($str);
    $arr = array_map(function ($e) {
        return ord($e);
    }, $arr);
    for ($ii = 0; $ii < count($arr) - 1; $ii++) {
        $pos = count($arr) - $ii - 1;
        if ($arr[$pos - 1] < $arr[$pos]) {
            list($arr[$pos], $arr[$pos - 1]) = array($arr[$pos - 1], $arr[$pos]);
            break;
        }
    }
    $arr = array_map(function ($e) {
        return chr($e);
    }, $arr);
    $strres = implode("", $arr);
    if ($str == $strres) {
        echo "no answer" . PHP_EOL;
    } else {
        echo $strres . PHP_EOL;
    }
}

if (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] == 'development') {
    $arr = unserialize('a:5:{i:0;s:2:"ab";i:1;s:2:"bb";i:2;s:4:"hefg";i:3;s:4:"dhck";i:4;s:4:"dkhc";}');
    foreach ($arr as $item) {
        next_permutation($item);
    }

} else {
    $_fp = fopen("php://stdin", "r");
    fscanf($_fp, "%d", $times);
    for ($i = 0; $i < $times; $i++) {
        fscanf($_fp, "%s", $str);
        next_permutation($str);
    }
}
