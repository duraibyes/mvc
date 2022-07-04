<?php
require_once __DIR__.'../../vendor/autoload.php';
use Bytes\system\core\Application;
$app = new Application();

include __DIR__.'../../src/routes/path.php';

set_include_path(__DIR__.'../../src/routes');
spl_autoload_extensions('.php');
spl_autoload_register();


$app->run();