<?php

function checkCell(&$matrix, $newx, $newy, $oid)
{
    $id = $matrix[$newx][$newy]->id;
    $val = $matrix[$newx][$newy]->val;
    if ($val == "*") {
        return (object)["exitfound" => true, "nextway" => true, "x" => $newx, "y" => $newy];
    }
    if ($val == "." && $id != $oid) {
        $matrix[$newx][$newy]->id = $oid;
        return checkId($matrix, $newx, $newy);

    }
    return (object)["exitfound" => false, "nextway" => false, "x" => $newx, "y" => $newy];
}

function checkId(&$matrix, $x, $y)
{
    $oid = $matrix[$x][$y]->id;
    $jumps = 0;

    $newx = $x;
    $newy = $y - 1;
    $obj = checkCell($matrix, $newx, $newy, $oid);
    if ($obj->nextway == true) {
        if ($obj->exitfound == true) {
            $obj->prev[] = (object)["exitfound" => false, "nextway" => true, "x" => $x, "y" => $y];
            return $obj;
        }
        $jumps++;
    }

    $newx = $x;
    $newy = $y + 1;
    $obj = checkCell($matrix, $newx, $newy, $oid);
    if ($obj->nextway == true) {
        if ($obj->exitfound == true) {
            $obj->prev[] = (object)["exitfound" => false, "nextway" => true, "x" => $x, "y" => $y];
            return $obj;
        }
        $jumps++;
    }

    $newx = $x - 1;
    $newy = $y;
    $obj = checkCell($matrix, $newx, $newy, $oid);
    if ($obj->nextway == true) {
        if ($obj->exitfound == true) {
            $obj->prev[] = (object)["exitfound" => false, "nextway" => true, "x" => $x, "y" => $y];
            return $obj;
        }
        $jumps++;
    }

    $newx = $x + 1;
    $newy = $y;
    $obj = checkCell($matrix, $newx, $newy, $oid);
    if ($obj->nextway == true) {
        if ($obj->exitfound == true) {
            $obj->prev[] = (object)["exitfound" => false, "nextway" => true, "x" => $x, "y" => $y];
            return $obj;
        }
        $jumps++;
    }
    return (object)["exitfound" => false, "nextway" => true, "x" => $newx, "y" => $newy];
}

