<?php

function nearestPossible($ca, $cb)
{
    $graph = [
        [4, 3, 2, 3, 2, 3, 2, 3, 4],
        [3, 2, 3, 2, 3, 2, 3, 2, 3],
        [2, 3, 4, 1, 2, 1, 4, 3, 2],
        [3, 2, 1, 2, 3, 2, 1, 2, 3],
        [2, 3, 2, 3, 0, 3, 2, 3, 2],
        [3, 2, 1, 2, 3, 2, 1, 2, 3],
        [2, 3, 4, 1, 2, 1, 4, 3, 2],
        [3, 2, 3, 2, 3, 2, 3, 2, 3],
        [4, 3, 2, 3, 2, 3, 2, 3, 4]
    ];
    $res = $graph[$ca + 4][$cb + 4];
    return $res;
}

function nextstep($A, $B, $a, $b)
{
    if (($A - $a) > ($B - $b)) {
        $a += 2;
        $b = ($B == $b ? $b - 1 : $b + 1);
    } else {
        $a = ($A == $a ? $a - 1 : $a + 1);
        $b += 2;
    }
    return [$a, $b];
}

function solution($A, $B)
{
    $A = abs(intval($A));
    $B = abs(intval($B));
    if ($A == 0 && $B == 0) {
        return 0;
    }
    if ($A > 100000000 || $B > 100000000) {
        return -1;
    }
    $moves = 0;
    $a = 0;
    $b = 0;
    while (1 == 1) {
        $absA = abs($A - $a);
        $absB = abs($B - $b);
        //echo $a, ":", $b, "<br>";
        if ($absA < 5 && $absB < 5) {
            //echo "$A:$B:$a:$b:$absA:$absB:nearest<br>";
            $moves += nearestPossible($absA, $absB);
            return $moves;
        }
        //list($a, $b) = nextstep($A, $B, $a, $b);
        if (($A - $a) > ($B - $b)) {
            $a += 2;
            $b = ($B == $b ? $b - 1 : $b + 1);
        } else {
            $a = ($A == $a ? $a - 1 : $a + 1);
            $b += 2;
        }
        $moves++;
        if ($moves > 100000000) {
            return -2;
        }
    }
    return $moves;
}

$a = microtime(true);

echo solution(10000000, 10000000);
echo "<br>" . (microtime(true) - $a) . " msec";
