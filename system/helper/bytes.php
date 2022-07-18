<?php
define('app_path', '../'.$_SERVER['DOCUMENT_ROOT']);
/**
 * show and stop execution of program
 */
function ss($data = [])
{
    echo '<pre>';
    var_dump($data);
    die;
}
/**
 * base_path() it will come from .env file 
 * if you change in .env file it will change
 */
if (!function_exists('base_path')) {
    function base_path()
    {
        return getenv('BASE_URL');
    }
}
/**
 * asset_path() can  access assets folder path directly
 * ./bootstrap/assets -> it is default defined
 */
if (!function_exists('asset_path')) {
    function asset_path($path = null)
    {
        return base_path().'bootstrap/assets/'.$path;
    }
}
/**
 * storage_path() can  access assets folder path directly
 * ./bootstrap/storage -> it is default defined
 */
if (!function_exists('storage_path')) {
    function storage_path($path = null)
    {
        return base_path().'bootstrap/storage/'.$path;
    }
}