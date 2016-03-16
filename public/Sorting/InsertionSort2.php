<?php

function sortOne(&$ar, $which)
{
    $ins = $ar[$which];
    $pos = $which+1;
    for ($i = 1; $i < $pos + 1; $i++) {
        if ($ar[$pos - $i - 1] > $ins) {
            $ar[$pos - $i] = $ar[$pos - $i - 1];
        } elseif ($ar[$pos - $i - 1] <= $ins) {
            $ar[$pos - $i] = $ins;
            echo implode(" ", $ar) . PHP_EOL;
            return ;
        }
    }
}
function  insertionSort2($ar)
{
    for ($i= 1; $i < count($ar); $i++){
        sortOne($ar,$i);
    }
}

if (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] == 'development') {
    $temp = "1 4 3 5 6 2";
} else {
    $fp = fopen("php://stdin", "r");
    fscanf($fp, "%d", $m);
    $temp = fgets($fp);
}
$arr = explode(' ', $temp);

for ($i = 0; $i < $m; $i++) {
    $arr[$i] = (int)$arr[$i];
}
insertionSort2($arr);


