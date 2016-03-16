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

function checkid(&$matrix, &$keeper, $x, $y, &$hops)
{
    $oid = $matrix[$x][$y]->id;
    $jumps = 0;
    $id = $matrix[$x][$y - 1]->id;
    $val = $matrix[$x][$y - 1]->val;
    if ($val == 1 && $id != $oid) {
        jumpTo($matrix, $keeper, $id, $oid);
        $jumps++;
    }
    $id = $matrix[$x - 1][$y]->id;
    $val = $matrix[$x - 1][$y]->val;
    if ($val == 1 && $id != $oid) {
        jumpTo($matrix, $keeper, $id, $oid);
        $jumps++;
    }
    $id = $matrix[$x + 1][$y]->id;
    $val = $matrix[$x + 1][$y]->val;
    if ($val == 1 && $id != $oid) {
        jumpTo($matrix, $keeper, $id, $oid);
        $jumps++;
    }
    $id = $matrix[$x][$y + 1]->id;
    $val = $matrix[$x][$y + 1]->val;
    if ($val == 1 && $id != $oid) {
        jumpTo($matrix, $keeper, $id, $oid);
        $jumps++;
    }
    if ($jumps > 1) {
        $hops++;
        $matrix[$x][$y + 1]->jumps = $jumps;
    }
    return array($x, $y);
}

$matrix = [];
$entryX = -1;
$entryY = -1;
$exitX = -1;
$exitY = -1;
if (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] == 'development') {

    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", ".X.X......X")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", ".X*.X.XXX.X")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", ".XX.X.XM...")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "......XXXX.")));
    //print_r($k);

    for ($i = 0; $i < count($k); $i++) {
        $a = [];
        for ($j = 0; $j < count($k[0]); $j++) {
            $id = ($k[$i][$j] != 0 ? rand(10000, 99999) : 0);
            //$keeper[$id] = 1;
            $a[] = (object)array("id" => $id, "val" => $k[$i][$j]);
            if ($k[$i][$j] == "M") {
                $entryX = $i;
                $entryY = $j;
            }
            if ($k[$i][$j] == "*") {
                $exitX = $i;
                $exitY = $j;
            }
        }
        $matrix[] = $a;
    }
    unset($id);
} else {
    $_fp = fopen("php://stdin", "r");
    fscanf($_fp, "%d", $times);

    fscanf($_fp, "%d", $x);
    fscanf($_fp, "%d", $y);
    for ($i = 0; $i < $x; $i++) {
        $a = [];
        foreach (explode(" ", trim(fgets($_fp))) as $j => $val) {
            $id = ($val != 0 ? rand(10000, 99999) : 0);
            $keeper[$id] = 1;
            $a[] = (object)array("id" => $id, "val" => $val);
            if ($val == "M") {
                $entryX = $i;
                $entryY = $j;
            }
            if ($val == "*") {
                $exitX = $i;
                $exitY = $j;
            }
        }
        $matrix[] = $a;
    }
    unset($id);
}
$hops = 0;
while ($pointX != $exitX && $pointY != $exitY) {
    list($pointX, $pointY) = checkid($matrix, $keeper, $entryX, $entryY, $hops);
}

