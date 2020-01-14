<?php 

    require_once 'header.php';
 ?>

    <div style="padding-left: 30px; padding-right: 30px; padding-top: 50px; padding-bottom: 50px;">
        <center>
            <h1>******** DANH SÁCH HÓA ĐƠN ********</h1>
            <br>
            <!-- <a href="?mod=product&act=add" class="btn btn-info">Add Product</a> -->
        </center>
        <table style="font-size: 20px !important;" class="table" id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã hóa đơn</th>
                    <th>Mã khách hàng</th>
                    <th>Mã nhân viên</th>
                    <th>Ngày tháng</th>
                    <th>Tổng tiền</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i=0;
                foreach ($result as $bill) { 
                    $i++;
                    if ($bill['status']==0) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $bill['MaHD']; ?></td>
                        <td><?php echo $bill['MaKH']; ?></td>
                        <td><?php echo $bill['MaNV']; ?></td>
                        <td><?php echo $bill['DateTime']; ?></td>
                        <td><?php echo number_format($bill['total']); ?></td>
                        <td>
                            <a href="?mod=QLBill&act=xu_li&MaHD=<?php echo $bill['MaHD']; ?>" class="btn btn-success">Xử lí đơn</a>
                            <a href="?mod=QLBill&act=bill_detail&MaHD=<?php echo $bill['MaHD']; ?>" class="btn btn-info">Chi tiết</a>
                        </tr>

                    <?php }} ?>
                </tbody>
            </table>
        </div>

        <script type="text/javascript" charset="utf-8" >

            $('.btn-detail').on('click',function(){
                $('#modal-show').modal('show');
                var id = $(this).data('id');
                $.ajax({
                    type:'get',
                    url: '?mod=bill&act=detail&id='+id,
                    dataType: 'json',
                    success : function(data){
                        console.log(data);

                        $('#bill_id').html(data.id);
                        $('#bill_name').html(data.name);
                        $('#bill_price').html(data.price);
                        $('#bill_quantity').html(data.quantity);
                        $('#bill_category').html(data.category);
                            // $('#product_image').html(data.image);
                        }
                    })

            })


            $('.btn-delete').on('click',function(event){
                event.preventDefault();
                var url = $(this).attr('href');

                swal({
                    title: "Bạn có chắc chắn muốn xóa sản phẩm này không?",
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

            $('#myTable').DataTable();

        </script>

<?php 

    require_once 'footer.php';
 ?>
