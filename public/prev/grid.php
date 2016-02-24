<?php
$G[] = "400453592126560";
$G[] = "114213133098692";
$G[] = "474386082879648";
$G[] = "522356951189169";
$G[] = "887109450487496";
$G[] = "252802633388782";
$G[] = "502771484966748";
$G[] = "075975207693780";
$G[] = "511799789562806";
$G[] = "404007454272504";
$G[] = "549043809916080";
$G[] = "962410809534811";
$G[] = "445893523733475";
$G[] = "768705303214174";
$G[] = "650629270887160";
$P[] = "99";
$P[] = "99";

$handle = fopen("php://stdin", "r");
fscanf($handle, "%d", $t);
$run = 0;
while ($run++ < $t) {


    for ($a0 = 0; $a0 < $t; $a0++) {
        fscanf($handle, "%d %d", $R, $C);
        $G = array();
        for ($G_i = 0; $G_i < $R; $G_i++)
            fscanf($handle, "%s", $G[]);

        fscanf($handle, "%d %d", $r, $c);
        $P = array();
        for ($P_i = 0; $P_i < $r; $P_i++)
            fscanf($handle, "%s", $P[]);
    }
    print_r($G);
    print_r($P);
    $match = 0;
    for ($i = 0; $i < count($G); $i++) {
        $pos = strpos($G[$i], $P[0]);
        if ($pos !== false) {
            for ($j = 0; $j < count($P); $j++) {
                if (substr($G[$i + $j], $pos, strlen($P[$j])) == $P[$j]) {
                    //echo substr($G[$i+$j], $pos, strlen($P[$j])) . "\r\n";
                    $match++;
                }
            }
        }
    }

    if ($match > 0 && $match == count($P))
        echo "YES\r\n";
    else
        echo "NO\r\n";

}

fclose($handle);
