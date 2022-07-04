<?php

//show and stop execution of program
function ss($data = [])
{
    echo '<pre>';
    var_dump($data);
    die;
}

if (!function_exists('sayHello')) {
    function sayHello()
    {
        return 'Hello!';
    }
}