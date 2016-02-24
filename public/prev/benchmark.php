<?php
$p = array();
$i = 0;
$old = 0;
while ($i < 1000000000) {
    $p[] = $i++;
    if ($old != memory_get_peak_usage(true)) {
        echo $i, ":", memory_get_peak_usage(true) . "\r\n";
        $old = memory_get_peak_usage(true);
    }
}
