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
                    <h4>Mã KH: <?php echo $khachhang['id']; ?></h4>
                    <h4>Tên khách hàng: <?php echo $khachhang['name']; ?></h4>
                    <h4>Số điện thoại: <?php echo $khachhang['mobile']; ?></h4>
                    <h4>Địa chỉ: <?php echo $khachhang['address']; ?></h4>
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
                    $i=0;
                    $total = 0;
                    foreach ($hoadonDetail as $product) {

                        $total += $product['price']*$product['quantity'];
                        ?>
                        <tr>
                            <td><?php echo $product['MaSP']; ?></td>
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
            <h4 style="text-align: center;">Tổng tiền: <?php echo number_format($total).' VNĐ';?></h4>
            <a href="?mod=QLBill&act=xu_li&MaHD=<?php echo $hoadon['MaHD']; ?>" class="btn btn-success">Xử lí đơn</a>
        </div>
    </div>

<?php 

    require_once 'footer.php';

?>