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
                <h2>******** HÓA ĐƠN ********</h2>
                <br>
                <h4>Mã KH: <?php echo $_SESSION['customer']['id']; ?></h4>
                <h4>Tên khách hàng: <?php echo $_SESSION['customer']['name']; ?></h4>
                <h4>Số điện thoại: <?php echo $_SESSION['customer']['mobile']; ?></h4>
                <h4>Địa chỉ: <?php echo $_SESSION['customer']['address']; ?></h4>
            </div>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá/Sản phẩm</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=0;
                        $total = 0;
                        foreach ($hoadonDetail as $product) {
                            $total += $product['price']*$product['quantity'];
                    ?>
                            <tr>
                                <!-- <td><?php echo $product['MaSP']; ?></td> -->
                                <td><?php echo $sanpham[$i]['name']; ?></td>
                                <td><?php echo $product['quantity']; ?></td>
                                <td><?php echo number_format($product['price']); ?></td>
                                <td><?php echo number_format($product['total']); ?></td>
                            </tr>
                    <?php 
                        $i++; } 
                    ?>
                </tbody>
            </table>
            <br>
            <h4>Tổng tiền: <?php echo number_format($total).' VNĐ';?></h4>
            <br>
            <h4>Nhân viên bán hàng: <?php echo $_SESSION['user']['name'];?></h4>
        </div>
    </div>
	
</body>
</html>