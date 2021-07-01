<?php 

 namespace APP\Core;

 use APP\Core\Router;

 class Application{
      public static $app;
      public $router;
      public $db;

      public function __construct()
      {
         self::$app = $this;
         
         $this->router = new Router();
      }

      public function run()
      {
         return $this->router->handleRequest();
      }
 }