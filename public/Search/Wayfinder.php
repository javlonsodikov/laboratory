<?php

function checkCell(&$matrix, $newx, $newy, $oid, $hops)
{
    $id = $matrix[$newx][$newy]->id;
    $val = $matrix[$newx][$newy]->val;
    if ($val == "*") {
        return (object)["exitfound" => true, "nextway" => true, "x" => $newx, "y" => $newy, "hops" => $hops];
    }
    if ($val == 1 && $id != $oid) {
        $matrix[$newx][$newy]->id = $oid;
        return checkid($matrix, $newx, $newy, $hops);
        /*if ($obj->exitfound == true) {
            return (object)["exitfound" => true, "nextway" => true, "x" => $newx, "y" => $newy, "hops" => $hops];
        } else {
            return (object)["exitfound" => false, "nextway" => true, "x" => $newx, "y" => $newy, "hops" => $hops];
        }*/
    }
    return (object)["exitfound" => false, "nextway" => false, "x" => $newx, "y" => $newy, "hops" => 0];
}

function checkid(&$matrix, $x, $y, $hops)
{
    $oid = $matrix[$x][$y]->id;
    $jumps = 0;

    $newx = $x;
    $newy = $y - 1;
    $obj = checkCell($matrix, $newx, $newy, $oid, $hops);
    if ($obj->nextway == true) {
        if ($obj->exitfound == true) {
            return $obj;
        }
        $jumps++;
    }

    $newx = $x;
    $newy = $y + 1;
    $obj = checkCell($matrix, $newx, $newy, $oid, $hops);
    if ($obj->nextway == true) {
        if ($obj->exitfound == true) {
            return $obj;
        }
        $jumps++;
    }

    $newx = $x - 1;
    $newy = $y;
    $obj = checkCell($matrix, $newx, $newy, $oid, $hops);
    if ($obj->nextway == true) {
        if ($obj->exitfound == true) {
            return $obj;
        }
        $jumps++;
    }

    $newx = $x + 1;
    $newy = $y;
    $obj = checkCell($matrix, $newx, $newy, $oid, $hops);
    if ($obj->nextway == true) {
        if ($obj->exitfound == true) {
            return $obj;
        }
        $jumps++;
    }

    //Check situation
    if ($jumps == 0) {
        return (object)["exitfound" => false, "nextway" => false, "x" => $newx, "y" => $newy, "hops" => 0];
    }

    if ($jumps > 1) {
        $hops++;
        $matrix[$x][$y]->jumps = $jumps;
        return (object)["exitfound" => false, "nextway" => true, "x" => $newx, "y" => $newy, "hops" => ++$hops];
    }

    return (object)["exitfound" => false, "nextway" => true, "x" => $newx, "y" => $newy, "hops" => $hops];
}

$matrix = [];
$entryX = -1;
$entryY = -1;
$exitX = -1;
$exitY = -1;
if (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] == 'development') {

    /*$k[] = str_split(str_replace(".", "1", str_replace("X", "0", ".X.X......X")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", ".X*.X.XXX.X")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", ".XX.X.XM...")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "......XXXX.")));
    */
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "X.XXXX.XX....X.XX...X.XXXXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "X.XXX...XXX.X..XXX.XX..XXXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "...X.XX..X...X..XX.X..XXXXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "X.X..X..X.X.X..X.....XX.XXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "...X..X.X....X.X.X.X.X..XXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", ".X..X....X.X.....XX....XXXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "..X..XX.X.X..XX.X..XX.XXXXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", ".XXX.X.....X.X.X*.X.XX.XXXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "X..X..X.X.X.....X....X..XXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "..X.X....X..XXXX..XXX..XXXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "X....XXX..X.....X...X.XXXXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "..XX.....X.X.X.X..X.X..XXXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "XX.X.X.X...X.XX.X..X..X..XXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", ".M...XXXX.X.....X.X.X...XXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "X.XXX..X...X.X.X..X..X.XXXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", ".XX...X.XX..X..X.X.X....XXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "....X......X..X......XXX.XXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "X.X.XX.XXX..X.X.XX.XX.....XXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "X..X..X....XX.....X...X.X..XXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "..X.X...XX....X.XX..X.X..XX.XXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", ".X..X.X.X.X.XX...X.X.X.XX...XXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "XX.X...X....X..X........XX.X.XX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", ".....XX..X.X.XX..XX.X.X......XX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "X.X.XX..X.XX....X..XXXXX.XXXX.X")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "XX..X.XX....XXX...X.X.X........")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", ".XXXX...XXX.....X......XX.XX.XX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "......XX....X.X..XX.XX...XX.XXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "X.X.X....X.X...X...X...X.....X.")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "XX...X.X..X..X.XXXX.XX.X.X.X...")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "XXXX..X..XXX.X......X.X...X..XX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "XXX..XXX..X..XX.X.X....XX..X..X")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "X.XX..XX.X..X...X..X.X.XX.X..XX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "...XXXX..X.X..X..X..XXX...XXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "XX...X..XX.XX..X..X.XX..X..XXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "XX.XX..XXXXX.X.X.X...X.XXXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "X.....X.XXX..X.X..X.XXXXXXXXXXX")));
    $k[] = str_split(str_replace(".", "1", str_replace("X", "0", "..X.X......X...X.X..XXXXXXXXXXX")));
    //print_r($k);

    for ($i = 0; $i < count($k); $i++) {
        $a = [];
        for ($j = 0; $j < count($k[0]); $j++) {
            $id = 0;
            if ($k[$i][$j] == "M") {
                $entryX = $i;
                $entryY = $j;
                $id = rand(10000, 99999);
            }
            if ($k[$i][$j] == "*") {
                $exitX = $i;
                $exitY = $j;
            }
            $a[] = (object)array("id" => $id, "val" => $k[$i][$j]);
        }
        $matrix[] = $a;
    }
    unset($id);
    $hops = 0;
    $obj = checkid($matrix, $entryX, $entryY, $hops);
    $imp = 3;
    if ($obj->hops == $imp) {
        echo $imp . "" . $obj->hops;
        echo "Impressed" . PHP_EOL;
    } else {
        echo $imp . "" . $obj->hops;
        echo "Oops!" . PHP_EOL;
    }
} else {
    $_fp = fopen("php://stdin", "r");
    fscanf($_fp, "%d", $times);
    for ($re = 0; $re < $times; $re++) {
        $matrix = [];
        list($x, $y) = explode(" ", trim(fgets($_fp)));
        for ($i = 0; $i < $x; $i++) {
            $a = [];
            $arr = str_split(str_replace(".", "1", str_replace("X", "0", trim(fgets($_fp)))));
            foreach ($arr as $j => $val) {
                $id = 0;
                if ($val == "M") {
                    $entryX = $i;
                    $entryY = $j;
                    $id = rand(10000, 99999);
                }
                if ($val == "*") {
                    $exitX = $i;
                    $exitY = $j;
                }
                $a[] = (object)array("id" => $id, "val" => $val);
            }
            $matrix[] = $a;
        }
        unset($id);
        $hops = 0;
        checkid($matrix, $entryX, $entryY, $hops);
        fscanf($_fp, "%d", $imp);
        if ($hops == $imp) {
            echo $hops, " - ", $imp, " : ";
            echo "Impressed" . PHP_EOL;
        } else {
            echo $hops, " - ", $imp, " : ";
            echo "Oops!" . PHP_EOL;
        }
    }
}

