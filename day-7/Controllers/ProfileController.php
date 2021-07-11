<?php 

namespace APP\Controllers;

session_start();

use APP\Core\Controller;

class ProfileController extends Controller{

    public function handleProfile()
    {
        if( ! isset($_SESSION['name']) ){
            header('Location: ' . ROOT_URI . '/login');
            exit;
        }

        $params = [
            'name' => $_SESSION['name'],
            'email' => $_SESSION['email']
        ];

        $this->render('admin/profile', $params);
    }
}