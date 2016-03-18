<?php
function findpower($num)
{
    $prev = 0;
    $ret = 2;
    while (gmp_cmp($ret, $num) == -1 || gmp_cmp($ret, $num) == 0) {//1 gt, 0 eq, -1 lt
        $prev = $ret;
        $ret = gmp_mul($ret, 2);
    }
    return $prev;
}

$a = [
    "16665401330435388198",
    "10318396182076207593",
    "245699880918337095",
    "16404706719976314525",
    "9631232913369401239",
    "262144",
    "17592186044416"];
foreach ($a as $number) {
    $c = 0;
    $number = gmp_init($number);
    while ($number != 1) {
        $power = findpower($number);
        if ($power == 1) break;
        if (gmp_cmp($power, $number) == -1) //if ($power < $number)
        {
            $number = gmp_sub($number, $power);
            //$number = $number - gmp_div($number, 2);
        } else {
            $number = gmp_sub($number, gmp_div($number, 2));
        }
        //echo $number . PHP_EOL;
        $c++;
    };
//echo $c;
    if ($c % 2) {
        echo "Louise" . PHP_EOL;
    } else {
        echo "Richard" . PHP_EOL;
    }
}

/*
fgets(STDIN);
while ($t = trim(fgets(STDIN))) {
    $louise = true;
    while (gmp_cmp($t, 1)) {
        $louise = !$louise;
        if (gmp_cmp(gmp_mod($t, 2), 0) === 0)
            $t = gmp_div($t, 2);
        else {
            for ($i = 1; ; $i = gmp_mul($i, 2)) {
                if (gmp_cmp($i, $t) > 0) {
                    $t = gmp_sub($t, gmp_div($i, 2));
                    break;
                }
            }
        }
    }
    echo ($louise ? 'Richard' : 'Louise') . "\n";
}
*/