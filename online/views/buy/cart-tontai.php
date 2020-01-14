<?php 

    require_once 'header.php';
?>

    <!-- Title Page -->
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(public/image/cart.png);">
        <h2 class="l-text2 t-center" style="color: #ad50508f">
            Cart
        </h2>
    </section>

    <!-- Cart -->
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            <!-- Cart item -->
            <div class="container-table-cart pos-relative">
                <div class="wrap-table-shopping-cart bgwhite">
                    <table class="table-shopping-cart">
                        <tr class="table-head">
                            <th class="column-1"></th>
                            <th class="column-2">Product</th>
                            <th class="column-3">Price</th>
                            <th class="column-4 p-l-70">Quantity</th>
                            <th class="column-5">Total</th>
                            <th class="column-6">Action</th>
                        </tr>
                        
                        <?php
                        $total = 0;
                        foreach ($_SESSION['cart'] as $product) {
                            $total += $product['price']*$product['quantity'];
                            ?>
                            <tr class="table-row">
                                <td class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden">
                                        <img src="public/image/product_image/<?php echo $product['image']; ?>" alt="IMG-PRODUCT">
                                    </div>
                                </td>
                                <td class="column-2"><?php echo $product['name']; ?></td>
                                <td class="column-3"><?php echo number_format($product['price']); ?></td>
                                <td style="padding-left: 65px" class="column-4">
                                    <a style="float: left;" class="btn btn-danger" href="?mod=buy&act=minus&id=<?php echo $product['id']; ?>">-</a>
                                    <div style="float: left; width: 30px;padding-top: 8px; text-align: center;"><?php echo $product['quantity']; ?></div>
                                    <a style="float: left;" class="btn btn-success" href="?mod=buy&act=add2cart&id=<?php echo $product['id']; ?>">+</a>
                                </td>
                                <td class="column-5"><?php echo number_format($product['price']*$product['quantity']);?></td>
                                <td class="column-6">
                                    <a style="margin-right: 30px;" class="btn btn-danger btn-delete" href="?mod=buy&act=delete&id=<?php echo $product['id']; ?>">DEL</a>
                                </tr>
                            <?php } ?>
                    </table>
                </div>
            </div>

            <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                <div class="flex-w flex-m w-full-sm">
                    <h3 style="text-align: center;">Total: <?php echo number_format($total).' VNĐ';?></h3>
                </div>

                <div class="size10 trans-0-4 m-t-10 m-b-10">
                    <!-- Button -->
                    <a class= "flex-c-m sizefull btn-success bo-rad-23 hov1 s-text1 trans-0-4" style="font-size: 30px;" href="?mod=buy&act=pay">PAY</a>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" charset="utf-8" >

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

        $('.myTable').DataTable();
    </script>

<?php 

    require_once 'footer.php';
?>