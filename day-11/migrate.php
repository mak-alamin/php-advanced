<?php

require_once __DIR__ . '/vendor/autoload.php';

use APP\Core\Application;

//Config
$db_config = [
    'host' => "localhost",
    'dbname' => "php_test",
    'username' => "root",
    'password' => ""
];

//Initialize the Application Class
$app = new Application($db_config, __DIR__);

$app->db->applyMigrations(__DIR__);