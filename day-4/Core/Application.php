<?php 

 namespace APP\Core;

 use APP\Core\Router;
 use APP\Core\Controller;

 class Application{
      public $router;
      public $controller;
      public $model;
      public $db;

      public function __construct()
      {
         $this->router = new Router();

         $this->controller = new Controller($this->router);
      }

      public function run()
      {
         return $this->router->handleRequest();
      }
 }