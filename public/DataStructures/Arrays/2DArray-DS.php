<?php

$handle = fopen ("php://stdin","r");
$arr = array();
$arr_i=0;
while($arr_temp =  fgets($handle))
{
    $arr[] = explode(" ",$arr_temp);
    array_walk($arr[$arr_i++],'intval');
}
//print_r($arr);

$maxhourglass=-10000000000;
for($i=1;$i<count($arr)-1;$i++){
    for($j=1;$j<count($arr[0])-1;$j++){
        /*if (
              $arr[$i][$j-1]==0 && $arr[$i][$j+1]==0
           )*/
        {
            $hourglass=
                $arr[$i-1][$j-1] + $arr[$i-1][$j] + $arr[$i-1][$j+1] +
                $arr[$i][$j]+
                $arr[$i+1][$j-1] + $arr[$i+1][$j] + $arr[$i+1][$j+1];

            /*echo (int)$arr[$i-1][$j-1]. " ". (int)$arr[$i-1][$j]. " ". (int)$arr[$i-1][$j+1] . " ".PHP_EOL
                ."  " . (int)$arr[$i][$j]. " " . PHP_EOL.
            (int)$arr[$i+1][$j-1] . " ". (int)$arr[$i+1][$j] . " ". (int)$arr[$i+1][$j+1].PHP_EOL.PHP_EOL;*/

            if ($maxhourglass<$hourglass) $maxhourglass =$hourglass;
        }


    }
}
echo $maxhourglass;

