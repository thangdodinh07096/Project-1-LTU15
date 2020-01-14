<?php 
    require_once('models/Employee.php');
    class EmployeeController{

        var $model;

        function __construct(){
            $this->model = new Employee();
        }

        public function list(){
            $employees = $this->model->All(); 
            require_once('views/employee/list.php');
        }
        
        public function add(){
            require_once('views/employee/add.php');
        }

        public function store(){

            require_once('Function.php');
            $data = $_POST;
            unset($data['submit']);
            $nameFileImage = 'employee_image';
            $file = Upload('image',$nameFileImage);
            $data['image'] = $file; 
            $data['password'] = md5($data['password']);
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // die;
            $status = $this->model->Create($data);
            if ($status==TRUE) {
                header('Location: index.php?mod=employee&act=list');
            }
        }

        public function detail(){
            
            $id = isset($_GET['id'])?$_GET['id']:'';
            $employee = $this->model->Find($id);
            require_once('views/employee/detail.php');
        }

        public function edit(){
            $id = isset($_GET['id'])?$_GET['id']:'';
            $employee = $this->model->Find($id);
            // echo "<pre>";
            // print_r($employee['name']);
            // echo "</pre>";
            // die;
            require_once('views/employee/edit.php');
        }

        public function update(){
            require_once('Function.php');
            $data = $_POST; 
            unset($data['submit']);
            $nameFileImage = 'employee_image';
            $file = Upload('image',$nameFileImage);
            if ($file!==false) {
                $data['image'] = $file;
            }
            $data['password'] = md5($data['password']);
            $status = $this->model->Update($data);
            if ($status==TRUE) {
                header('Location: index.php?mod=employee&act=list');
            };
        }

        public function delete(){

            $id = isset($_GET['id'])?$_GET['id']:'';
            $status = $this->model->Delete();
            if ($status == TRUE) {
                header('Location: index.php?mod=employee&act=list');
            };          
        }    
    }
    
 ?>