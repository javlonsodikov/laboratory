<?php
function find($number)
{
    $data = [1, 8, 16, 41, 76, 89, 91, 105, 106];
//       0  1  2   3   4   5   6   7    8

    $lo = 0;
    $hi = count($data) - 1;

    while ($lo <= $hi) {
        //$hi = $lo + $hi/2;
        $middle = (int)(floor($lo + $hi) / 2);
        if ($data[$middle] > $number) {
            $middle = ceil($middle / 2);
        } elseif ($data[$middle] < $number) {
            $middle = $middle + ceil($middle / 2);
        } else {
            return $data[$middle];
        }
    }
}

echo find(41);