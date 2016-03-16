<?php
$_fp = fopen("php://stdin", "r");
fscanf($_fp, "%d", $needle);
fscanf($_fp, "%d", $count);
$s =fgets($_fp);
$array=explode(" ", $s);
foreach($array as $key=>$val){
    if ($val==$needle)
    {
        echo $key;
    }
}