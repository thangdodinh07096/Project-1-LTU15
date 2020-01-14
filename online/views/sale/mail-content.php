<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đơn Hàng</title>
</head>
<body>
	<div>
        <div>
            <div>
                <center>
                    <h2>******** HÓA ĐƠN ********</h2>
                    <br> 
                </center>
                <h4>Mã KH: <?php echo $_SESSION['customer']['id']; ?></h4>
                <h4>Tên khách hàng: <?php echo $_SESSION['customer']['name']; ?></h4>
                <h4>Số điện thoại: <?php echo $_SESSION['customer']['mobile']; ?></h4>
                <h4>Địa chỉ: <?php echo $_SESSION['customer']['address']; ?></h4>
            </div>
            <br>
            <table>
                <thead>
                    <tr>
                        <!-- <th>MSP</th> -->
                        <th>Tên SP</th>
                        <th>SL</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $product) {
                        $total += $product['price']*$product['quantity'];
                        ?>
                        <tr>
                            <!-- <td><?php echo $product['id']; ?></td> -->
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['quantity']; ?></td>
                            <td><?php echo number_format($product['price']); ?></td>
                            <td><?php echo number_format($product['price']*$product['quantity']);?></td>
                            <td>
                                <!-- <a class="fas fa-minus btn btn-danger" href="?mod=sale&act=delete&id=<?php echo $product['id']; ?>"></a> -->
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
            <br>
            <h4>Tổng tiền: <?php echo number_format($total).' VNĐ';?></h4>
            <br>
            <h4>Nhân viên bán hàng: <?php echo $_SESSION['employee']['name'];?></h4>
            <!-- <a class="fas fa-credit-card btn btn-success" style="font-size: 30px;" href="?mod=sale&act=send_mail"> Xác nhận</a> -->
        </div>
    </div>
	
</body>
</html>