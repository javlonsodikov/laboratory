<?php
$_fp = fopen("php://stdin", "r");
//$_fp = fopen("missing_numbers_input01.txt", "r");
fscanf($_fp, "%d", $A);
$AA = explode(" ", trim(fgets($_fp)));
fscanf($_fp, "%d", $B);
$BB = explode(" ", trim(fgets($_fp)));

$a = array_count_values($AA);
$b = array_count_values($BB);

//echo implode(" ", $a) . PHP_EOL;
//echo implode(" ", $b);
$s = [];
foreach ($b as $key => $val) {
    if ($key=="3731")
    {
        echo "";
    }
    if (isset($a[$key]) && intval($b[$key]) != intval($a[$key])) {
        $s[$key] = $b[$key] - $a[$key];
    } else if (!isset($a[$key])) {
        $s[$key] = $b[$key];
    }
}
//print_r($s);
$keys = array_keys($s);
//print_r($keys);
sort($keys);
echo implode(" ", $keys);
