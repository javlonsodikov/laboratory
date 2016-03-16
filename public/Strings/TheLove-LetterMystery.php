<?php
$_fp = fopen("php://stdin", "r");
fscanf($_fp, "%d", $times);
for($i=0;$i<$times;$i++){
    fscanf($_fp, "%s", $str);
    $left = substr($str, 0, floor(strlen($str) / 2));
    $right = strrev(substr($str, ceil(strlen($str) / 2)));
    $leftArr = str_split($left);
    $rightArr = str_split($right);
    $count=0;
    for($o=0;$o<count($leftArr);$o++){
        //echo ord($leftArr[$o]) . PHP_EOL;
        $count+=abs(ord($leftArr[$o]) - ord($rightArr[$o]));
    }
    echo $count . PHP_EOL;
}