<?php 
    require_once('models/Customer.php');
    class CustomerController{

        var $model;

        function __construct(){
            $this->model = new Customer();
        }

        public function list(){
            $customers = $this->model->All(); 
            require_once('views/customer/list.php');
        }
        
        public function add(){
            require_once('views/customer/add.php');
        }

        public function store(){

            require_once('Function.php');
            $data = $_POST;
            unset($data['submit']);
            $nameFileImage = 'customer_image';
            $file = Upload('image',$nameFileImage);
            $data['image'] = $file;
                
            $status = $this->model->Create($data);
            if ($status==TRUE) {
                header('Location: index.php?mod=customer&act=list');
            }
        }

        public function detail(){
            
            $id = isset($_GET['id'])?$_GET['id']:'';
            $customer = $this->model->Find($id);
            require_once('views/customer/detail.php');
        }

        public function edit(){
            $id = isset($_GET['id'])?$_GET['id']:'';
            $customer = $this->model->Find($id);
            // echo "<pre>";
            // print_r($customer['name']);
            // echo "</pre>";
            // die;
            require_once('views/customer/edit.php');
        }

        public function update(){
            require_once('Function.php');
            $data = $_POST; 
            unset($data['submit']);
            $nameFileImage = 'customer_image';
            $file = Upload('image',$nameFileImage);
            if ($file!==false) {
                $data['image'] = $file;
            }
            
            $status = $this->model->Update($data);
            if ($status==TRUE) {
                header('Location: index.php?mod=customer&act=list');
            };
        }

        public function delete(){

            $id = isset($_GET['id'])?$_GET['id']:'';
            $status = $this->model->Delete();
            if ($status == TRUE) {
                header('Location: index.php?mod=customer&act=list');
            };
            
        }
    }
    
 ?>