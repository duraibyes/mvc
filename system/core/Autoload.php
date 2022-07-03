<?php

namespace Bytes\system\core;

use Bytes\system\helper;

function my_autoload($class_name)
{
    if (is_file('CLASSES/' . $class_name . '.php')) {
        require_once 'CLASSES/' . $class_name . '.php';
    } else if (is_file('ADMIN/TPL/SOME_FOLDER2/' . $class_name . '.php')) {
        require_once 'ADMIN/TPL/SOME_FOLDER2/' . $class_name . '.php';
    }
}
spl_autoload_register("my_autoload");