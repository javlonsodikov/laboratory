<?php
function isSorted($ar)
{
    $prev = 0;
    $start = false;
    foreach ($ar as $item) {
        if (!$start) {
            $start = true;
            $prev = $item;
            continue;
        }
        if ($item < $prev) return false;
        $prev = $item;
    }
    return true;
}

function insertionSort($ar)
{
    $ins = $ar[count($ar) - 1];
    $count = count($ar);
    if (isSorted($ar)) {
        echo implode(" ", $ar) . PHP_EOL;
        exit;
    }
    $o = 0;
    for ($i = 1; $i < $count + 1; $i++) {
        if ($ar[$count - $i - 1] > $ins) {
            $ar[$count - $i] = $ar[$count - $i - 1];
        } elseif ($ar[$count - $i - 1] <= $ins) {
            $ar[$count - $i] = $ins;
            echo implode(" ", $ar) . PHP_EOL;
            exit;
        }
        echo implode(" ", $ar) . PHP_EOL;
    }
}

if (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] == 'development') {
    $s = "2 3 4 5 6 7 8 9 10 1";
} else {
    $fp = fopen("php://stdin", "r");
    fscanf($fp, "%d", $m);
    $ar = array();
    $s = fgets($fp);
}
$ar = explode(" ", $s);
for ($i = 0; $i < count($ar); $ar[$i++] += 0) ;
insertionSort($ar);

