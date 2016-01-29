<?php

namespace Javlon\Singleton;

use Symfony\Polyfill;

/**
 * Class Singleton
 */
class Singleton
{
    private static $instance;
    private $data = [];

    /**
     * Singleton constructor.
     */
    private function __construct()
    {
        self::$instance = &$this;
    }

    /**
     * @return Singleton
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];//version 1
        return $this->{$name};//version 2
    }

    /**
     * @param $name
     * @param $val
     */
    public function __set($name, $val)
    {
        $this->data[$name] = $val; //version 1
        $this->{$name} = $val;//version 2
    }

    /**
     * @param $name
     */
    public function __unset($name)
    {
        echo "unset $name" . PHP_EOL;
        unset($this->data[$name]);//version 1
        unset($this->{$name});//version 2
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        echo "isset $name" . PHP_EOL;
        return ($this->{$name} != null ? true : false);
    }
}


$single = Singleton::getInstance();

$single->qale = "salom";
echo $single->qale;
if (isset($single->qale)) {
};
unset($single->qale);

//$single1 = new Singleton();
