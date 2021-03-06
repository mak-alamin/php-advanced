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

            if(count($data) !== 1){
                echo "Something went wrong! Please try again later.";
            }

            $params = [];

            if($email !== $data[0]['email']){   
                $params['email_err'] = "Email doesn't match!..." . $data[0]['email'];
            }
            
            if( ! password_verify( $password, $data[0]['password'])){
                $params['pass_err'] = "Password doesn't match";
            }

            if(isset($params['email_err']) || isset($params['pass_err'])){
                $this->render('login', $params );
                return;
            }

            $_SESSION['user_id'] = $data[0]['id'];
            $_SESSION['name'] = $data[0]['name'];
            $_SESSION['email'] = $data[0]['email'];

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