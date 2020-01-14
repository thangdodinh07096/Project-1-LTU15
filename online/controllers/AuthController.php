<?php 
    require_once('models/Auth.php');
    class AuthController{

        var $model;

        function __construct(){
            $this->model = new Auth();
        }

        public function loginForm(){
            require_once('views/login/login.php');
        }
        
        public function login(){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $account = $this->model->Login($email,$password);
            // var_dump($account);
            // die;
            if ($account === NULL) {
                setcookie('login_msg','Login Fail',time()+3);
                header('Location: ?mod=auth&act=loginForm');
            } else{
                $_SESSION['isLogin'] = true;
                
                unset($account['password']);
                $_SESSION['customer'] = $account;
                
                header('Location: index.php');
            }
            
        }

         public function logout(){
            session_destroy();
            header('Location: index.php');
        }
    }
    
 ?>