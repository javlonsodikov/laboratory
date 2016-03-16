<?php
$_fp = fopen("php://stdin", "r");
fscanf($_fp,"%d",$count);
for ($i=0;$i<$count;$i++)
{
    fscanf($_fp,"%s",$str);
    $stings[]=str_split($str);
}
$array=$stings[0];
for ($i=1;$i<$count;$i++){
    $array= array_intersect($array, $stings[$i]);
}
echo count($array);