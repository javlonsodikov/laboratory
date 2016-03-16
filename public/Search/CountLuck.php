<?php
function changeTo(&$matrix, &$keeper, $fromId, $toId)
{
    //if ($toId == 0) return;
    $keeper[$toId] += $keeper[$fromId];
    unset($keeper[$fromId]);
    for ($i = 0; $i < count($matrix); $i++) {
        for ($j = 0; $j < count($matrix[0]); $j++) {
            if ($matrix[$i][$j]->id == $fromId) {
                $matrix[$i][$j]->id = $toId;
            }
        }
    }
}

function checkid(&$matrix, &$keeper, $x, $y)
{
    $oid = $matrix[$x][$y]->id;
    $id = $matrix[$x - 1][$y - 1]->id;
    $val = $matrix[$x - 1][$y - 1]->val;
    if ($val == 1 && $id != $oid) {
        changeTo($matrix, $keeper, $id, $oid);
    }
    $id = $matrix[$x][$y - 1]->id;
    $val = $matrix[$x][$y - 1]->val;
    if ($val == 1 && $id != $oid) {
        changeTo($matrix, $keeper, $id, $oid);
    }
    $id = $matrix[$x + 1][$y - 1]->id;
    $val = $matrix[$x + 1][$y - 1]->val;
    if ($val == 1 && $id != $oid) {
        changeTo($matrix, $keeper, $id, $oid);
    }
    $id = $matrix[$x - 1][$y]->id;
    $val = $matrix[$x - 1][$y]->val;
    if ($val == 1 && $id != $oid) {
        changeTo($matrix, $keeper, $id, $oid);
    }
    $id = $matrix[$x + 1][$y]->id;
    $val = $matrix[$x + 1][$y]->val;
    if ($val == 1 && $id != $oid) {
        changeTo($matrix, $keeper, $id, $oid);
    }
    $id = $matrix[$x - 1][$y + 1]->id;
    $val = $matrix[$x - 1][$y + 1]->val;
    if ($val == 1 && $id != $oid) {
        changeTo($matrix, $keeper, $id, $oid);
    }
    $id = $matrix[$x][$y + 1]->id;
    $val = $matrix[$x][$y + 1]->val;
    if ($val == 1 && $id != $oid) {
        changeTo($matrix, $keeper, $id, $oid);
    }
    $id = $matrix[$x + 1][$y + 1]->id;
    $val = $matrix[$x + 1][$y + 1]->val;
    if ($val == 1 && $id != $oid) {
        changeTo($matrix, $keeper, $id, $oid);
    }
}

if (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] == 'development') {

    $k[] = array(1, 1, 0, 0, 0);
    $k[] = array(0, 1, 1, 0, 0);
    $k[] = array(0, 0, 1, 0, 1);
    $k[] = array(1, 0, 0, 0, 1);
    $k[] = array(0, 1, 0, 1, 1);
    $matrix = [];
    for ($i = 0; $i < count($k); $i++) {
        $a = [];
        for ($j = 0; $j < count($k[0]); $j++) {
            $id = ($k[$i][$j] != 0 ? rand(10000, 99999) : 0);
            $keeper[$id] = 1;
            $a[] = (object)array("id" => $id, "val" => $k[$i][$j]);
        }
        $matrix[] = $a;
    }
    unset($id);
} else {
    $_fp = fopen("php://stdin", "r");
    fscanf($_fp, "%d", $x);
    fscanf($_fp, "%d", $y);
    for ($i = 0; $i < $x; $i++) {
        $a = [];
        foreach (explode(" ", trim(fgets($_fp))) as $val) {
            $id = ($val != 0 ? rand(10000, 99999) : 0);
            $keeper[$id] = 1;
            $a[] = (object)array("id" => $id, "val" => $val);
        }
        $matrix[] = $a;
    }
    unset($id);
}
$jump = 1;
for ($i = 0; $i < count($matrix); $i = $i + $jump) {
    for ($j = 0; $j < count($matrix[0]); $j = $j + $jump) {
        if ($matrix[$i][$j]->val == 1) {
            //$matrix[$i][$j]->id = uniqid();
            checkid($matrix, $keeper, $i, $j);
        }
    }
}
//print_r($matrix);
echo max($keeper);

