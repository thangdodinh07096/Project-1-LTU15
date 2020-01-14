<?php 
    require_once('models/Customer.php');
    require_once('models/Product.php');
    require_once('models/Employee.php');
    require_once('models/Bill.php');
    require_once('models/BillDetail.php');
    class BillController{

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

        public function bill_list(){
            $result = $this->bill_model->All();
            require_once('views/bill/bill_list.php');
        }
        
        public function xu_li(){
            $user = $_SESSION['user']['id'];
            $maHD = $_GET['MaHD'];
            $maKH = $this->bill_model->FindBill($maHD)['MaKH'];
            $_SESSION['customer'] = $this->customer_model->FindInBill($maKH);
            $_SESSION['cart']= $this->bill_detail_model->FindBill($maHD);
            
            foreach ($_SESSION['cart'] as $product) {
                $this->product_model->getQuant($product['MaSP']);
                $this->product_model->reduceQuant($product['MaSP'],$product['quantity']);
            }
            $udbill['MaHD'] = $maHD;
            $udbill['MaNV'] = $user;
            $udbill['status'] = 1;
            $this->bill_model->UpdateBill($udbill);
            
            $hoadonDetail = $this->bill_detail_model->FindBill($maHD);
            $hoadon = $this->bill_model->FindBill($maHD);
            $khachhang = $this->customer_model->FindInBill($hoadon['MaKH']);
            $sanpham = array();
            for ($i=0; $i<count($hoadonDetail); $i++) { 
                $sanpham[] = $this->product_model->FindInBill($hoadonDetail[$i]['MaSP']);
            }
            // echo "<pre>";
            // print_r($hoadonDetail);
            // print_r($sanpham);
            // echo "</pre>";
            // die;
            require_once 'Function.php';
            ob_start();
            include_once 'views/sale/mail-content-confirm.php';
            $contents= ob_get_contents();
            ob_clean();
            sendEmail($_SESSION['customer']['email'],$_SESSION['customer']['name'],$contents,'Đơn hàng');
            header('Location: ?mod=QLBill&act=bill_list');
            unset($_SESSION['cart']);
            unset($_SESSION['customer']);
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
            require_once 'views/bill/QLbill_detail.php';
        }
    }
    
 ?>