$matrix = [];
$entryX = -1;
$entryY = -1;
$exitX = -1;
$exitY = -1;
if (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] == 'development') {

    /*$imp = 1;
    $k[] = str_split("*.M");
    $k[] = str_split(".X.");*/


    /*$imp = 3;
    $k[] = str_split(".X.X......X");
    $k[] = str_split(".X*.X.XXX.X");
    $k[] = str_split(".XX.X.XM...");
    $k[] = str_split("......XXXX.");*/



    $imp = 22;
    $k[] = str_split("X.XXXX.XX....X.XX...X.XXXXXXXXX");
    $k[] = str_split("X.XXX...XXX.X..XXX.XX..XXXXXXXX");
    $k[] = str_split("...X.XX..X...X..XX.X..XXXXXXXXX");
    $k[] = str_split("X.X..X..X.X.X..X.....XX.XXXXXXX");
    $k[] = str_split("...X..X.X....X.X.X.X.X..XXXXXXX");
    $k[] = str_split(".X..X....X.X.....XX....XXXXXXXX");
    $k[] = str_split("..X..XX.X.X..XX.X..XX.XXXXXXXXX");
    $k[] = str_split(".XXX.X.....X.X.X*.X.XX.XXXXXXXX");
    $k[] = str_split("X..X..X.X.X.....X....X..XXXXXXX");
    $k[] = str_split("..X.X....X..XXXX..XXX..XXXXXXXX");
    $k[] = str_split("X....XXX..X.....X...X.XXXXXXXXX");
    $k[] = str_split("..XX.....X.X.X.X..X.X..XXXXXXXX");
    $k[] = str_split("XX.X.X.X...X.XX.X..X..X..XXXXXX");
    $k[] = str_split(".M...XXXX.X.....X.X.X...XXXXXXX");
    $k[] = str_split("X.XXX..X...X.X.X..X..X.XXXXXXXX");
    $k[] = str_split(".XX...X.XX..X..X.X.X....XXXXXXX");
    $k[] = str_split("....X......X..X......XXX.XXXXXX");
    $k[] = str_split("X.X.XX.XXX..X.X.XX.XX.....XXXXX");
    $k[] = str_split("X..X..X....XX.....X...X.X..XXXX");
    $k[] = str_split("..X.X...XX....X.XX..X.X..XX.XXX");
    $k[] = str_split(".X..X.X.X.X.XX...X.X.X.XX...XXX");
    $k[] = str_split("XX.X...X....X..X........XX.X.XX");
    $k[] = str_split(".....XX..X.X.XX..XX.X.X......XX");
    $k[] = str_split("X.X.XX..X.XX....X..XXXXX.XXXX.X");
    $k[] = str_split("XX..X.XX....XXX...X.X.X........");
    $k[] = str_split(".XXXX...XXX.....X......XX.XX.XX");
    $k[] = str_split("......XX....X.X..XX.XX...XX.XXX");
    $k[] = str_split("X.X.X....X.X...X...X...X.....X.");
    $k[] = str_split("XX...X.X..X..X.XXXX.XX.X.X.X...");
    $k[] = str_split("XXXX..X..XXX.X......X.X...X..XX");
    $k[] = str_split("XXX..XXX..X..XX.X.X....XX..X..X");
    $k[] = str_split("X.XX..XX.X..X...X..X.X.XX.X..XX");
    $k[] = str_split("...XXXX..X.X..X..X..XXX...XXXXX");
    $k[] = str_split("XX...X..XX.XX..X..X.XX..X..XXXX");
    $k[] = str_split("XX.XX..XXXXX.X.X.X...X.XXXXXXXX");
    $k[] = str_split("X.....X.XXX..X.X..X.XXXXXXXXXXX");
    $k[] = str_split("..X.X......X...X.X..XXXXXXXXXXX");

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

    $obj = checkId($matrix, $entryX, $entryY);
    print_r($obj);
    $waves = 0;
    for ($ii = 0; $ii < count($obj->prev); $ii++) {
        $matrix[$obj->prev[$ii]->x][$obj->prev[$ii]->y] = "W";
    }
    for ($ii = 0; $ii < count($obj->prev); $ii++) {
        $way = 0;
        $x = $obj->prev[count($obj->prev) - $ii - 1]->x;
        $y = $obj->prev[count($obj->prev) - $ii - 1]->y;
        $newx = $x;
        $newy = $y - 1;
        if (isset($matrix[$newx][$newy]) && $matrix[$newx][$newy]->val == ".") {
            $way++;
        }
        $newx = $x;
        $newy = $y + 1;
        if (isset($matrix[$newx][$newy]) && $matrix[$newx][$newy]->val == ".") {
            $way++;
        }
        $newx = $x - 1;
        $newy = $y;
        if (isset($matrix[$newx][$newy]) && $matrix[$newx][$newy]->val == ".") {
            $way++;
        }
        $newx = $x + 1;
        $newy = $y;
        if (isset($matrix[$newx][$newy]) && $matrix[$newx][$newy]->val == ".") {
            $way++;
        }
        if ($way > 0) {
            $waves++;
        }
    }


    if ($waves == $imp) {
        echo $imp . " " . $waves;
        echo "Impressed" . PHP_EOL;
    } else {
        echo $imp . " " . $waves;
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
            $arr = str_split(trim(fgets($_fp)));
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

        fscanf($_fp, "%d", $imp);

        $obj = checkId($matrix, $entryX, $entryY);
        //print_r($obj);
        $waves = 0;
        for ($ii = 0; $ii < count($obj->prev); $ii++) {
            $matrix[$obj->prev[$ii]->x][$obj->prev[$ii]->y] = "W";
        }
        for ($ii = 0; $ii < count($obj->prev); $ii++) {
            $way = 0;
            $x = $obj->prev[count($obj->prev) - $ii - 1]->x;
            $y = $obj->prev[count($obj->prev) - $ii - 1]->y;
            $newx = $x;
            $newy = $y - 1;
            if (isset($matrix[$newx][$newy]) && $matrix[$newx][$newy]->val == ".") {
                $way++;
            }
            $newx = $x;
            $newy = $y + 1;
            if (isset($matrix[$newx][$newy]) && $matrix[$newx][$newy]->val == ".") {
                $way++;
            }
            $newx = $x - 1;
            $newy = $y;
            if (isset($matrix[$newx][$newy]) && $matrix[$newx][$newy]->val == ".") {
                $way++;
            }
            $newx = $x + 1;
            $newy = $y;
            if (isset($matrix[$newx][$newy]) && $matrix[$newx][$newy]->val == ".") {
                $way++;
            }
            if ($way > 0) {
                $waves++;
            }
        }
        if ($waves == $imp) {
            // echo $imp . " " . $waves;
            echo "Impressed" . PHP_EOL;
        } else {
            //echo $imp . " " . $waves;
            echo "Oops!" . PHP_EOL;
        }
    }
}

