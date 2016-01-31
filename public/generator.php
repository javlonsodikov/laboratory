<?php
/**
 * @param $file
 * @return Generator
 */
function getLines($file)
{
    echo "123";
    $f = fopen($file, 'r');
    try {
        while ($line = fgets($f)) {
            echo $line . " <br>\r\n ";
            yield $line;
        }
    } finally {
        fclose($f);
    }
}

foreach (getLines("globals.php") as $n => $line) {
    if ($n > 5) {
        break;
    }
    //echo "generated:".$line."<br>\r\n";
}


var_dump(getLines("globals.php"));
