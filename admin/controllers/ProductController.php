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
        public function add(){
            // echo "<pre>";
            // print_r($_SESSION['user']);
            // echo "</pre>";
            // die;
            require_once('views/product/add.php');
        }

        public function store(){
            require_once('Function.php');
            $data = $_POST;
            unset($data['submit']);
            $nameFileImage = 'product_image';
            $file = Upload('image',$nameFileImage);
            $data['image'] = $file;
            $status = $this->model->Create($data);
            if ($status==TRUE) {
                header('Location: index.php?mod=product&act=list');
            }
        }

        public function detail(){
            
            $id = isset($_GET['id'])?$_GET['id']:'';
            $product = $this->model->Find($id);
            require_once('views/product/detail.php');
        }

        public function edit(){
            $id = isset($_GET['id'])?$_GET['id']:'';
            $product = $this->model->Find($id);
            // echo "<pre>";
            // print_r($product['name']);
            // echo "</pre>";
            // die;
            require_once('views/product/edit.php');
        }

        public function update(){
            require_once('Function.php');
            $data = $_POST; 
            unset($data['submit']);
            $nameFileImage = 'product_image';
            $file = Upload('image',$nameFileImage);
            if ($file!==false) {
                $data['image'] = $file;
            }
            
            $status = $this->model->Update($data);
            if ($status==TRUE) {
                header('Location: index.php?mod=product&act=list');
            };
        }

        public function delete(){

            $id = isset($_GET['id'])?$_GET['id']:'';
            $status = $this->model->Delete();
            if ($status == TRUE) {
                header('Location: index.php?mod=product&act=list');
            };
            
        }
    }
    
 ?>


