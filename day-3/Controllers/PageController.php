<?php 

namespace APP\Controllers;

use APP\Core\Controller;

class PageController extends Controller{

    public function about()
    {
        echo "This is About Page";
    }

    public function service()
    {
        echo "This is Service Page";

    }

    public function contact()
    {
        echo "This is Contact Page";
    }

    public function handleContact()
    {
        echo "Handling Contact data";
    }
}
