<?php 
    require_once('models/Customer.php');
    require_once('models/Product.php');
    require_once('models/Bill.php');
    require_once('models/BillDetail.php');
    class BuyController{

        var $customer_model;
        var $product_model;
        var $bill_model;
        var $bill_detail_model;

        function __construct(){
            $this->customer_model = new Customer();
            $this->product_model = new Product();
            $this->bill_model = new Bill();
            $this->bill_detail_model = new BillDetail();
        }

        public function cart(){
            if (isset($_SESSION['cart'])){
                require_once('views/buy/cart-tontai.php');
            }
            else{
                require_once('views/buy/cart.php');
            }
            
        }
        
        public function add2cart(){
            $cart = array();
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }
            $product_id = $_GET['id'];
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity']++;
            }else{
                $product = $this->product_model->Find($product_id);
                $product['quantity'] = 1;
                $_SESSION['cart'][$product_id] = $product;
            }
            header('Location: ?mod=buy&act=cart');
        }

        public function minus(){
            $product_id = $_GET['id'];
            if (isset($_SESSION['cart'][$product_id]) && $_SESSION['cart'][$product_id]['quantity'] > 1) {
                $_SESSION['cart'][$product_id]['quantity']--;
            }else{
                unset($_SESSION['cart'][$product_id]);
            }
            header('Location: ?mod=buy&act=cart');
        }

        public function delete(){
            $product_id = $_GET['id'];
            unset($_SESSION['cart'][$product_id]);
            header('Location: ?mod=buy&act=cart');
        }

        public function pay(){
            $customer = $_SESSION['customer'];
            $cart = $_SESSION['cart'];
            $hoadon = array();
            $hoadon['MaHD'] = 'Online_KH'.$customer['id'].'_'.time();
            $hoadon['MaKH'] = $customer['id'];
            $hoadon['DateTime'] = date('Y-m-d H:i:s');
            $hoadon['Status'] = 0;
            $this->bill_model->Create($hoadon);
            $total = 0;
            foreach ($cart as $product) {
                $prod['MaHD'] = $hoadon['MaHD'];
                $prod['MaSP'] = $product['id'];
                $prod['quantity'] = $product['quantity'];
                $prod['price'] = $product['price'];
                $prod['total'] = $product['price']*$product['quantity'];
                $total += $product['price']*$product['quantity'];
                $this->bill_detail_model->Create($prod);
            }
            $udbill['MaHD'] = $hoadon['MaHD'];
            $udbill['total'] = $total;
            $this->bill_model->UpdateBill($udbill);
            require_once('views/buy/thanks.php');
            unset($_SESSION['cart']);
            header('Location: ?mod=buy&act=thanks');
        }
    }
    
 ?>