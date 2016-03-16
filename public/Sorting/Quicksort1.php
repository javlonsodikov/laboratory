<?php

function  partition( $ar) {
    $pivot =$ar[0];
    $left=[];
    $right=[];
    for($i=1;$i<count($ar);$i++){
        if ($pivot<$ar[$i]) $right[]=$ar[$i];
        if ($pivot>$ar[$i]) $left[]=$ar[$i];
    }
    echo implode(" ", $left) . " $pivot " . implode(" ", $right);
}

$fp = fopen("php://stdin", "r");

fscanf($fp, "%d", $m);
$ar = explode(' ', trim(fgets($fp)));

partition($ar);
