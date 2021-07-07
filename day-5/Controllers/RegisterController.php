<?php 

namespace APP\Controllers;

use APP\Core\Controller;
use APP\Models\RegisterModel;

class RegisterController extends Controller{
    public function register()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        if ( $method == 'get') {
            $this->render('register');
        
        } elseif ($method == 'post') {
            if (empty($_POST)) {
           
                echo 'Please provide some data.';
           
            } else {
                $data = [
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'password' => $_POST['password'],
                ];
                
                $model = new RegisterModel();
                
                $inserted =  $model->insertData('users', $data);

                if ($inserted) {
                    echo 'Data inserted successfully';
                } else {
                    echo 'Data insertion failed!';
                }
            }
        
        }
    }

}