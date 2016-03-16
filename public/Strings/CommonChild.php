<?php
$str1 = "ABCD";
$str2 = "ABDC";
$str1Arr = array_combine(str_split($str1), str_split($str1));
$str2Arr = array_combine(str_split($str2), str_split($str2));
$count = 0;
foreach ($str1Arr as $key => $val) {
    if (isset($str2Arr[$key])) {
        unset($str1Arr[$key]);
        unset($str2Arr[$key]);
        $count++;
    }
}
echo $count;