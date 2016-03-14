<?php
//$_fp = fopen("php://stdin", "r");
$_fp = fopen("input06.txt", "r");
fscanf($_fp, "%d", $times);
//echo $times . " " . $size . " " . $modulo . PHP_EOL;
for ($i = 0; $i < $times; $i++) {
    $a = fgets($_fp);
    list($size, $modulo) = explode(" ", $a);
    $modulo = trim($modulo);
    $a = fgets($_fp);
    $arr = explode(" ", $a);
    $keep = 0;

    for ($ii = 0; $ii < $size; $ii++) {
        $summ = 0;
        for ($jj = $ii; $jj < $size; $jj++) {
            //$summ += $arr[$jj];
            $summ = bcadd($summ, $arr[$jj]);
            $mod = bcmod($summ, $modulo);
            //$mod = fmod($summ, $modulo);
            if ($keep < $mod) $keep = $mod;
            //if ($modulo - 1 == $keep) break 2;
        }
    }
    echo $keep . PHP_EOL;
}
