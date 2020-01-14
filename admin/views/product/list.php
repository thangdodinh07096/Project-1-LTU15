<?php 

    require_once 'header.php';
 ?>

    <div style="padding-left: 30px; padding-right: 30px; padding-top: 50px; padding-bottom: 50px;">
        <center>
            <h1>******** DANH SÁCH SẢN PHẨM ********</h1>
            <br>
            <a href="?mod=product&act=add" class="btn btn-info">Add Product</a>
        </center>
        <table style="font-size: 20px !important;" class="table" id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Category</th>
                    <th>Ảnh</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i=0;
                foreach ($products as $product) { 
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo number_format($product['price']); ?></td>
                        <td><?php echo $product['quantity']; ?></td>
                        <td><?php echo ($product['category_id']); ?></td>
                        <td>
                            <img src="public/image/product_image/<?php echo ($product['image']); ?>" style = " width: 80px; height: 80px ">
                        </td>
                        <td>
                            <a href="?mod=product&act=detail&id=<?php echo $product['id']; ?>" class="btn btn-info">Detail</a>
                            <a href="?mod=product&act=edit&id=<?php echo $product['id']; ?>" class="btn btn-success">Edit</a>
                            <a href="?mod=product&act=delete&id=<?php echo $product['id']; ?>" class="btn btn-danger btn-delete">Delete</a></td>
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
                        console.log(data);

                        $('#product_id').html(data.id);
                        $('#product_name').html(data.name);
                        $('#product_price').html(data.price);
                        $('#product_quantity').html(data.quantity);
                        $('#product_category').html(data.category);
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
