<?php 
    
    require_once 'Model.php';

    class Bill extends Model
    {
        var $table_name = 'bills';
        public function UpdateBill($data){
            $temps = "";
            foreach ($data as $key => $value) {
                $temps .= $key."='".$value."',";
            }
            $temps = trim($temps,",");
                $sql = "UPDATE ".$this->table_name." SET ".$temps." WHERE MaHD= '".$data['MaHD']."'";
                $status = $this->connection->query($sql);
                return $status; 
        }

        public function FindBill($MaHD){
            $sql = "SELECT * FROM ".$this->table_name." WHERE MaHD = '".$MaHD."'";
            $result = $this->connection->query($sql)->fetch_assoc();
            return $result;
        }

        public function SPConfirm($MaHD){
            $sql = "SELECT products.name, bill_detail.quantity, products.price FROM products, bills, bill_detail WHERE products.id = bill_detail.MaSP AND bill_detail.MaHD = bills.MaHD AND bills.MaHD = '".$MaHD."'";
            // die($sql);
            $result = $this->connection->query($sql)->fetch_assoc();
            return $result;
        }
    }
 ?>