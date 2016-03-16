<?php
$_fp = fopen("php://stdin", "r");
fscanf($_fp, "%d", $times);
for ($i = 0; $i < $times; $i++) {
    fscanf($_fp, "%s", $str1);
    fscanf($_fp, "%s", $str2);
    $srt1a = str_split($str1);
    $srt2a = str_split($str2);
    echo count(array_intersect($srt1a, $srt2a)) ? "YES" . PHP_EOL : "NO" . PHP_EOL;

}