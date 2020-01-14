<?php 
    
    require_once 'Model.php';

    class Employee extends Model
    {
        var $table_name = 'employees';

        public function Dang_nhap(){
        	$email = $_POST["email"];
            $sql = "SELECT name, email, password FROM ".$this->table_name." WHERE email = '".$email."'";
            $result = $this->connection->query($sql);
            $employee = $result->fetch_assoc();

            return $employee;
        }

        public function FindInBill($id){
            
            $sql = "SELECT * FROM ".$this->table_name." WHERE id = '".$id."'";
            $result = $this->connection->query($sql)->fetch_assoc();
            return $result;
        }
    }
 ?>