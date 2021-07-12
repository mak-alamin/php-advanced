<?php

require_once __DIR__ . '/vendor/autoload.php';

use APP\Core\Application;
use APP\Controllers\PageController;
use APP\Controllers\DashboardController;
use APP\Controllers\ProfileController;
use APP\Controllers\RegisterController;

$protocol = isset( $_SERVER['HTTPS']) ? 'https://' : 'http://';

//Define Constants
define('ROOT_DIR', __DIR__ );
define('ROOT_URI', $protocol . $_SERVER['HTTP_HOST'] );


//Config
$db_config = [
    'host' => "localhost",
    'dbname' => "php_test",
    'username' => "root",
    'password' => "mysqlpass"
];

//Initialize the Application Class
$app = new Application($db_config);

//Router Instance
$route = $app->router;


//Your Routes
$route->get('/', 'home');
$route->get('/about', [PageController::class, 'about']);

$route->get('/services', [PageController::class, 'service']);

$route->get('/contact', [PageController::class, 'contact']);
$route->post('/contact', [PageController::class, 'handleContact']);

$route->get('/register', [RegisterController::class, 'register']);
$route->post('/register', [RegisterController::class, 'register']);

$route->get('/login', [RegisterController::class, 'login']);
$route->post('/login', [RegisterController::class, 'login']);

$route->get('/admin', [DashboardController::class, 'handleDashboard']);
$route->get('/admin/profile', [ProfileController::class, 'handleProfile']);


//Kick Off
$app->run();