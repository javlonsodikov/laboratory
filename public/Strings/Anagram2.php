<?php
$count = 1;
$str = "zjadbkhmquvpcedlhsarcjzfsnekawczfccjomvfirwkvbveuvvwgwdbkklmgnlorpxgdunmnjwkksoepjdwiixssigbytppioxoikcwtyggsvmigrgoadisnovlhkdsacgjpkhiinqdkdnruvhwyqrngmbozgiziqkxarikfyprdciazswxinnqaogzuoaeglcgcmrjmibqnlqmfmkpczgcnmdjddnjorqtfjesthkgvataofqqewutizendrxtlpoqatktauavwtylyodekaxuzbieuhyhwoayhkrkhrhdmfqmtwqfwpcxsmcntcwrqwpajikqctvobmduivcgleddqfslhreyntaydkqffmwgazdkuhqhltndbfqkyukmpkmswdycrukrvnbpurxhmkmprcaqykenvsgtvgvocgfxvgmqzlzoxmdrofjnqncnfkgdqersmzrhhgzhrzxrlcibirqagtnndvswbkqnlivsoubhvyygdgilzylftatxxlvzxloktldjierdfpkkyuvzuifokanhniinvzxrkcasjrwojiajcvkwfpmprzyhjjwfitwswylfqjvbrvmvswtxogohhmorvkydgwyeullmuipndbixybwojkvrwmkuykxegxicivpedergizfidbwmlrdkfpeezdihbtklobqsfhapjixmjtyxnehsvlyvqjcrcodsptmxcnmlxkxgfydsemnzxlwquzjypmrfhfcmuoxraxygvdyzqnapzxfvypundnsnswznnyenvetqiurahspirxepoacrpxghvfwigdwbjrurlntthldyihnyjqpypygkfevljrntkjmwwgreruebesznkqmzouluagfkzudkfpgexziotorxgqlqjzrxtdttlbdlxivdydhvcrmxffvmwiehjyecbyxobdzylwblzkjdbxbhcyvaibhrzovcosrpxsnlppwqzhudgxmjvjldktumhpqvjhkhczstqqjqafvgchrxsdccyyqfnhczqogsnalesxwsctbfaueuxjwxhpevwguowcjkewqwtorwhsdjojdmsbjasqxowtftvofzkxxenocuihfxqilllwnemkujdzeaplbckygxnktxtyulifwvcjzotwzyxdapqbrcazzpjsmcsjncomyqvzhrvgrvmsketbhvagklbznvicyyqwpmvyftewosqyxkzefzmsmntbjddhbwfskaqptxnhpehmqgqvhdptskubnakpwpjisaxlzmvoqcbglreuwvqpgmsvofkmuwumytaxgxlybmhmgljeibvonoketwqpunesggpmddleputxhcepfzgsnsyiqpalcgdimvxpykvpeoplstcxsiqiaostfsejyjukgrbgdxwhlnuggwdahvijmbcrvidwuxgaqkhtjfcuswaaugadbjnnmrhhakduhmwxydqhkudcsgemmfsnqfbcyilaspwbdtybyqkjknnctsqfxitnpwrqgcqatnbwibzgtlpfzfjsxzawkvlbrcrxekzaxayhdynwjfdkkmfjlffxasbtussaeradtzkyzywkdzxplcywjfwlxxetryvwrwzmxkkykgkpfheqjcoshmfgjlzdjuzasaormypwealljpdttsncgtiqgjtqgusyuhsjhjfojtzvkdoexdidyrvfcqxikpjhydqgmxuyqvtdyjhxmrdnkyunprxbiikhlapyajwsepvfaeemwhbgivvzotaxbngnpvnpgjimafrakyoifsonnkoefrbgehvteilktvwvaqvkomuvejltvzxcqykwhisnqdzmywhyoflerfbxqmqnoorgocdykvlcaloyjyyzdlfwtgtltlzhbsnqusqgpdjpqzpbxqacbfyumtghfhqgzfywyqcpunfknwommorqwrmknutsdjadobbmrfeltlyihmwwcnmahakuvdoyooddrerjkvwfgwnoijmnza";

for ($i = 0; $i < $count; $i++) {
    //fscanf($_fp, "%s", $str);
    if (strlen($str) % 2) {
        echo "-1" . PHP_EOL;
    } else {
        $strleft = substr($str, 0, strlen($str) / 2);
        $strright = substr($str, strlen($str) / 2);
        //echo $strleft . " " . $strright . PHP_EOL;

        $array_left = array_diff_assoc(count_chars($strleft, 1), count_chars($strright, 1));
        $array_right = array_diff_assoc(count_chars($strright, 1), count_chars($strleft, 1));

        //print_r($array_left,$array_right);
        foreach ($array_right as $charCode => $countChar) {
            if (@($array_right[$charCode]) && @($array_left[$charCode])) {
                if ($array_right[$charCode] - $array_left[$charCode]>0){
                    $array_right[$charCode] = abs($array_right[$charCode] - $array_left[$charCode]);
                    unset($array_left[$charCode]);
                }
                else{
                    $array_left[$charCode] = abs($array_left[$charCode] - $array_right[$charCode]);
                    unset($array_right[$charCode]);
                }
            }
        }
        //bbb
        //avv
        //print_r($array_left);
        //print_r($array_right);
        echo array_sum($array_right) . PHP_EOL;
    }
    //echo $strleft. " " . $strright . PHP_EOL;
}