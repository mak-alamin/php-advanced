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

    protected function get_path()
    {
        $path = $_SERVER['REQUEST_URI'];

        $root_url = ROOT_URI . '/';

        $path = ( $path == $root_url ) ? '/' : $path;
        
        $position = strpos($path, '?');
        
        if ($position === false) {
            return $path;
        }
       
        return substr($path, 0, $position);
    }

     public function render_view($view, $params = [])
     {
        extract($params);
         
        require_once ROOT_DIR . "/views/$view.php";

        // $content = file_get_contents(ROOT_DIR . "/views/$view.php");

        // if ( ! empty($params) ){  

        //     foreach ($params as $key => $value) {
        //        $content = str_replace("{{{$key}}}", $value, $content);
        //     }

        // }

        // echo $content;
     }

     public function handleRequest()
     {
         
        $path = $this->get_path();
         
        $method = strtolower($_SERVER['REQUEST_METHOD']);
         
        $callback = $this->routes[$method][$path] ?? false;
        
        if($callback == false){
            return $this->render_view('_404');
        }
      
        if(is_string($callback)){
            return $this->render_view($callback);
        }
        
        if(is_array($callback)){ 
            $callback[0] = new $callback[0]();
        }
        
        return call_user_func($callback);
     }
 }