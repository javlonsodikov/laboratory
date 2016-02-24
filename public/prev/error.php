<?php
set_exception_handler(function ($ex) {
    print_r($ex);
});
/*
 set_error_handler(function ($errorNo, $errorStr) {
    echo $errorNo, " : ", $errorStr;
    switch ($errorNo) {
        case 12:
            echo "hello";
            break;
        case 11:
            echo "hello";
            break;
    };
});

$handle = fopen("1.txt", r);
restore_error_handler();*/
throw new Exception("lkjlk",2);