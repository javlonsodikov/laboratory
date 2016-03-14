<?php
function insertionSort(&$arr)
{
    $count=0;
    for ($i = 1; $i < count($arr); $i++) {
        $val = $arr[$i];
        $j = $i - 1;
        while ($j >=0 && $arr[$j] > $val) {
            $arr[$j + 1] = $arr[$j];
            $j--;
            $count++;
        }
        $arr[$j + 1] = $val;
    }
    echo $count;
}

if (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] == 'development') {
    $temp = "2 1 3 1 2";
    $arr = explode(' ', $temp);
} else {
    $handle = fopen("php://stdin", "r");
    $t = fgets($handle);
    $arr = explode(' ', fgets($handle));
}

insertionSort($arr);
/*foreach ($arr as $value) {
    print $value . " ";
}*/