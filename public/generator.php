<?php
function getLines($file)
{
    echo "123";
    $f = fopen($file, 'r');
    try {
        while ($line = fgets($f)) {
            echo $line." <br>\r\n ";
            yield $line;
        }
    } finally {
        fclose($f);
    }
}

foreach (getLines("globals.php") as $n => $line) {
    if ($n > 2) break;
    //echo "generated:".$line."<br>\r\n";
}


var_dump(getLines("globals.php"));
getLines("globals.php");
getLines("globals.php");
getLines("globals.php");
getLines("globals.php");