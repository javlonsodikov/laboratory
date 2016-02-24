<?php

$magnifier = "2x";
$and = "super power";

/**
 * @return Closure
 */
function checkdelta()
{
    global $magnifier, $and;

    /**
     * @param $number
     * @return string
     */
    $delta = function ($number) use ($magnifier, $and) {
        return "delta:" . $number . " - " . $magnifier . " - " . $and;
    };
    return $delta;

}

$and = "ana";
$delta = checkdelta();
echo $delta(5);
