<?php

/*$handle = fopen("php://stdin", "r");
fscanf($handle, "%d", $h);
fscanf($handle, "%d", $m);*/

$h = intval($h);
$m = intval($m);
$dict = [
    1  => 'one',
    2  => 'two',
    3  => 'three',
    4  => 'four',
    5  => 'five',
    6  => 'six',
    7  => 'seven',
    8  => 'eight',
    9  => 'nine',
    10 => 'ten',
    11 => 'eleven',
    12 => 'twelve',
    13 => 'thirteen',
    14 => 'fourteen',
    15 => 'fifteen',
    16 => 'sixteen',
    17 => 'seventeen',
    18 => 'eighteen',
    19 => 'nineteen',
    20 => 'twenty',
    21 => 'twenty one',
    22 => 'twenty two',
    23 => 'twenty three',
    24 => 'twenty four',
    25 => 'twenty five',
    26 => 'twenty six',
    27 => 'twenty seven',
    28 => 'twenty eight',
    29 => 'twenty nine'
];
$h = 5;
for ($m = 0; $m < 60; $m++) {
    if ($m == 0) {
        echo $dict[$h] . " o' clock";
    } elseif ($m == 15) {
        echo "quarter past " . $dict[$h];
    } elseif ($m == 30) {
        echo "half past " . $dict[$h];
    } elseif ($m == 45) {
        echo "quarter to " . $dict[$h + 1];
    } else if ($m > 30) {
        if ($h == 12) $h = 0;
        echo $dict[60 - $m] . " minute" . (60 - $m == 1 ? "" : "s") . " to " . $dict[$h + 1];
    } else {
        echo $dict[$m] . " minute" . ($m == 1 ? "" : "s") . " past " . $dict[$h];
    }
    echo PHP_EOL;
}