<?php 

    require_once 'header.php';
 ?>
    
    <!-- Content page -->
    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <div class="leftbar p-r-20 p-r-0-sm">
                        <!--  -->
                        <h4 class="m-text14 p-b-7">
                            Categories
                        </h4>

                        <ul class="p-b-54">
                            <li class="p-t-4">
                                <a href="#" class="s-text13 active1">
                                    All
                                </a>
                            </li>

                            <li class="p-t-4">
                                <a href="#" class="s-text13">
                                    Văn Học
                                </a>
                            </li>

                            <li class="p-t-4">
                                <a href="#" class="s-text13">
                                    Kịnh Tế
                                </a>
                            </li>

                            <li class="p-t-4">
                                <a href="#" class="s-text13">
                                    Sách Thiếu Nhi
                                </a>
                            </li>

                            <li class="p-t-4">
                                <a href="#" class="s-text13">
                                    Tiểu Sử - Hồi Ký
                                </a>
                            </li>

                            <li class="p-t-4">
                                <a href="#" class="s-text13">
                                    Tâm Lý - Kỹ Năng Sống
                                </a>
                            </li>

                            <li class="p-t-4">
                                <a href="#" class="s-text13">
                                    Sách Nước Ngoài
                                </a>
                            </li>
                        </ul>

                        <div class="search-product pos-relative bo4 of-hidden">
                            <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

                            <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    <!-- Product -->
                    <div class="row">
                        <?php
                            foreach ($products as $product) {
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                    <img style="height: 300px;" src="public/image/product_image/<?php echo $product['image']; ?>" alt="IMG-PRODUCT">

                                    <div class="block2-overlay trans-0-4">
                                        <a style="padding-top: 30px; padding-left: 220px; font-size: 30px !important;" href="?mod=product&act=detail&id=<?php echo $product['id']; ?>" class="hov-pointer trans-0-4">
                                            <i style=" color: white !important" class="icon-wishlist fa fa-info-circle" aria-hidden="true"></i>
                                        </a>
                                        <div class="trans-0-4" style="padding-top: 190px; padding-left: 50px; padding-right: 50px">
                                            <!-- Button -->
                                            <a href="?mod=buy&act=add2cart&id=<?php echo $product['id']; ?>"  class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a style="font-weight: 700 !important; font-size: 20px" href="?mod=product&act=detail&id=<?php echo $product['id']; ?>" class="block2-name dis-block s-text3 p-b-5">
                                        <?php echo $product['name']; ?>
                                    </a>

                                    <span class="block2-price m-text6 p-r-5">
                                        <?php echo number_format($product['price']).'VNĐ'; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <!-- Pagination -->
                    <!-- <div class="pagination flex-m flex-w p-t-26">
                        <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
                        <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

<?php 

    require_once 'footer.php';
 ?>
