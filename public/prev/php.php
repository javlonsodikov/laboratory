<?php

/*echo(4 ^ 3);
echo '::';
echo(5 ^ 6);
echo '::';
echo(7 ^ 3);
//echo 2 ^ 15;
/*

function xorIt($arr)
{
    if (count($arr) == 2) return $arr[0] ^ $arr[1];
    for ($i = 0; $i < count($arr); $i = $i + 2) {
        $_arr[] = $i ^ ($i + 1);
    }
    //print_r($_arr);
    if (count($_arr) == 1) return $_arr[0];

    return xorIt($_arr);
}

function solution($M, $N)
{
    $M = intval($M);
    $N = intval($N);
    if ($M > $N || $M < 0 || $N < 0 || $M > 1000000000 || $N > 1000000000) return;
    for ($i = $M; $i < $N; $i = $i + 2) {
        $arr[] = $i ^ ($i + 1);
    }
    return xorIt($arr);
}*/

function isAssoc($arr)
{
    return array_keys($arr) !== range(0, count($arr) - 1);
}


function solution($A) {
    if (isAssoc($A)) {
        echo "yes";
        $A = array_values($A);
    }
    $A = array_map(function($a){
        return intval($a);
    },$A);
    $pairs=0;
    for($k=0;$k<count($A);$k++)
    {
        for($i=$k+1;$i<count($A);$i++)
        {
            if ($A[$k]==$A[$i]) $pairs++;
        }
    }
    return $pairs;
}

solution([2,3,4,2,3,2]);

