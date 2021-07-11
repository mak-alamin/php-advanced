<?php 

namespace APP\Controllers;

session_start();

use APP\Core\Controller;

class DashboardController extends Controller{
    public function handleDashboard()
    {
        if( ! isset($_SESSION['name']) ){
            header('Location: ' . ROOT_URI . '/login');
            exit;
        }

        $params = [
            'name' => $_SESSION['name'],
            'email' => $_SESSION['email']
        ];

       $this->render('admin/index', $params);
    }
}