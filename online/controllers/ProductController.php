<?php 
    require_once('models/Product.php');
    class ProductController{

        var $model;

        function __construct(){
            $this->model = new Product();
        }

        public function list(){
            $products = $this->model->All();
            require_once('views/product/list.php');
        }
        // echo "<pre>";
        // print_r($products);
        // echo "</pre>";
        // die;

        public function detail(){
            $id = isset($_GET['id'])?$_GET['id']:'';
            $product = $this->model->Find($id);
            require_once('views/product/detail.php');
        }

        public function getCategory(){
            // $products = $this->model->All();
            // require_once('views/product/list.php');
            // die;
            $category_id = $_GET['category_id'];
            $products = $this->model->getCategory($category_id);
            // echo "<pre>";
            // print_r($products);
            // echo "</pre>";
            // die;
            require_once('views/our_product.php');
        }
        
    }
    
 ?>


