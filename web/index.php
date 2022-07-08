<?php
declare(strict_types=1);
echo '<style>';
include ('../bootstrap/app/core/base/css/base.form.css');
echo '</style>';

session_start();
require_once __DIR__ . '../../vendor/autoload.php';

use Bytes\system\core\Application;
use Bytes\src\controllers\HomeController;

$app = new Application();

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

$app->run();