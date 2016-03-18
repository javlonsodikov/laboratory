<?php

function xorIt($arr)
{
    if (count($arr) == 1) return $arr[0];
    $xor = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        $xor = $xor ^ $arr[$i];
    }
    return $xor;
}

if (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] == 'development') {
    $t = 1;
} else {
    $_fp = fopen("php://stdin", "r");
    fscanf($_fp, "%d", $t);

}
while ($t--) {
    if (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] == 'development') {
        $arr = array(4, 5, 7, 5);
        $arr = array(1, 2, 3, 4, 5);

    } else {
        fscanf($_fp, "%d", $len);
        $arr = explode(" ", trim(fgets($_fp)));
        $arr = array_map("intval", $arr);
    }
    $xor = "a";
    $arrcount = count($arr);
    for ($i = 1; $i < $arrcount + 1; $i++) {
        for ($j = 0; $j < $arrcount; $j++) {
            if ($arrcount >= $j + $i) {
                $subarr = array_slice($arr, $j, $i);
                $xored = xorIt($subarr);
                $xor = ($xor === "a" ? $xored : $xor ^ $xored);
            }
        }
    }
    echo $xor . PHP_EOL;
}