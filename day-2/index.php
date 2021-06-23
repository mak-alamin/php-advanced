<?php

use APP\Core\Router;

require_once __DIR__ . '/vendor/autoload.php';

//Define Constants
define('ROOT_DIR', __DIR__ );

$route = new Router();

$route->get('/about', 'about');
$route->get('/services', 'service');
$route->get('/contact', 'contact');

$route->post('/contact', 'contact');

$route->get('/', 'home');

$route->run();