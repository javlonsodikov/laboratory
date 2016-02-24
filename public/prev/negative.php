<?php
function toNegativeBase($tnum, $base)
{
    $digits = array();
    $base = intval($base);
    while ($tnum != 0) {
        $tmp = $tnum;
        $tnum = intval($tmp / $base);
        $remainder = ($tmp % $base);
        if ($remainder < 0) {
            $remainder += abs($base);
            $tnum++;
        }
        array_unshift($digits, $remainder);
    }
    $digits = array_reverse($digits);
    return $digits;
}

function toDecimal($arr)
{
    $sum = 0;
    $i = 0;
    foreach ($arr as $ar) {
        $sum += $ar * pow(-2, $i);
        $i++;
    }
    return $sum;
}


function solution($A)
{
    if (!count($A)) {
        return [];
    }
    $todec = toDecimal($A);
    return toNegativeBase($todec * (-1), -2);
}

$number = [];
print_r(solution($number));