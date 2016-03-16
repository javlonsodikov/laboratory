<?php

function quicksort(&$A, $lo, $hi)
{
    if ($lo < $hi) {
        $p = partition($A, $lo, $hi);
        quicksort($A, $lo, $p - 1);
        quicksort($A, $p + 1, $hi);
    }
}

function partition(&$A, $lo, $hi)
{
    $pivot = $A[$hi];
    $i = $lo;        // place for swapping
    for ($j = $lo; $j < ($hi); $j++) {
        if ($A[$j] <= $pivot) {
            list($A[$i], $A[$j]) = array($A[$j], $A[$i]);
            $i = $i + 1;
        }
    }
    list($A[$i], $A[$hi]) = array($A[$hi], $A[$i]);
    echo implode(" ", $A) . PHP_EOL;
    return $i;
}

if (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] == 'development') {
    $temp = "1 3 9 8 2 7 5";
    $ar = explode(' ', $temp);
} else {
    $fp = fopen("php://stdin", "r");
    fscanf($fp, "%d", $m);
    $ar = explode(' ', trim(fgets($fp)));
}

quicksort($ar, 0, count($ar) - 1);
