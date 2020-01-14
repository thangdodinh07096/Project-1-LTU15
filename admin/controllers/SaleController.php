<?php 
    require_once('models/Customer.php');
    require_once('models/Product.php');
    require_once('models/Employee.php');
    require_once('models/Bill.php');
    require_once('models/BillDetail.php');
    class SaleController{

        var $customer_model;
        var $product_model;
        var $employee_model;
        var $bill_model;
        var $bill_detail_model;

        function __construct(){
            $this->customer_model = new Customer();
            $this->product_model = new Product();
            $this->employee_model = new Employee();
            $this->bill_model = new Bill();
            $this->bill_detail_model = new BillDetail();
        }

        public function customer_list(){
            if (isset($_SESSION['customer'])) {
                header('Location: ?mod=sale&act=sale');
            }else{
                $customers = $this->customer_model->All(); 
                require_once('views/sale/customers.php');
            }
        }
        
        public function purchase(){
            if (isset($_GET['id'])) {
                $maKH = $_GET['id'];
                $customer = $this->customer_model->Find();
                $_SESSION['customer'] = $customer;
                header('Location: ?mod=sale&act=sale');
            }else{
                header('Location: ?mod=sale&act=create_bill');
            }
        }

        public function bill(){
            // $customer = $_SESSION['customer'];
            $products = $this->product_model->All(); 
            $cart = array();
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }else{$_SESSION['cart'] = $cart;}
            require_once('views/sale/bill.php');
        }

        public function add2cart(){
            $product_id = $_GET['id'];
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity']++;
            }else{
                $product = $this->product_model->Find($product_id);
                $product['quantity'] = 1;
                $_SESSION['cart'][$product_id] = $product;
            }
            header('Location: ?mod=sale&act=sale');
        }

        public function minus(){
            $product_id = $_GET['id'];
            if (isset($_SESSION['cart'][$product_id]) && $_SESSION['cart'][$product_id]['quantity'] > 1) {
                $_SESSION['cart'][$product_id]['quantity']--;
            }else{
                unset($_SESSION['cart'][$product_id]);
            }
            header('Location: ?mod=sale&act=sale');
        }

        public function delete(){
            $product_id = $_GET['id'];
            unset($_SESSION['cart'][$product_id]);
            header('Location: ?mod=sale&act=sale');
        }

        public function pay(){
            $user = $_SESSION['user'];
            $customer = $_SESSION['customer'];
            $cart = $_SESSION['cart'];
            $hoadon = array();
            $hoadon['MaHD'] = 'NV'.$user['id'].'_KH'.$customer['id'].'_'.time();
            $hoadon['MaKH'] = $customer['id'];
            $hoadon['MaNV'] = $user['id'];
            $hoadon['DateTime'] = date('Y-m-d H:i:s');
            $hoadon['status'] = 0;
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
                $this->product_model->reduceQuant($prod['MaSP'],$prod['quantity']);
                $this->product_model->getQuant($prod['MaSP']);
            }
            
            $udbill['MaHD'] = $hoadon['MaHD'];
            $udbill['Total'] = $total;
            $this->bill_model->UpdateBill($udbill);
            // echo "<pre>";
            // print_r($_SESSION['cart']);
            // echo "</pre>";
            // die;
            require_once 'Function.php';
            ob_start();
            include_once 'views/sale/mail-content.php';
            $contents= ob_get_contents();
            ob_clean();
            sendEmail($_SESSION['customer']['email'],$_SESSION['customer']['name'],$contents,'Đơn hàng');
            header('Location: ?mod=sale&act=bill_detail&MaHD='.$hoadon['MaHD']);
            unset($_SESSION['cart']);
            unset($_SESSION['customer']);
        }

         public function del_bill(){
            unset($_SESSION['cart']);
            unset($_SESSION['customer']);
            header('Location: ?mod=sale&act=customer_list');
         }

        public function bill_detail(){
            $maHD = $_GET['MaHD'];
            $hoadonDetail = $this->bill_detail_model->FindBill($maHD);
            $hoadon = $this->bill_model->FindBill($maHD);
            $khachhang = $this->customer_model->FindInBill($hoadon['MaKH']);
            $sanpham = array();
            for ($i=0; $i<count($hoadonDetail); $i++) { 
                $sanpham[] = $this->product_model->FindInBill($hoadonDetail[$i]['MaSP']);
            }
            require_once 'views/sale/bill_detail.php';
        }
    }
    
 ?>