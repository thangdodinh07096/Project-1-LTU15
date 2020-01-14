<?php 

    require_once 'header.php';

?>

    <div>
        <div style="border: 1.5px solid #17161629; margin-left: 15px;margin-right: 15px;padding: 5px">
            
            <div style="background-color: #bbbbbb30; padding: 10px">
                
            <center>
                <h2>******** HÓA ĐƠN BÁN HÀNG ********</h2>
                <br> 
            </center>
            <div class="row">
                <div class="col-md-1 col-lg-1"></div>
                <div class="col-md-5 col-lg-5">
                    <h4>Mã KH: <?php echo $_SESSION['customer']['id']; ?></h4>
                    <h4>Tên khách hàng: <?php echo $_SESSION['customer']['name']; ?></h4>
                    <h4>Số điện thoại: <?php echo $_SESSION['customer']['mobile']; ?></h4>
                    <h4>Địa chỉ: <?php echo $_SESSION['customer']['address']; ?></h4>
                </div>
                <div class="col-md-5 col-lg-5">
                    <h4>Mã hóa đơn: <?php echo $hoadon['MaHD']; ?></h4>
                    <h4>Ngày bán: <?php echo $hoadon['DateTime']; ?></h4>
                </div>
                <div class="col-md-1 col-lg-1"></div>
            </div>
            </div>
            <br>
            <table style="font-size: 20px !important;" class="table myTable" id="">
                <thead>
                    <tr>
                        <th>MSP</th>
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
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td>
                                <!-- <a class="btn fas fa-caret-left" href="?mod=sale&act=minus&id=<?php echo $product['id']; ?>" style="color: orange; font-size: 30px; font-weight: bold;"></a> -->
                                <?php echo $product['quantity']; ?>
                                <!-- <a class="btn fas fa-caret-right" href="?mod=sale&act=add2cart&id=<?php echo $product['id']; ?>" style="color: green; font-size: 30px; font-weight: bold;"></a> -->
                            </td>
                            <td><?php echo number_format($product['price']); ?>VNĐ</td>
                            <td><?php echo number_format($product['price']*$product['quantity']);?></td>
                            <td>
                                <!-- <a class="fas fa-minus btn btn-danger" href="?mod=sale&act=delete&id=<?php echo $product['id']; ?>"></a> -->
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
            <br>
            <h4 style="text-align: center;">Tổng tiền: <?php echo number_format($total).' VNĐ';?></h4>
            <h4>Nhân viên bán hàng: <?php echo $_SESSION['user']['name']; ?></h4>
            <a class="fas fa-credit-card btn btn-success" style="font-size: 30px;" href="?mod=sale&act=send_mail"> Xác nhận</a>
        </div>
    </div>

<?php 

    require_once 'footer.php';

?>