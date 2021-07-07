<?php 

 namespace APP\Core;

 use APP\Core\Application;
 
 class Controller{
    // public $model;

    // public function __construct($model)
    // {
    //   $this->model = $model;
    // }
 
    public function render($view, $params = [])
    {
        // echo $view;
        // die();
        return Application::$app->router->render_view($view, $params);
    }
 }