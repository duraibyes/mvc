<?php
require_once __DIR__.'../../vendor/autoload.php';
use Bytes\system\core\Application;
use Bytes\src\controllers\HomeController;
$app = new Application();

$app->router->get('/', function(){
    return 'Hello word';
});
$app->router->get('/test', [HomeController::class, 'contact_form']);
$app->router->post('/test',[HomeController::class, 'form_submit']);

$app->router->get('/users', function($test){
    return 'Hello Contact'.$test;
});

$app->run();