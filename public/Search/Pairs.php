<?php
/* Head ends here */
function pairs($a, $k)
{
    $keeper = [];
    $countA = count($a);
    for ($i = 0; $i < $countA; $i++) {
        for ($j = 0; $j < $countA; $j++) {
            if ($k == ($ak = abs($a[$i] - $a[$j]))) {
                $keeper[min($i, $j) . max($i, $j)] = $ak;
            }
        }
    }
    return count($keeper);
}

/* Tail starts here */
$__fp = fopen("php://stdin", "r");

fscanf($__fp, "%d %d", $_a_cnt, $_k);
$_a = trim(fgets($__fp));

$_a = split(' ', $_a);
$res = pairs($_a, $_k);
echo "$res\n";

?>
