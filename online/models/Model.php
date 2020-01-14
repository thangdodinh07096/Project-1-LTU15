<?php 
    include_once('Connection.php');
    class Model{
        var $connection;
        var $table_name = '';
        function __construct(){
            $conn_obj = new Connection();
            $this->connection = $conn_obj->conn;
        }

        public function All(){
            $sql = "SELECT * FROM ".$this->table_name;
            $result = $this->connection->query($sql);
            $products = array();
            while($row = $result->fetch_assoc()) { 
                $products[] = $row;
            }
            return $products;
        }

        public function Find(){
            $id = $_GET["id"];
            $sql = "SELECT * FROM ".$this->table_name." WHERE id = ".$id;
            $result = $this->connection->query($sql);
            $product = $result->fetch_assoc();
            return $product;
        }

        public function detail2(){
            $id = $_GET["id"];
            $sql = "SELECT * FROM ".$this->table_name." WHERE id = ".$id;
            $result = $this->connection->query($sql);
            $product = $result->fetch_assoc();
            return $product;
        }

        public function Create($data){
            $fields = "";
            $values = "";
            foreach ($data as $key => $value) {
                $fields .= $key.",";
                $values .="'".$value."',";
            }
            $fields = trim($fields,",");
            $values = trim($values,",");
            $sql = "INSERT INTO ".$this->table_name." (".$fields.") VALUES (".$values.")";
            $status = $this->connection->query($sql);
            return $status;
        }

        public function Update($data){
            $temps = "";
            foreach ($data as $key => $value) {
                $temps .= $key."='".$value."',";
                echo "</br>".$temps;
            }
            $temps = trim($temps,",");
            $sql = "UPDATE ".$this->table_name." SET ".$temps." WHERE id=".$data['id'];
            $status = $this->connection->query($sql);
            return $status; 
        }

        public function Delete(){
            $id = $_GET["id"];
            $sql = "DELETE FROM ".$this->table_name." WHERE id=".$id;
            $status = $this->connection->query($sql);
            return $status;
        }

    }
 ?>
