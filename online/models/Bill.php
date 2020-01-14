<?php 
    
    require_once 'Model.php';

    class Bill extends Model
    {
        var $table_name = 'bills';

        public function UpdateBill($data){
            $temps = "";
            foreach ($data as $key => $value) {
                $temps .= $key."='".$value."',";
                // echo "</br>".$temps;
            }
            // die;
            $temps = trim($temps,",");
            
                $sql = "UPDATE ".$this->table_name." SET ".$temps." WHERE MaHD= '".$data['MaHD']."'";
                // die($sql); 
                $status = $this->connection->query($sql);
                return $status; 
        }

        public function FindBill($id){
            $sql = "SELECT * FROM ".$this->table_name." WHERE MaHD = '".$id."'";
            $result = $this->connection->query($sql)->fetch_assoc();
            return $result;
        }
    }
    
    
 ?>