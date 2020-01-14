<!DOCTYPE html>
<?php 

    require_once 'header.php';

  ?>
	<div style="padding-left: 30px; padding-right: 30px; padding-top: 50px; padding-bottom: 50px;">
		<center><h1>******** CHI TIẾT KHÁCH HÀNG ********</h1></center>
		<br>
		<div class="row">
			<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
			</div>
			<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<td><h4><?php echo "<br>Id: ".$customer['id']; ?></h4></td>
				<td><h4><?php echo "<br>Tên khách hàng: ".$customer['name']; ?></h4></td>
				<td><h4><?php echo "<br>Email: ".$customer['email']; ?></h4></td>
				<td><h4><?php echo "<br>Số điện thoại: ".$customer['mobile']; ?></h4></td>
				<td><h4><?php echo "<br>Địa chỉ: ".($customer['address']); ?></h4></td>		
			</div>
			<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<img src="public/image/customer_image/<?php echo ($customer['image']); ?>" style = " width: 250px; height: 320px; float: right; ">
			</div>
			<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
			</div>
		</div>
		<br>
		<center><a href="?mod=customer&act=list" class="btn btn-info">Back</a></center>
	</div>
<?php 

    require_once 'footer.php';

  ?>