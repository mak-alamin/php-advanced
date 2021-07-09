<?php 

namespace APP\Controllers;

use APP\Core\Controller;
use APP\Models\RegisterModel;

class RegisterController extends Controller{
    public function register()
    {
        if ( $this->method == 'get') {
            $this->render('register');
        
        } elseif ($this->method == 'post' && isset($_POST['register'])) {
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

    public function login()
    {
        if ( $this->method == 'get') {
            $this->render('login');
        
        } elseif ($this->method == 'post' && isset($_POST['login'])) {
            $model = new RegisterModel();
            
            // $data = $model->getAllData('users');
            $data = $model->getData('users', "email='mak@yahoo.com'");

            pre_printr($data);
        }
    }

}