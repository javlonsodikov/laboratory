<?php

$word = "post";
$dictionary = file_get_contents(__DIR__ . "/wl.txt");
$dictionaryKeeper = explode("\n", $dictionary);
$res = [];
$dictionaryKeeperSorted = array_map(function ($item) {
    $item = str_split($item);
    sort($item);
    return trim(implode('', $item));
}, $dictionaryKeeper);

$word = "able";
$i = 0;
$res = [];
foreach ($dictionaryKeeperSorted as $item) {
    $wordSorted = str_split($word);
    sort($wordSorted);
    $wordSorted = trim(implode('', $wordSorted));
    if ($item == $wordSorted && $dictionaryKeeper[$i] != $word) {
        $res[] = $dictionaryKeeper[$i];
    }
    $i++;
}
print_r($res);

/*
"able"  => ["abel", "bale", "beal"]
"apple" => ["appel"]
"spot"  => ["post", "pots", "stop", "tops"]
"reset" => ["steer", "trees"]
*/

//"able"  => ["abel", "bale", "beal"]
