<?php 
	function Upload($input){
		if(isset($_POST['submit'])){ // kiểm tra xem button Submit đã được click hay chưa ? 
	    
	        $target_dir = "public/image/product_image/";  // thư mục chứa file upload

	        $target_file = $target_dir . basename($_FILES[$input]["name"]); // link sẽ upload file lên
	        
	        if (move_uploaded_file($_FILES[$input]["tmp_name"], $target_file)) { // nếu upload file không có lỗi 
	           return  basename( $_FILES[$input]["name"]);
	        } else { 
	            return false;
	        }
	    }   
	}

	function sendEmail($email_recive,$name,$contents,$subject){
        // Khai báo thư viên phpmailer
        require "public/phpmailer/PHPMailerAutoload.php";
        require "public/phpmailer/class.phpmailer.php";
        // Khai báo tạo PHPMailer
        $mail = new PHPMailer();
        //Khai báo gửi mail bằng SMTP
        $mail->IsSMTP();
        
        $mail->setLanguage('vi', '/optional/path/to/language/directory/');
        $mail->SMTPDebug  = 1;
                $mail->SMTPOptions = array (
                'ssl' => array(
                'verify_peer'  => false,
                'verify_peer_name'  => false,
                'allow_self_signed' => true)
                );
        $mail->CharSet="UTF-8";
        $mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
        $mail->Host       = "smtp.gmail.com"; //host smtp để gửi mail
        $mail->Port       = 587; // cổng để gửi mail
        $mail->SMTPSecure = "tls"; //Phương thức mã hóa thư - ssl hoặc tls
        $mail->SMTPAuth   = true; //Xác thực SMTP
        $mail->Username   = "nguyenthanhcong170803@gmail.com"; // Tên đăng nhập tài khoản Gmail
        $mail->Password   = "Thang1998tlhp"; //Mật khẩu của gmail
        $mail->SetFrom("nguyenthanhcong170803@gmail.com", "Đơn hàng"); // Thông tin người gửi
        $mail->AddReplyTo("nguyenthanhcong170803@gmail.com","Đình Thắng");// Ấn định email sẽ nhận khi người dùng reply lại.
        $mail->AddAddress($email_recive, $name);//Email của người nhận
        //$mail->AddCC($email_recive, $name);//Email của người nhận
        $mail->Subject = $subject; //Tiêu đề của thư
        $mail->MsgHTML($contents); //Nội dung của bức thư.
        // $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
        // Gửi thư với tập tin html
        $mail->AltBody = "Đơn hàng của bạn.";//Nội dung rút gọn hiển thị bên ngoài thư mục thư.
        //$mail->AddAttachment("images/attact-tui.gif");//Tập tin cần attach

        //Tiến hành gửi email và kiểm tra lỗi
        if(!$mail->Send()) {
                    return false;
        } else {
                    return true;
        }

    }
?>