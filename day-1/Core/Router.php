<?php 

 namespace APP\Core;

 class Router{
     public function __construct()
     {
        echo $this->getUrl();
     }

     public function getUrl()
     {
         $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

         return $url;
     }
 }