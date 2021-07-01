<?php 

 namespace APP\Core;

 class Router{
    protected $controller;
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
        if(file_exists(ROOT_DIR . "/views/$view.php")){
            include_once ROOT_DIR . "/views/$view.php";
        }
     }

     public function handleRequest()
     {
         
         $path = $_SERVER['REQUEST_URI'];
         
         $method = strtolower($_SERVER['REQUEST_METHOD']);
         
         $callback = $this->routes[$method][$path] ?? false;
        
        if($callback == false){
            return $this->render_view('_404');
        }
        
        if(is_string($callback)){
            return $this->render_view($callback);
        }
        
        if(is_array($callback)){
            // echo '<pre> Callback: ';
            // print_r($callback[0]);

            // $this->controller = new $callback[0]();

            // echo '<pre> Callback: ';
            // print_r($this->controller);

            // $callback[0] = $this->controller;

            return call_user_func($callback);
        }                
     }
 }