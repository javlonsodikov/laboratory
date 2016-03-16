<?php
function  quickSort($ar)
{
    $pivot = $ar[0];
    $left = [];
    $right = [];
    for ($i = 1; $i < count($ar); $i++) {
        if ($pivot < $ar[$i]) $right[] = $ar[$i];
        if ($pivot > $ar[$i]) $left[] = $ar[$i];
    }
    if (count($left) > 1) $left = quickSort($left);
    if (count($right) > 1) $right = quickSort($right);
    echo trim(implode(" ", $left) . " $pivot " . implode(" ", $right)) . PHP_EOL;
    return array_merge($left, (array)$pivot, $right);
}

if (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] == 'development') {
    $temp = "5 8 1 3 7 9 2";
    $ar = explode(' ', $temp);
} else {
    $fp = fopen("php://stdin", "r");
    fscanf($fp, "%d", $m);
    $ar = explode(' ', trim(fgets($fp)));
}

quickSort($ar);
