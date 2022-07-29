<?php
declare(strict_types=1);

echo '<style>';
include ( __DIR__.'../../bootstrap/app/core/base/css/base.form.css');
echo '</style>';

session_start();
require_once __DIR__ . '../../vendor/autoload.php';
use Bytes\system\core\Application;
use Bytes\system\core\Env;

$env = new Env(__DIR__ . '../../.env');
$env->load();

// ss( base_path());
$app = new Application();

require_once __DIR__.'../../src/routes/path.php';

$app->run();

echo '<script>';
include (__DIR__.'../../bootstrap/app/core/base/js/form.js');
echo '</script>';