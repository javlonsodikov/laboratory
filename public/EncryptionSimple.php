<?php

//$handle = fopen ("php://stdin","r");
//fscanf($handle,"%s",$s);
$s = "have a nice day";
$s = str_replace(" ", "", $s);
$len = strlen($s);
$sq = sqrt($len);
$row = (int)floor($sq);
$col = (int)ceil($sq);
if ($row * $col < $len) $row++;
//echo "$row $col". PHP_EOL;
for ($i = 0; $i < $row; $i++) {
    $words[$i] = substr($s, $i * $col, $col);
}
for ($c = 0; $c < strlen($words[0]); $c++) {
    for ($r = 0; $r < count($words); $r++) {
        echo @$words[$r][$c];
    }
    echo " ";
}