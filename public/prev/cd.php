<?php

function solution($A)
{
    $unpaired = [];
    while (count($A) != 1) {
        $i = 0;
        echo implode("", $A) . "\n";
        while (count($A) < 1 || count($A) >= $i) {
            $i++;
            echo "pairs:" . $A[0] . ":" . $A[$i] . "\n";
            if ($A[0] == $A[$i]) {
                unset($A[$i]);
                unset($A[0]);
                $A = array_values($A);
                //echo implode("",$A)."\n";
                continue 2;
            }
        }
        $unpaired[] = $A[0];
        array_shift($A);
    }

    return $A[0];
}

//solution([9, 3, 9, 3, 9, 7, 9]);

echo log10(100);
