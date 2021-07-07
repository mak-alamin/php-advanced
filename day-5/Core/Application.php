<?php 

 namespace APP\Core;

 use APP\Core\Router;
 use APP\Core\Model;
 use APP\Core\Controller;
 use APP\Core\Database;

 class Application{
      public static $app;

      public $router;
      // public $controller;
      // public $model;
      public $db;

      public function __construct($db_config)
      {
         extract($db_config);

         self::$app = $this;
         
         $this->router = new Router();
       
         // $this->model = new Model();

         // $this->controller = new Controller($this->model);

         $this->db = new Database($host, $dbname, $username, $password );
      }

      public function run()
      {
         return $this->router->handleRequest();
      }
 }