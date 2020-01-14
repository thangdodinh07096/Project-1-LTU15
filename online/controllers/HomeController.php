<?php 
    require_once('models/Product.php');


    class HomeController{

        var $model;

        function __construct(){
            $this->model = new Product();
        }

        public function index(){
            // echo "<pre>";
            // print_r($_SESSION);
            // echo "</pre>";
            // die;
            $products = $this->model->All();
            require_once('views/home/home.php');
        }

        public function about(){
            require_once('views/home/about.php');
        }
        public function contact(){
            require_once('views/home/contact.php');
        }
        
        
    }
    
 ?>