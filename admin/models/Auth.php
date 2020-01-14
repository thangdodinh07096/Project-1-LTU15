<?php 

	include_once('Connection.php');
    class Auth{
        var $connection;

        function __construct(){
            $conn_obj = new Connection();
            $this->connection = $conn_obj->conn;
        }

        public function Login($email,$password){
            $query = "SELECT * FROM employees WHERE email = '".$email."' AND password = '".$password."'";
            $result = $this->connection->query($query)->fetch_assoc();
            return $result;
        }

    }
 ?>