<?php 

    require_once 'header.php';

  ?>
	<div style="padding-left: 100px; padding-right: 100px; padding-top: 50px; padding-bottom: 50px;">
        <form action="?mod=employee&act=store" method="POST" role="form" enctype="multipart/form-data">
            <h1>Thêm nhân viên mới</h1>
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="">Tên nhân viên</label>
                        <input type="text" class="form-control" id="" placeholder="Nhập tên nhân viên" name="name">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" id="" placeholder="Nhập Email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="number" class="form-control" id="" placeholder="Nhập số điện thoại" name="mobile">
                    </div>

                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" class="form-control" id="" placeholder="Nhập địa chỉ" name="address">
                    </div>

                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password" class="form-control" id="" placeholder="Nhập mật khẩu" name="password">
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="">Hình ảnh</label>
                        <img  style="width: 180px; height: 200px;"s id="avatar" src="" alt="">
                        <input type="file" class="form-control" id="image-choose" placeholder="Nhập file ảnh" name="image">
                    </div>
                </div>
            </div>
            <button name="submit" type="submit" id="submit" class="btn btn-primary">ADD</button>
        </form> 
    </div>      

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image-choose").change(function() {
        readURL(this);
        });
    </script>

<?php 

    require_once 'footer.php';

  ?>