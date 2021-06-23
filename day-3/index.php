<?php

use APP\Core\Router;
use APP\Controllers\PageController;

require_once __DIR__ . '/vendor/autoload.php';

//Define Constants
define('ROOT_DIR', __DIR__ );

$route = new Router();

$route->get('/about', [PageController::class, 'about']);
$route->get('/services', [PageController::class, 'service']);
$route->get('/contact', [PageController::class, 'contact']);

$route->post('/contact', [PageController::class, 'handleContact']);

$route->get('/', 'home');

$route->run();