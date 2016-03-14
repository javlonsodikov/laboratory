<?php
if (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] == 'development') {
    $t = 1;
} else {
    $fp = fopen("php://stdin", "r");
    fscanf($fp, "%d", $t);
}
for ($read = 0; $read < $t; $read++) {
    if (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] == 'development') {
        $numbers = "2 1 9 4 4 56 90 3";
        $sum = 8;
    } else {
        $sum = fgets($fp);
        $numbers_count = fgets($fp);
        $numbers = fgets($fp);
    }
    $arr = explode(" ", $numbers);
    for ($ii = 0; $ii < count($arr); $ii++) {
        for ($jj = 1; $jj < count($arr); $jj++) {
            if ($jj>$ii && $arr[$ii] + $arr[$jj] == $sum) {
                echo ($ii + 1) . " " . ($jj + 1) . PHP_EOL;
                continue 3;
            }
        }
    }
}
