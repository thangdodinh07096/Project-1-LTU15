<?php
	session_start();

	if (isset($_SESSION['isLogin']) && $_SESSION['isLogin']==true) {
		$mod = "home";
		$act = "index";

		if(isset($_GET['mod'])){
			$mod = $_GET['mod'];
		}
		if(isset($_GET['act'])){
			$act = $_GET['act'];
		}

		switch ($mod) {
			case 'product':
			require_once('controllers/ProductController.php');
			$controller = new ProductController();
			switch ($act) {
				case 'list':
				$controller->list();
				break;
				case 'add':
				$controller->add();
				break;
				case 'store':
				$controller->store();
				break;
				case 'detail':
				$controller->detail();
				break;
				case 'edit':
				$controller->edit();
				break;
				case 'update':
				$controller->update();
				break;
				case 'delete':
				$controller->delete();
				break;
				default:
				echo "<br> Không tồn tại chức năng";
				break;
			}
			break;

			case 'customer':
			require_once('controllers/CustomerController.php');
			$controller = new CustomerController();
			switch ($act) {
				case 'list':
				$controller->list();
				break;
				case 'add':
				$controller->add();
				break;
				case 'store':
				$controller->store();
				break;
				case 'detail':
				$controller->detail();
				break;
				case 'edit':
				$controller->edit();
				break;
				case 'update':
				$controller->update();
				break;
				case 'delete':
				$controller->delete();
				break;
				default:
				echo "<br> Không tồn tại chức năng";
				break;
			}
			break;
			
			case 'employee':
			require_once('controllers/EmployeeController.php');
			$controller = new EmployeeController();
			switch ($act) {
				case 'list':
				$controller->list();
				break;
				case 'add':
				$controller->add();
				break;
				case 'store':
				$controller->store();
				break;
				case 'detail':
				$controller->detail();
				break;
				case 'edit':
				$controller->edit();
				break;
				case 'update':
				$controller->update();
				break;
				case 'delete':
				$controller->delete();
				break;
				default:
				echo "<br> Không tồn tại chức năng";
				break;
			}
			break;

			case 'auth':
			require_once('controllers/AuthController.php');
			$controller = new AuthController();
			$act = isset($_GET['act'])?$_GET['act']:'loginForm';
			switch ($act) {
				case 'logout':
					$controller->logout();
					break;
			}
			break;

			case 'login':
			require_once('controllers/LoginController.php');
			$controller = new LoginController();
			switch ($act) {
				
				case 'login':
				$controller->login();
				break;
				case 'login_process':
				$controller->login_process();
				break;
				case 'success':
				$controller->success();
				break;
				case 'logout':
				$controller->logout();
				break;
				default:
				echo "<br> Không tồn tại chức năng";
				break;
			}
			break;

			case 'sale':
			require_once('controllers/SaleController.php');
			$controller = new SaleController();
			switch ($act) {
				
				case 'customer_list':
				$controller->customer_list();
				break;
				case 'create_bill':
				$controller->purchase();
				break;
				case 'sale':
				$controller->bill();
				break;
				case 'add2cart':
				$controller->add2cart();
				break;
				case 'minus':
				$controller->minus();
				break;
				case 'delete':
				$controller->delete();
				break;
				case 'pay':
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$controller->pay();
				break;
				case 'del_bill':
				$controller->del_bill();
				break;
				case 'bill_detail':
				$controller->bill_detail();
				break;
				case 'send_mail':
				$controller->send_mail();
				break;
				default:
				echo "<br> Không tồn tại chức năng";
				break;
			}
			break;

			case 'QLBill':
			require_once('controllers/BillController.php');
			$controller = new BillController();
			switch ($act) {
				case 'bill_list':
				$controller->bill_list();
				break;
				case 'xu_li':
				$controller->xu_li();
				break;
				case 'bill_detail':
				$controller->bill_detail();
				break;
				case 'send_mail':
				$controller->send_mail();
				break;
				default:
				echo "<br> Không tồn tại chức năng";
				break;
			}
			break;

			default:
				require_once 'header.php';
			?>
			<div style=" background-image: url('img/homebg.jpg');
			background-size: cover;
			text-align: center;
			font-family: 'Rubik', sans-serif !important;
			background-position: center center;
			color: white !important;
			z-index: 10000;
			background-color:#bb61619c !important;" id="header" class="home">

			<div style="background-color: black;
			background:#00000070;" class="mo">
			<div class="container">
				<div id="carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel" data-slide-to="0" class="active"></li>
						<li data-target="#carousel" data-slide-to="1"></li>
						<li data-target="#carousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<div style="padding: 150px 35px !important;background-color: transparent !important;" class="jumbotron bg-color-none">
								<h1 class="display-4">WELL COME TO MY PROJECT</h1>
								<p class="lead">We Make Awsome Theme For Your Business</p>
								<a class="btn btn-primary btn-lg" href="#" role="button">LEARN MORE</a>
							</div>
						</div>
						<div class="carousel-item">
							<div style="padding: 150px 35px !important;background-color: transparent !important;" class="jumbotron bg-color-none">
								<h1 class="display-4">WELL COME TO MY PROJECT</h1>
								<p class="lead">We Make Awsome Theme For Your Business</p>
								<a class="btn btn-primary btn-lg" href="#" role="button">LEARN MORE</a>
							</div>
						</div>
						<div class="carousel-item">
							<div style="padding: 150px 35px !important;background-color: transparent !important;" class="jumbotron bg-color-none">
								<h1 class="display-4">WELL COME TO MY PROJECT</h1>
								<p class="lead">We Make Awsome Theme For Your Business</p>
								<a class="btn btn-primary btn-lg" href="#" role="button">LEARN MORE</a>
							</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
		</div>
		<center>
			<h1>Zent PHP</h1>
			<br>
			<h3 style="color: red">Code Your Life!</h3>
			<br>
			<h2 style="color: orange; font-weight: bold;">GIAO DIỆN ADMIN</h2>
		</center>
		<?php 

			require_once("footer.php");

			break;
			}
	}else{
		$mod = 'auth';
		require_once('controllers/AuthController.php');
		$controller = new AuthController();
		$act = isset($_GET['act'])?$_GET['act']:'loginForm';
		switch ($act) {
			case 'login':
				$controller->login();
				break;
			
			default:
				$controller->loginForm();
				break;
		}
	}
?>

	