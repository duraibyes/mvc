<?php 
namespace Bytes\src\routes;

use Bytes\src\controllers\HomeController;


$app->router->get('/', function () {
    return 'Hello word';
});
$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/test', [HomeController::class, 'contactForm']);
$app->router->post('/form/submit', [HomeController::class, 'formSubmit']);
$app->router->post('/contact/submit', [HomeController::class, 'contactSubmit']);

$app->router->get('/users', function ($test) {
    return 'Hello Contact' . $test;
});

