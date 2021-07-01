<?php 

 namespace APP\Core;

 class Controller{

   public $router;

   public function __construct($router)
   {
      $this->router = $router;
   }

   public function render($view, $params = [])
   {
      // echo '<pre>';
      // print_r($this->router);

      return $this->router->render_view($view, $params);
   }
 }