<?php
/*for ($i = 65; $i < 200; $i++) {
    echo chr($i).'';
}*/

$_fp = fopen("php://stdin", "r");
$a=fgets($_fp);
$a=preg_replace("/([^A-Za-z]+)/",'',$a);
$alpha = str_split("abcdefghijklmnopqrstuvwxyz");
$arr = array_unique(str_split(strtolower($a)));
if (array_diff($alpha, $arr)){
    echo "not pangram";
}
else {
    echo "pangram";
}