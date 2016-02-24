<?php

class myClass
{
    private $arr;
    public function __get($name)
    {
        return isset($this->arr[$name]) ? $this->arr[$name] : null;
    }
    public function __set($name, $val)
    {
        return $this->arr[$name] = $val;
    }
}

$closure = function ($name) {
    echo $name;
};
$dog = new myClass();
/*$clos = $closure->bindTo($dog);
$clos("nomi bu");*/
$dog->cl = $closure;
$d =$dog->cl;
$d("sd");
