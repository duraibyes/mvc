<?php

declare(strict_types=1);

require_once __DIR__ . '../../vendor/autoload.php';

use Bytes\system\core\Application;
use Bytes\src\controllers\HomeController;

$app = new Application();

$app->router->get('/', function () {
    return 'Hello word';
});
$app->router->get('/test', [HomeController::class, 'contactForm']);
$app->router->post('/test', [HomeController::class, 'formSubmit']);

$app->router->get('/users', function ($test) {
    return 'Hello Contact' . $test;
});

$app->run();