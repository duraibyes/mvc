<?php
define('app_path', '../'.$_SERVER['DOCUMENT_ROOT']);

//show and stop execution of program
function ss($data = [])
{
    echo '<pre>';
    var_dump($data);
    die;
}

if (!function_exists('base_path')) {
    function base_path()
    {
        return getenv('BASE_URL');
    }
}