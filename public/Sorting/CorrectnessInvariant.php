<?php
function insertionSort(&$arr)
{
    for ($i = 1; $i < count($arr); $i++) {
        $val = $arr[$i];
        $j = $i - 1;
        while ($j >=0 && $arr[$j] > $val) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }
        $arr[$j + 1] = $val;
       // echo implode(" ", $arr) . PHP_EOL;
    }
}

if (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] == 'development') {
    $temp = "4 1 3 5 6 2";
    $arr = explode(' ', $temp);
} else {
    $handle = fopen("php://stdin", "r");
    $t = fgets($handle);
    $arr = explode(' ', fgets($handle));
}

insertionSort($arr);
foreach ($arr as $value) {
    print $value . " ";
}

