<?php
/**
 * Created by PhpStorm.
 * User: GPS
 * Date: 16.02.2016
 * Time: 15:07
 */
/*
$handle = fopen("php://stdin", "r");
fscanf($handle, "%d", $n);
$grid = array();
for ($grid_i = 0; $grid_i < $n; $grid_i++) {

    fscanf($handle, "%s", $grid[]);
}
*/

$grid[0] = '1112';
$grid[1] = '1912';
$grid[2] = '1892';
$grid[3] = '1234';
for ($o = 0; $o < count($grid); $o++) {
    $gridArray[] = str_split($grid[$o]);
}
function hasBorder($x, $y, &$grid)
{

    if ($x == 0 || $x == count($grid) - 1) {
        return true;
    }
    if ($y == 0 || $y == strlen($grid[$x]) - 1) {
        return true;
    }
    return false;
}

function checkHighest($number, $x, $y, &$grid)
{
    if (
        $number > $grid[$x - 1][$y]
        &&
        $number > $grid[$x + 1][$y]
        &&
        $number > $grid[$x][$y - 1]
        &&
        $number > $grid[$x][$y + 1]
    ) {
        return true;
    } else {
        return false;
    }
}



for ($x = 0; $x < count($grid); $x++) {
    for ($y = 0; $y < strlen($grid[$x]); $y++) {
        if (hasBorder($x, $y, $grid)) {
            //then nothing to do here
        } else {
            $max = max($gridArray[$x]);
            if (checkHighest($max, $x, $y, $grid)) {
                $grid[$x][$y] = "X";
            }
        }
        //echo $cursor($x, $y) . (hasBorder($x, $y, $grid) ? "|" : "");
    }
    //echo PHP_EOL;
}
foreach ($grid as $item) {
    echo $item . PHP_EOL;
}

