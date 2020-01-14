<?php 

    require_once 'header.php';

  ?>

    <div style="padding-left: 30px; padding-right: 30px; padding-top: 50px; padding-bottom: 50px;">
        <center>
            <h1>******** DANH SÁCH NHÂN VIÊN ********</h1>
            <br>
            <a href="?mod=employee&act=add" class="btn btn-info">Add Employee</a>
        </center>
        <table style="font-size: 20px !important;" class="table" id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên nhân viên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Ảnh</th>
                    <!-- <th>Password</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i=0;
                foreach ($employees as $employee) { 
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $employee['name']; ?></td>
                        <td><?php echo $employee['email']; ?></td>
                        <td><?php echo $employee['mobile']; ?></td>
                        <td><?php echo $employee['address']; ?></td>
                        <td>
                            <img src="public/image/employee_image/<?php echo ($employee['image']); ?>" style = " width: 80px; height: 90px ">
                        </td>
                        <td>
                            <a href="?mod=employee&act=detail&id=<?php echo $employee['id']; ?>" class="btn btn-info">Detail</a>
                            <a href="?mod=employee&act=edit&id=<?php echo $employee['id']; ?>" class="btn btn-success">Edit</a>
                            <a href="?mod=employee&act=delete&id=<?php echo $employee['id']; ?>" class="btn btn-danger btn-delete">Delete</a></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>

        <script type="text/javascript" charset="utf-8" >

            $('.btn-detail').on('click',function(){
                $('#modal-show').modal('show');
                var id = $(this).data('id');
                $.ajax({
                    type:'get',
                    url: '?mod=product&act=detail&id='+id,
                    dataType: 'json',
                    success : function(data){
                        $('#product_id').html(data.id);
                        $('#product_name').html(data.name);
                        $('#product_price').html(data.price);
                        $('#product_quantity').html(data.quantity);
                        $('#product_category').html(data.category);
                        }
                    })

            })


            $('.btn-delete').on('click',function(event){
                event.preventDefault();
                var url = $(this).attr('href');

                swal({
                    title: "Bạn có chắc chắn muốn xóa nhân viên này không?",
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
    </body>
    
<?php 

    require_once 'footer.php';

  ?>