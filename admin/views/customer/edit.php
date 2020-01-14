<?php 

    require_once 'header.php';

  ?>
    <div class="container">
        <form action="?mod=customer&act=update" method="POST" role="form" enctype="multipart/form-data">
            <input name="id" type="hidden" value="<?php echo ($customer['id']); ?>">
            <h1>Chỉnh sửa thông tin khách hàng</h1>
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="">Tên khách hàng</label>
                        <input type="text" class="form-control" name="name" value="<?php echo ($customer['name']); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo ($customer['email']); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="number" class="form-control" name="mobile" value="<?php echo ($customer['mobile']); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" value="<?php echo ($customer['address']); ?>">
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