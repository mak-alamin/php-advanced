<?php 

 namespace APP\Core;

 use APP\Core\Router;
 use APP\Core\Database;

 class Application{
      public static $app;
      public $router;
      public $db;

      public function __construct($db_config)
      {
         extract($db_config);

         self::$app = $this;
         
         $this->router = new Router();
         $this->db = new Database($host, $dbname, $username, $password );
      }

      public function run()
      {
         return $this->router->handleRequest();
      }
 }