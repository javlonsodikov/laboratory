<?php
$maxPrimeNumber = 1000000;
$primes = array(2);
for ($x = 3; $x <= $maxPrimeNumber; $x+=2) {
    $isPrime = true;
    $sqrtX = sqrt($x);
    foreach ($primes as $prime) {
        if ($prime > $sqrtX) {
            break;
        } elseif (!($x % $prime)) {
            $isPrime = false;
            break;
        }
    }
    if ($isPrime) $primes[] = $x;
}

for ($i = 0; $i < count($primes); $i++) {
    $a = str_split($primes[$i]);
    sort($a);
    $sorted = implode("", $a);
    if (!isset($pp[$sorted])) $pp[$sorted] = [];
    $pp[$sorted][] = $primes[$i];
}

foreach ($pp as $item) {
    if (count($item) > 1)
        echo implode(" ", $item) . PHP_EOL;
}