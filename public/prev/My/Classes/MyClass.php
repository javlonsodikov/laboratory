<?php
namespace My\Classes\MyClass;

/**
 * Class MyClass2
 * @package my\classi\superduper\pupper
 */
class MyClass
{
    const MYCONST = "hello<br>";
    public static $vars = "myvarstatic<br>";
    public $vari = "myvar<br>";

    /**
     * myclass constructor.
     */
    public function __construct()
    {
        echo self::MYCONST;
        echo self::$vars;
        echo $this->vari;
    }


    /**
     *
     */
    public static function hello()
    {
        echo "Helooo";

    }

}