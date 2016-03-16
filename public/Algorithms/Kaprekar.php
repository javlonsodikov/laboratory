<?php
$kplow = 0;
$kphigh = 300000;
for ($i = $kplow; $i < $kphigh; $i++) {
    if ($i== 1) echo "1 ";
    $kp = ($i * $i) . "";
    //echo $kp . PHP_EOL;
    for ($j = 1; $j < strlen($kp); $j++) {
        //echo $kp . " " . substr($kp, 0, $j) . ":" . substr($kp, $j) . PHP_EOL;
        $l = intval(substr($kp, 0, $j));
        $r = intval(substr($kp, $j));
        if ($l + $r == $i && $l != 0 && $r != 0) {
            echo $i . " ";
            continue;
        }
    }
}