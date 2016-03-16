<?php


/*$_fp = fopen("php://stdin", "r");

fscanf($_fp, "%d %d %d", $w, $h, $times);

for ($i = 0; $i < $w; $i++) {
    $str = fgets($_fp);
    $str=str_replace("\n",'',$str);
    $arr[] = explode(" ", $str);
}
*/


/* test 1
$times = 1;
$arr[] = [1, 2, 3, 4];
$arr[] = [5, 6, 7, 8];
$arr[] = [9, 10, 11, 12];
$arr[] = [13, 14, 15, 16];
*/

/*  test 2
$times = 2;
$arr[] = [1, 2, 3, 4, 5, 6];
$arr[] = [7, 8, 9, 10, 11, 12];
$arr[] = [13, 14, 15, 16, 17, 18];
$arr[] = [19, 20, 21, 22, 23, 24];
$arr[] = [25, 26, 27, 28, 29, 30];
$arr[] = [31, 32, 33, 34, 35, 36];
*/

//5 4 7
$times = 7;
/*  test 3 */
$arr[] = [1,  2,  3, 4];
$arr[] = [7,  8,  9, 10];
$arr[] = [13, 14, 15, 16];
$arr[] = [19, 20, 21, 22];
$arr[] = [25, 26, 27, 28];

$h = count($arr);
$w = count($arr[0]);

function levelRing(&$arr, $level)
{
    $_arr = [];
    $h = count($arr);
    $w = count($arr[0]);
    for ($i1 = 0 + $level; $i1 < $h - $level - 1; $i1++) {
        $_arr[] = $arr[$i1][$level];
    }

    for ($i2 = 0; $i2 < $w - $level * 2 - 1; $i2++) {
        $_arr[] = $arr[$h - $level - 1][$i2 + $level];
    }

    for ($i3 = 0; $i3 < $h - $level * 2 - 1; $i3++) {
        $_arr[] = $arr[$h - $i3 - $level - 1][$w - $level - 1];
    }

    for ($i4 = 0; $i4 < $w - $level * 2 - 1; $i4++) {
        $_arr[] = $arr[$level][$w - $i4 - $level - 1];
    }
    return $_arr;
}

function levelAssemble(&$ready, &$rings, $level)
{
    $h = count($ready);
    $w = count($ready[0]);
    for ($i1 = 0; $i1 < $h - $level * 2 - 1; $i1++) {
        $s = $rings[$level][$i1];
        $ready[$i1 + $level][$level] = $s ? $s : "f";
    }

    for ($i2 = 0; $i2 < $w - $level * 2 - 1; $i2++) {
        $s = $rings[$level][$i1 + $i2];
        $ready[$h - $level - 1][$i2 + $level] = $s ? $s : "s";
    }

    for ($i3 = 0; $i3 < $h - $level * 2 - 1; $i3++) {
        $s = $rings[$level][$i1 + $i2 + $i3];
        $ready[$h - $i3 - $level - 1][$w - $level - 1] = $s ? $s : "t";
    }

    for ($i4 = 0; $i4 < $w - $level * 2 - 1; $i4++) {
        /*if ($level == 1) {
            echo "-" . $i4 . "-" . $i1 . "," . $i2 . "," . $i3 . "," . $i4 . "-" . PHP_EOL;
        }*/
        $s = $rings[$level][$i1 + $i2 + $i3 + $i4];
        $ready[$level][$w - $i4 - $level - 1] = $s ? $s : "ff";
    }
}

//finding matrix depth
$min = ((int)min($h, $w) / 2);


for ($t = 0; $t < $min; $t++) {
    //extracting matrix ring
    $levels[$t] = levelRing($arr, $t);
    //rotating matrix
    for ($rotate = 0; $rotate < $times; $rotate++) {
        array_unshift($levels[$t], array_pop($levels[$t]));
    }
}

//print_r($levels);
$ready = $arr;
//print_r($ready);
//print_r($levels);
//assembling matrix back
for ($t = 0; $t < $min; $t++) {
    levelAssemble($ready, $levels, $t);
    //print_r($ready);
}
//print_r($ready);
foreach ($ready as $item) {
    echo implode(' ', $item) . PHP_EOL;
}

