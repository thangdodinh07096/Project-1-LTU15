<?php 

    require_once 'header.php';

  ?>

	<div class="container">
		<center><h1>******** CHI TIẾT SẢN PHẨM ********</h1></center>
		<br>
		<div class="row container">
			<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<td><h4><?php echo "<br>Id: ".$product['id']; ?></h4></td>
				<td><h4><?php echo "<br>Tên sản phẩm: ".$product['name']; ?></h4></td>
				<td><h4><?php echo "<br>Giá: ".number_format($product['price'])." VND"; ?></h4></td>
				<td><h4><?php echo "<br>Số lượng sản phẩm: ".$product['quantity']; ?></h4></td>
				<td><h4><?php echo "<br>Thể loại: ".($product['category_id']); ?></h4></td>
				<td><h4><?php echo "<br>Tác giả: ".($product['author']); ?></h4></td>
				<td><h4><?php echo "<br>Nhà xuất bản: ".($product['publisher']); ?></h4></td>
				<td><h4><?php echo "<br>Năm xuất bản: ".($product['year']); ?></h4></td>
				<td><h4><?php echo "<br>Kích thước: ".($product['size']); ?></h4></td>
				<td><h4><?php echo "<br>Số trang: ".($product['pages']); ?></h4></td>
				<td><h4><?php echo "<br>Status: ".($product['status']); ?></h4></td>
				
			</div>
			<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<img src="public/image/product_image/<?php echo ($product['image']); ?>" style = " width: 250px; height: 320px; float: right">
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<td><h4><br>Mô tả: <h6><?php echo $product['content']; ?></h6></h4></td>
			</div>
		</div>
		<br>
		<center>
			<a href="index.php?mod=product&act=list" class="btn btn-info">Danh sách</a>
			<!-- <a href="?mod=sale&act=add2cart&id=<?php echo $product['id']; ?>" class="btn btn-info">Mua hàng</a> -->
		</center>
	</div>
<?php 

    require_once 'footer.php';

  ?>