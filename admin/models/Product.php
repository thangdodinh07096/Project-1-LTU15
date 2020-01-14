<?php 
    
    require_once 'Model.php';

    class Product extends Model
    {
        var $table_name = 'products';

		public function getQuant($product_id){
        	// $quantity = $this->getQuant($product_id);
            $sql = "SELECT quantity FROM ".$this->table_name." WHERE id = ".$product_id;
            $result = $this->connection->query($sql);
            $product = $result->fetch_assoc()['quantity'];
            return $product;
        }

        public function reduceQuant($product_id,$quantity){
        	$soLuongCon = $this->getQuant($product_id) - $quantity;
            $sql = "UPDATE ".$this->table_name." SET quantity = ".$soLuongCon." WHERE id=".$product_id;
            $result = $this->connection->query($sql);
            return $result;
        }

        public function FindInBill($id){
            $sql = "SELECT * FROM ".$this->table_name." WHERE id = '".$id."'";
            $result = $this->connection->query($sql)->fetch_assoc();
            return $result;
        }
    }
 ?>