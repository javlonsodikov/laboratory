<?php

$d1 = 9;
$m1 = 6;
$y1 = 2015;


$d2 = 6;
$m2 = 6;
$y2 = 2015;

$dateLate = strtotime("$d1-$m1-$y1 00:00:00");
$dateExpected = strtotime("$d2-$m2-$y2 00:00:00");
echo date("d-m-Y", $dateLate);
echo PHP_EOL;
echo date("d-m-Y", $dateExpected);

if ($dateExpected >= $dateLate) {
    echo 0;
    exit;
}

 //If same calendar month
if (date("m", $dateExpected) == date("m", $dateLate) && date("Y", $dateExpected) == date("Y", $dateLate)) {
    $days = date("d", $dateLate) - date("d", $dateExpected);
    echo $days * 15;
    exit;
}

//if same calendar year
if (date("Y", $dateExpected) == date("Y", $dateLate)) {
    $month = date("m", $dateLate) - date("m", $dateExpected);
    echo $month * 500;
    exit;
}

//if same calendar year
if (date("Y", $dateExpected) < date("Y", $dateLate)) {
    echo 10000;
    exit;
}



