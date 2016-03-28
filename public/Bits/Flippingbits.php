<?php
$_fp = fopen("php://stdin", "r");
fscanf($_fp, "%d",$times);
while($times--){

    fscanf($_fp, "%d", $n);
    $val = base_convert($n, 10, 2);
    $an =(str_pad($val,32,"0", STR_PAD_LEFT));
    $a=str_replace("0","2", $an);
    $a=str_replace("1","0", $a);
    $a=str_replace("2","1", $a);
    //echo $an ." ". $a." ". base_convert($a, 2, 10).PHP_EOL;
    echo base_convert($a, 2, 10).PHP_EOL;
}