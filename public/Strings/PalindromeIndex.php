<?php
$_fp = fopen("php://stdin", "r");
fscanf($_fp, "%d", $times);

for ($i = 0; $i < $times; $i++) {
    fscanf($_fp, "%s", $str);



    $stra = str_split($str);

    for ($o = 0; $o < strlen($str); $o++) {
        $strp = substr_replace($str,'', $o, 1);
        $left = substr($strp, 0, floor(strlen($strp) / 2));
        $right = strrev(substr($strp, ceil(strlen($strp) / 2)));
        //$strp = implode('', $stra);
        /*$strp = $stra;
        unset($strp[$o]);

        $lefta  = array_slice($strp, 0, floor(strlen($strp) / 2));
        $righta = array_slice($strp, ceil(strlen($strp) / 2));
        print_r($lefta);
        $left = implode('', $lefta);
        $right = implode('', $righta);*/
        //echo $left . " " . $right. PHP_EOL;
        if ($left == $right) {
            echo $o . PHP_EOL;
            continue 2;
        }
    }
    echo "-1" . PHP_EOL;
}