<?php

class UF
{
    protected $unionArray = [];

    /**
     * UF constructor.
     * @param int $count
     */
    public function __construct($count)
    {
        for ($i = 0; $i < $count; $i++) {
            $obj = new stdClass();
            if ($i < $count + 1) {
                $obj->connected[] = $i + 1;
            }
            $this->unionArray[] = $obj;
        }
        //print_r($this->unionArray);
    }

    /**
     * @param $p
     * @param $a
     * @return void
     */
    public function union($p, $a)
    {
        if (!$this->connected($p, $a)) {
            $this->unionArray[$p]->connected[] = $a;
        }
    }

    /**
     * @param $p
     * @param $a
     * @return bool
     */
    public function connected($p, $a)
    {
        return in_array($a, (array)$this->unionArray[$p]->connected) || in_array($p, (array)$this->unionArray[$a]->connected);
    }

    /**
     * @param $p
     * @return stdClass
     */
    public function find($p)
    {
        return $this->unionArray[$p];
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->unionArray);
    }

    public function print_r()
    {
        print_r($this->unionArray);
    }
}

$start = microtime(true);
$union = new UF(100);
while (1) {
    $union->union(mt_rand(0, 100), mt_rand(0, 100));
    if (mt_rand(0, 10000) == 10000) break;
}
if ($union->connected(2, 1) === true) {
    echo "connected";
} else {
    echo "not connected";
}
//$union->print_r();
//echo PHP_EOL;
//echo $union->count();


echo PHP_EOL . ((microtime(true) - $start)) . " msec" . PHP_EOL;