<?php
include "my\classi\myclass.php";

use My\Classi as aaa;

class Myc
{
    private $a;

    public function __construct()
    {
        //myclass::hello();
    }

    /**
     * @return mixed
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * @param mixed $a
     */
    public function setA($a)
    {
        $this->a = $a;
    }
}

$a = new myc();
//my\classi\myclass::hello();
//classi\myclass::hello();
$a = new aaa\myclass2();
//my\classi\myclass2::hello();
//$a->hello();
