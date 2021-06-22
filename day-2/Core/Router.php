<?php 

 namespace APP\Core;

 class Router{
     protected array $routes = [];

     public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

     public function render_view($view, $params = [])
     {
        $view_file = ROOT_DIR . "/views/$view.php";

        if(file_exists($view_file)){
            include_once $view_file;
        }
     }

     public function run()
     {
        $path = $_SERVER['REQUEST_URI'];

        $method = strtolower($_SERVER['REQUEST_METHOD']);

        $callback = $this->routes[$method][$path] ?? false;

        if(is_string($callback)){
            $this->render_view($callback);
        }
     }
 }