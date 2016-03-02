<?php

$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
fscanf($_fp, "%d", $t);
for ($i = 0; $i < $t; $i++) {
    fscanf($_fp, "%s", $word);
    for ($w = 0; $w < strlen($word) / 2; $w++) {
        //echo $word[$w]
        if (
            abs(ord($word[$w]) - ord($word[$w + 1]))
            !=
            abs(ord($word[strlen($word) - $w - 1]) - ord($word[strlen($word) - $w - 2]))
        ) {
            echo "Not Funny" . PHP_EOL;
            continue 2;
        }
    }
    echo "Funny" . PHP_EOL;
}
