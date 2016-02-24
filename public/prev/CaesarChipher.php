<?php
/**
 * Created by PhpStorm.
 * User: GPS
 * Date: 16.02.2016
 * Time: 14:37
 */
$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);
fscanf($handle,"%s",$word);
fscanf($handle,"%d",$shift);
if ($n<1 || $n>100) {
    echo $word;
    exit;
}
if ($shift<0 || $shift>100){
    echo $word;
    exit;
}


$alphabetLower = 'abcdefghijklmnopqrstuvwxyz';
$alphabetUpper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$alphabetLowerArray = str_split($alphabetLower);
$alphabetUpperArray = str_split($alphabetUpper);
//65-90
//97-122

for ($pos = 0; $pos < strlen($word); $pos++) {
    if (!in_array($word[$pos], $alphabetLowerArray) && !in_array($word[$pos], $alphabetUpperArray)) continue;

    //Original code of char
    $code = ord($word[$pos]);

    //if char is lowercase process here
    if ($code > 64 && $code < 91) {
        if (($code + $shift) > 90) {
            $word[$pos] = chr(65 + ($code + $shift - 65) % strlen($alphabetLower));
        } else {
            $word[$pos] = chr($code + $shift);
        }
    }

    //if char is UPPERCASE process here
    if ($code > 96 && $code < 123) {
        if (($code + $shift) > 123) {
            //echo ($code + $shift -97) . " " . ($code + $shift - 97) % strlen($alphabetUpper) . PHP_EOL;
            $word[$pos] = chr(97 + ($code + $shift - 97) % strlen($alphabetUpper));
        } else {
            $word[$pos] = chr($code + $shift);
        }


    }

}
echo $word;
