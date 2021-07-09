<?php


use APP\Core\Application;
use APP\Controllers\PageController;
use APP\Controllers\RegisterController;

require_once __DIR__ . '/vendor/autoload.php';

//Define Constants
define('ROOT_DIR', __DIR__ );

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

//Kick Off
$app->run();