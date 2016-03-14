<?php

$Test_String="hhhhaaaaaacckkkkk";
$Regex_Pattern="/^([h]).*([a]).*([c]).*([k]).*$/";

if(preg_match($Regex_Pattern, $Test_String, $output_array)){
    print ("true");
} else {
    print ("false");
}
print_r($output_array);