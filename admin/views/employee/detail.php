<!DOCTYPE html>
<?php 

    require_once 'header.php';

  ?>
	<div style="padding-left: 30px; padding-right: 30px; padding-top: 50px; padding-bottom: 50px;">
		<center><h1>******** CHI TIẾT NHÂN VIÊN ********</h1></center>
		<br>
		<div class="row">
			<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
			</div>
			<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<td><h4><?php echo "<br>Id: ".$employee['id']; ?></h4></td>
				<td><h4><?php echo "<br>Tên nhân viên: ".$employee['name']; ?></h4></td>
				<td><h4><?php echo "<br>Email: ".$employee['email']; ?></h4></td>
				<td><h4><?php echo "<br>Số điện thoại: ".$employee['mobile']; ?></h4></td>
				<td><h4><?php echo "<br>Địa chỉ: ".$employee['address']; ?></h4></td>
			</div>
			<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<img src="public/image/employee_image/<?php echo ($employee['image']); ?>" style = "float: right; width: 250px; height: 320px ">
			</div>
			<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
			</div>
		</div>
		<br>
		<center><a href="?mod=employee&act=list" class="btn btn-info">Back</a></center>
	</div>
<?php 

    require_once 'footer.php';

  ?>