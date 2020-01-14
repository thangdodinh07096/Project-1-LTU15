<?php 
    
    require_once 'Model.php';

    class Customer extends Model
    {
        var $table_name = 'customers';

        public function FindInBill($id){
            
            $sql = "SELECT * FROM ".$this->table_name." WHERE id = '".$id."'";
            $result = $this->connection->query($sql)->fetch_assoc();
            return $result;
        }
    }
 ?>