<?php
//$_fp = fopen("php://stdin", "r");
//fscanf($_fp, "%s", $str);
$count = 0;
$str = preg_replace('/([^a-z])/', '', $str);
//$str="ibfdgaeadiaefgbhbdghhhbgdfgeiccbiehhfcggchgghadhdhagfbahhddgghbdehidbibaeaagaeeigffcebfbaieggabcfbiiedcabfihchdfabifahcbhagccbdfifhghcadfiadeeaheeddddiecaicbgigccageicehfdhdgafaddhffadigfhhcaedcedecafeacbdacgfgfeeibgaiffdehigebhhehiaahfidibccdcdagifgaihacihadecgifihbebffebdfbchbgigeccahgihbcbcaggebaaafgfedbfgagfediddghdgbgehhhifhgcedechahidcbchebheihaadbbbiaiccededchdagfhccfdefigfibifabeiaccghcegfbcghaefifbachebaacbhbfgfddeceababbacgffbagidebeadfihaefefegbghgddbbgddeehgfbhafbccidebgehifafgbghafacgfdccgifdcbbbidfifhdaibgigebigaedeaaiadegfefbhacgddhchgcbgcaeaieiegiffchbgbebgbehbbfcebciiagacaiechdigbgbghefcahgbhfibhedaeeiffebdiabcifgccdefabccdghehfibfiifdaicfedagahhdcbhbicdgibgcedieihcichadgchgbdcdagaihebbabhibcihicadgadfcihdheefbhffiageddhgahaidfdhhdbgciiaciegchiiebfbcbhaeagccfhbfhaddagnfieihghfbaggiffbbfbecgaiiidccdceadbbdfgigibgcgchafccdchgifdeieicbaididhfcfdedbhaadedfageigfdehgcdaecaebebebfcieaecfagfdieaefdiedbcadchabhebgehiidfcgahcdhcdhgchhiiheffiifeegcfdgbdeffhgeghdfhbfbifgidcafbfcd";
$str = "aabbcd";
$count_chars = count_chars($str, 1);
asort($count_chars);
$pval = 0;
print_r($count_chars);
foreach ($count_chars as $key => $val) {
    if ($pval == 0) {
        $pval = $val;
        continue;
    }
    if ($pval == $val) continue;
    if (abs($pval - $val) == 1) $count++;
    if ($pval != 1 && abs($pval - $val) > 1) {
        echo "NO" . PHP_EOL;
        exit;
    }
    $pval = $val;
}
if ($count == 0 || $count == 1) {
    echo "YES" . PHP_EOL;
} else {
    echo "NO" . PHP_EOL;
}
