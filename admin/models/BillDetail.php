<?php 
    
    require_once 'Model.php';

    class BillDetail extends Model
    {
        var $table_name = 'bill_detail';
        public function FindBill($MaHD){
            $sql = "SELECT * FROM ".$this->table_name." WHERE MaHD = '".$MaHD."'";
            $result = $this->connection->query($sql);
            $hoadonDetail = array();
            while($row = $result->fetch_assoc()) { 
                $hoadonDetail[] = $row;
            }
            return $hoadonDetail;
        }
    }
 ?>