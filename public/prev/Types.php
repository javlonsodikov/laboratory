<?php
/**
 * Created by PhpStorm.
 * User: GPS
 * Date: 29.01.2016
 * Time: 12:47
 */

namespace Javlon\Singleton;

/**
 * Class types
 * @package Javlon\Singleton
 */
class Types
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * PHP 5 allows developers to declare constructor methods for classes.
     * Classes which have a constructor method call this method on each newly-created object,
     * so it is suitable for any initialization that the object may need before it is used.
     *
     * Note: Parent constructors are not called implicitly if the child class defines a constructor.
     * In order to run a parent constructor, a call to parent::__construct() within the child constructor is required.
     *
     * @link http://php.net/manual/en/language.oop5.decon.php
     */
    public function __construct()
    {
        return;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return types
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * is triggered when invoking inaccessible methods in an object context.
     *
     * @param $name string
     * @param $arguments array
     * @return mixed
     * @link http://php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.methods
     */
    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }


    /**
     * unserialize() checks for the presence of a function with the magic name __wakeup.
     * If present, this function can reconstruct any resources that the object may have.
     * The intended use of __wakeup is to reestablish any database connections that may have been lost during
     * serialization and perform other reinitialization tasks.
     *
     * @return void
     * @link http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.sleep
     */
    public function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    /**
     * is utilized for reading data from inaccessible members.
     *
     * @param $name string
     * @return mixed
     * @link http://php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.members
     */

    public function __get($name)
    {
        // TODO: Implement __get() method.
        echo $name;

    }

    /**
     * run when writing data to inaccessible members.
     *
     * @param $name string
     * @param $value mixed
     * @return void
     * @link http://php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.members
     */
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
    }

    /**
     * When an object is cloned, PHP 5 will perform a shallow copy of all of the object's properties.
     * Any properties that are references to other variables, will remain references.
     * Once the cloning is complete, if a __clone() method is defined,
     * then the newly created object's __clone() method will be called, to allow any necessary properties that need to
     * be changed.
     * NOT CALLABLE DIRECTLY.
     *
     * @return mixed
     * @link http://php.net/manual/en/language.oop5.cloning.php
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
}

$a = new Types();