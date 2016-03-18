<?php
$_fp = fopen("php://stdin", "r");

fscanf($_fp, "%d", $t);
while ($t--) {
    fscanf($_fp, "%s", $s);
    $n = gmp_init($s);
    $count = 0;
    game($n);
    echo ($count % 2) ? 'Louise' : 'Richard', "\n";
}

function game($n)
{
    global $count;
    if (gmp_popcount($n) === 1) {
        $pos = gmp_scan1($n, 0);
        if ($pos === 0) return;
        else {
            gmp_clrbit($n, $pos);
            gmp_setbit($n, $pos - 1);
            ++$count;
            game($n);
        }
    } else {
        $s = gmp_strval($n, 2);
        $pos = strpos($s, '1');
        $s{$pos} = '0';
        ++$count;
        $n = gmp_init($s, 2);
        game($n);
    }
}