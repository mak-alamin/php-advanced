<?php 

 namespace APP\Core;

 use APP\Core\Application;
 
 class Controller{

   public function render($view, $params = [])
   {
      return Application::$app->router->render_view($view, $params);
   }
 }