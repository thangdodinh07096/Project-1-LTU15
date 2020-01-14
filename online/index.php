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
			case 'detail':
			$controller->detail();
			break;
			case 'get_category':
			$controller->getCategory();
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

		case 'auth':
		require_once('controllers/AuthController.php');
		$controller = new AuthController();
		
		switch ($act) {
			case 'login':
			$controller->login();
			break;
			case 'logout':
			$controller->logout();
			break;
		}
		break;

		case 'buy':
		require_once('controllers/BuyController.php');
		$controller = new BuyController();
		switch ($act) {
			
			case 'cart':
			$controller->cart();
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
			case 'thanks':
			$controller->thanks();
			break;
			default:
			echo "<br> Không tồn tại chức năng";
			break;
		}
		break;

		case 'home':
		require_once('controllers/HomeController.php');
		$controller = new HomeController();
		
		switch ($act) {
			case 'index':
			$controller->index();
			break;
			case 'about':
			$controller->about();
			break;
			case 'contact':
			$controller->contact();
			break;
		}
		break;

	}
}
else{
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

