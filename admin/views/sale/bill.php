<?php 

require_once 'header.php';

?>
<div class="row" style="">
    <div class="col-md-5 col-lg-5" >  
        <div style="border: 1.5px solid #17161629; margin-left: 15px;margin-right: 1px;padding: 5px">
            <center style="padding: 10px">
                <h2>******** DANH SÁCH SẢN PHẨM ********</h2>
                <br>
            </center>
            <table style="font-size: 20px !important;" class="table myTable" id="">
                <thead>
                    <tr>
                        <th>MSP</th>
                        <th>Tên SP</th>
                        <th>Giá</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($products as $product) {
                        ?>
                        <tr>
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo number_format($product['price']); ?></td>
                            <td>
                                <a class="btn btn-info fas fa-shopping-cart" style="font-size: 15px;" href="?mod=sale&act=add2cart&id=<?php echo $product['id']; ?>"></a>
                                <a class="btn btn-warning fas fa-info-circle" style="font-size: 15px;" href="?mod=product&act=detail&id=<?php echo $product['id']; ?>"></a>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div  class="col-md-7 col-lg-7">
        <div style="border: 1.5px solid #17161629; margin-left: 1px;margin-right: 15px;padding: 5px">
            <div style="background-color: #bbbbbb30; padding: 10px">
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
            <table style="font-size: 20px !important;" class="table myTable" id="">
                <thead>
                    <tr>
                        <th>MSP</th>
                        <th>Tên SP</th>
                        <th>SL</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                        <th>Action</th>
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
                                <a class="btn fas fa-caret-left" href="?mod=sale&act=minus&id=<?php echo $product['id']; ?>" style="color: orange; font-size: 30px; font-weight: bold;"></a>
                                <?php echo $product['quantity']; ?>
                                <a class="btn fas fa-caret-right" href="?mod=sale&act=add2cart&id=<?php echo $product['id']; ?>" style="color: green; font-size: 30px; font-weight: bold;"></a>
                            </td>
                            <td><?php echo number_format($product['price']); ?></td>
                            <td><?php echo number_format($product['price']*$product['quantity']);?></td>
                            <td>
                                <a class="fas fa-minus btn btn-danger btn-delete" href="?mod=sale&act=delete&id=<?php echo $product['id']; ?>"></a>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
            <br>
            <h4 style="text-align: center;">Tổng: <?php echo number_format($total).' VNĐ';?></h4>
            <a class="fas fa-credit-card btn btn-success" style="font-size: 30px;" href="?mod=sale&act=pay"> Thanh toán</a>
            <a class="fas fa-times btn btn-danger" style="font-size: 30px; float: right;" href="?mod=sale&act=del_bill"> Huỷ đơn</a
        </div>
    </div>
</div>

        <script type="text/javascript" charset="utf-8" >

            $('.btn-delete').on('click',function(event){
                event.preventDefault();
                var url = $(this).attr('href');

                swal({
                    title: "Bạn có chắc chắn muốn xóa khách hàng này không?",
                    text: "Một khi đã xóa, sẽ không lấy lại được dữ liệu!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href=url;
                        swal("Đã xóa thành công!", {
                            icon: "success",
                        });
                    } else {
                        swal("Dữ liệu vẫn được bảo toàn!");
                    }
                });
            });

            $('.myTable').DataTable();
        </script>

        <?php 

        require_once 'footer.php';

        ?>