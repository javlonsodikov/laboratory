<?php
/**
 * @param $arrayNumbers
 * @param $friendlyNumber
 * @return int
 */
function unfriendlyNumbers($arrayNumbers, $friendlyNumber)
{
    $countUnmatched = 0;
    for ($divider = 1; $divider < $friendlyNumber+1; $divider++) {
        if (($friendlyNumber / $divider) == ceil($friendlyNumber / $divider)) {
            if (!in_array($divider, $arrayNumbers)) {
                foreach ($arrayNumbers as $arrayNumber) {
                    if (($arrayNumber / $divider) == ceil($arrayNumber / $divider)) {
                        /*Do nothing*/
                    } else {
                        $countUnmatched++;
                        continue 2;
                    }
                }
            }
        }

    }
    return $countUnmatched;
}

/* Tail starts here */
/*$__fp = fopen("php://stdin", "r");

fscanf($__fp, "%d %d", $_a_cnt, $_k);
$_a = fgets($__fp);
$_a = explode(' ', $_a);*/
$_a = [2, 5, 7, 4, 3, 8, 3, 18];
$_k = 16;
$res = unfriendlyNumbers($_a, $_k);
echo $res;

