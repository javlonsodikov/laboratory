<?php
/**
 * Created by PhpStorm.
 * User: GPS
 * Date: 16.02.2016
 * Time: 13:27
 */

explode()
$sum = 6;
$cost = 1;
$wrappersRequired = 2;

$chocolates = (int)floor($sum / $cost);

$moreChocolates = (int)floor($chocolates / $wrappersRequired);
$mod = 0;
if ($chocolates >= $wrappersRequired) {
    $mod = $chocolates % $wrappersRequired;
}
if (($moreChocolates + $mod) >= $wrappersRequired) $moreChocolates++;
//echo $chocolates . "+" . $moreChocolates . " : " . $mod . "\n";
echo ($chocolates+$moreChocolates);
