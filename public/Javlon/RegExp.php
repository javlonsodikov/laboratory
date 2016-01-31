<?php
/**
 * Created by PhpStorm.
 * User: GPS
 * Date: 29.01.2016
 * Time: 17:11
 */

namespace Javlon;

/**
 * Class RegExp
 * @package Javlon
 */
class RegExp
{

    /**
     * RegExp constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $data
     * @param $pattern
     * @return mixed
     */
    public function validate($data, $pattern)
    {
        preg_match($pattern, $data, $matches);
        return $matches;
    }
}

