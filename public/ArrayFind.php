<?php
/**
 * @param $number
 * @return mixed
 */
function findInArray($number)
{
    $data = [1, 8, 16, 41, 76, 89, 91, 105, 106, 117, 119, 225, 546, 768, 897, 1000, 1100, 1540];
//            0  1  2   3   4   5   6   7    8   9    10   11   12   13   14   15    16    17

    $lo = 0;
    $hi = count($data) - 1;

    while ($lo < $hi) {
        $middle = (int)(round(($lo + $hi) / 2));
        //echo "middle:" . $middle . PHP_EOL;
        if ($data[$middle] < $number) {
            $lo = $middle;
            //echo "Lo:" . $middle . PHP_EOL;
        } elseif ($data[$middle] > $number) {
            $hi = $middle-1;
            //echo "High:" . $middle . PHP_EOL;
        } else {
            //return $data[$middle];
            return $middle;
        }
    }
    return -1;
}

echo findInArray(2000);