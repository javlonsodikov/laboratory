<?php

/**
 * Created by PhpStorm.
 * User: GPS
 * Date: 13.02.2016
 * Time: 13:45
 */
/*class ArrayAccessExtended implements ArrayAccess
{
    protected $array = [];

    public function offsetSet($offset, $value)
    {
        $this->array[$offset] = $value;
    }

    public function offsetGet($offset)
    {
        return $this->array[$offset];
    }

    public function offsetExists($offset)
    {
        return isset($this->array[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->array[$offset]);
    }
}

$check = new ArrayAccessExtended();
$check->offsetSet("Qale", "zor");
$check->offsetSet("Qale1", "zor2");
$check["Prikol"]="HAHAHAH";
if ($check->offsetExists("Qale")) {
    //echo $check->offsetGet("Qale");
    //echo $check["Qale1"];
    //echo $check["Prikol"];
    //$check->offsetUnset("Qale");
}
echo count($check);*/

/*$data = new ArrayObject();
$data->setFlags(ArrayObject::ARRAY_AS_PROPS);
$data->append(new stdClass());
$data["data"] = new stdClass();
print_r($data);*/


/**
 * @param $a
 * @param $b
 * @param $c
 * @return mixed
*/
function add($a, $b, $c)
{
    return $a + $b + $c;
}

$operators = [2, 3];
echo add(1, ...$operators);
