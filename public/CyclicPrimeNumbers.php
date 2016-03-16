<?php
$maxPrimeNumber = 1000000;

function primeNumbers($num)
{
    $primes = array();
    for ($x = 2; $x <= $num; $x++) {
        $xIsPrime = true;
        $sqrtX = sqrt($x);
        foreach ($primes as $prime) {
            if ($prime > $sqrtX) {
                break;
            } elseif (!($x % $prime)) {
                $xIsPrime = false;
                break;
            }
        }
        if ($xIsPrime) {
            $primes[] = $x;
        }
    }
    return $primes;
}

$pr = primeNumbers($maxPrimeNumber);

for ($i = 0; $i < count($pr); $i++) {
    $a = str_split($pr[$i]);
    sort($a);
    $sorted = implode("", $a);
    if (!isset($pp["$sorted"])) $pp["$sorted"] = [];
    $pp["$sorted"][] = $pr[$i];
}

foreach ($pp as $item) {
    if (count($item) > 1)
        echo implode(" ", $item) . PHP_EOL;
}
die;
