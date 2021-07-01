<?php


use APP\Core\Application;
use APP\Controllers\PageController;

require_once __DIR__ . '/vendor/autoload.php';

//Define Constants
define('ROOT_DIR', __DIR__ );

$app = new Application();

$app->router->get('/', 'home');
$app->router->get('/about', [PageController::class, 'about']);

$app->router->get('/services', [PageController::class, 'service']);

$app->router->get('/contact', [PageController::class, 'contact']);
$app->router->post('/contact', [PageController::class, 'handleContact']);

$app->run();