<?php

try {
    throw new InvalidArgumentException("Qaleee");
    throw new BadFunctionCallException();
    throw new BadMethodCallException();
    throw new DomainException();
    throw new InvalidArgumentException();
    throw new LengthException();
    throw new LogicException();
    throw new OutOfBoundsException();
    throw new OutOfRangeException();
    throw new OverflowException();
    throw new RangeException();
    throw new RuntimeException();
    throw new UnderflowException();
    throw new UnexpectedValueException();
} catch (Exception $ex) {
    var_dump(get_class_methods($ex));
    foreach (get_class_methods($ex) as $method) {
        echo "methodName: " . $method . "<br>\r\n";
        print_r($ex->$method());
        echo "<br>\r\n";
    }
} finally {
}
