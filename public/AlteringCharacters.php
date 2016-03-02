<?php
$_fp = fopen("php://stdin", "r");
fscanf($_fp, "%d", $t);

for ($i = 0; $i < $t; $i++) {
    fscanf($_fp, "%s", $word);
    $times=0;
    $sword="";
    $replaced=0;
    while(1){
        $sword=str_replace(array("AA","BB"), array("A","B"), $word, $replaced);
        if ($sword!=$word) {
            $times+=$replaced;
        }
        else break;
        $word=$sword;
    }
    echo $times . PHP_EOL;
}