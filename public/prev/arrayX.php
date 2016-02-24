<?php
function solution($X, $A)
{
    $count = count($A);
    $equal = 0;
    $notEqual = 0;
    for ($i = 0; $i < $count; $i++) {
        if ($A[$i] != $X) {
            $equal++;
        }
    }

    for ($k = 0; $k <= $count + 1; $k++) {
        if ($k == 0 || $k == $count + 1) {
            if ($equal == 0) {
                return $k;
            }
        } else if ($k <= $count) {
            if ($A[$k - 1] == $X) {
                $notEqual++;
            } else {
                $equal--;
            }
            if ($equal == $notEqual) {
                return $k;
            }
        }
    }
}

echo solution(2,[5,5,2,7,2,3,2,5]);