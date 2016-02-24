<?php
/*include "my\classes\myclass.php";

use My\Classes\MyClass ;

$a = new MyClass();*/

/*class Myc
{
    private $a;

    public function __construct()
    {
        //myclass::hello();
    }


    public function getA()
    {
        return $this->a;
    }


    public function setA($a)
    {
        $this->a = $a;
    }
}

$a = new myc();
//my\classi\myclass::hello();
//classi\myclass::hello();

//my\classi\myclass2::hello();
//$a->hello();
*/


/**
 * Class dogs
 */
class dogs
{

    /**
     * @var string
     */
    static $dog = "tortkoz";
    /**
     * @var string
     */
    static $woof = "woof woof";

    /**
     *
     */
    public static function vovilla()
    {
        self::haint();
    }

    /**
     * @param $param1
     */
    public static function qaraya($param1)
    {

    }

    /**
     * @return string
     */
    public static function getDog()
    {
        return self::$dog;
    }

    /**
     * @param string $dog
     */
    public static function setDog($dog)
    {
        self::$dog = $dog;
    }

    public static function haint()
    {
        echo self::$dog . " " . static::$woof;
    }
}

dogs::vovilla();
echo "\n";

/**
 * Class chapa
 */
class chapa extends dogs
{
    /**
     * @var string
     */
    static $dog = "chapa" . PHP_EOL;
    /**
     * @var string
     */
    static $woof = "wow waw" . PHP_EOL;
}

chapa::vovilla();
/**
 * @param $a
 * @param $b
 * @param $c
 * @return array
 */
$func = function ($a, $b, $c) {
    return [$a, $b];
};
$c = new chapa();
//call_user_func($func, $param1, $param2, $amd);
$a = array(1, 2, 3);
$b =& $a;
$c =& $a[2];
$d=1;
xdebug_debug_zval('a');
xdebug_debug_zval('c');
xdebug_debug_zval('d');