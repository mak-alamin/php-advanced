<?php 

namespace APP\Controllers;

session_start();

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
        if ( $this->method == 'get' && $_GET['action'] != 'logout') {

            //Force redirect to admin page if logged in
            if(isset( $_SESSION['name'])){
                header('Location: admin');
                exit;
            }

            $this->render('login');
            return;
        
        } elseif ($this->method == 'post' && isset($_POST['login'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $model = new RegisterModel();
            
            $data = $model->getData('users', "email='$email'");

            if($email !== $data['email']){
                echo "Email doesn't match!";
                return;
            }
            
            if( ! password_verify( $password, $data['password'])){
                echo "Password doesn't match";
                return;
            }

            $_SESSION['name'] = $data['name'] . '<br>';
            $_SESSION['email'] = $data['email'];

            header('Location: admin');
            exit;
        }
        
        //Log Out
        if(isset($_GET['action']) && $_GET['action'] == 'logout'){   
            session_destroy();
            header('Location: login');
            exit;
        }
    }
}