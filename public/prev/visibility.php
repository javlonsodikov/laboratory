<?php

namespace Vars\Run\Logs;

/**
 * Class visibility
 * @property int instances
 */
class Visibility
{
    private static $instances = 0;
    private $localvar;
    private $data = [];

    /**
     * visibility constructor.
     */
    public function __construct()
    {
        $this->instances = self::$instances++;
        //echo $this->privatefunction();
    }

    /**
     * @param $name
     * @param array $arguments
     */
    public static function __callStatic($name, $arguments = [])
    {
        echo $name, " ", $arguments;
    }

    public function __clone()
    {
        $this->instances = self::$instances++;
    }

    /**
     * @return string
     */
    public function publicFunction()
    {
        return "I am public<br>";
    }

    public function __destruct()
    {
        //echo "destructing<br>";
    }

    /**
     * @return array
     */
    public function __sleep()
    {
        echo "I am sleeping<br>\r\n";
        return [];
    }

    public function __wakeup()
    {
        echo "I am wakingup<br>\r\n";
        //return [];
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
    }

    /**
     * @param $name
     * @param $val
     */
    public function __set($name, $val)
    {
        $this->data[$name] = $val;
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        if (array_key_exists($name, $this->data)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "THIS WILL BE A STRING hahaha<br>";
    }

    public function __invoke()
    {
        self::printer("I am invoked. You call me as a function");
    }

    /**
     * @param $text
     */
    private function printer($text)
    {
        echo $text . "<br>\r\n";
    }

    /**
     * @return array
     */
    public function __debugInfo()
    {
        return ["somedata" => $this->localvar, "another" => "another var"];
    }

    /**
     * @param $name
     * @param array $arguments
     */
    public function __call($name, $arguments = [])
    {
        echo $this->$name();
    }

    /**
     * @return string
     */
    protected function protectedFunction()
    {
        return "I am protected<br>";
    }

    /**
     * @return string
     */
    private function privatefunction()
    {
        return "I am private<br>";
    }
}
/*
$vis = new Visibility();
$a = clone($vis);
print_r($a);
print_r($vis);
echo $vis();
$vis->hola("bir", "ikki");
echo $vis->hola;
$vis->privatefunction();
$vis->myname = "Hello";
echo isset($vis->myname) ? "here" : "not there";
echo $vis->myname;
echo isset($vis->myname1) ? "here" : "not there";
Visibility::runTest('qizu');
$a = serialize($vis);
unserialize($a);
var_dump($vis);
unset($vis);

echo "Last line<br>\r\n";

*/