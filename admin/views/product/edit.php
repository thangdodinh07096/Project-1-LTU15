<?php 

    require_once 'header.php';

  ?>

    <div style="padding-left: 100px; padding-right: 100px; padding-top: 50px; padding-bottom: 50px;">
        <form action="?mod=product&act=update" method="POST" role="form" enctype="multipart/form-data">
            <input name="id" type="hidden" value="<?php echo ($product['id']); ?>">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chỉnh sửa sản phẩm</h3>
                </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="" placeholder="Nhập tên sản phẩm" name="name" value="<?php echo ($product['name']); ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá bán</label>
                                    <input type="text" name="price" class="form-control" placeholder="Điền giá gốc" value="<?php echo ($product['price']); ?>">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <input type="number" class="form-control" id="" placeholder="Nhập thể loại sách" name="category_id" value="<?php echo ($product['category_id']); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tác giả</label>
                                    <input type="text" name="author" class="form-control" placeholder="Điền tác giả" value="<?php echo ($product['author']); ?>">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nhà xuất bản</label>
                                    <input type="text" name="publisher" class="form-control" placeholder="Điền nhà xuất bản" value="<?php echo ($product['publisher']); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Kích thước</label>
                                    <input type="text" name="size" class="form-control" placeholder="Điền kích thước" value="<?php echo ($product['size']); ?>">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Năm xuất bản</label>
                                    <input type="text" name="year" class="form-control" placeholder="Điền năm xuất bản" value="<?php echo ($product['year']); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                            <textarea class="textarea" name="content" placeholder="Place some text here"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Số trang</label>
                                    <input type="text" name="pages" class="form-control" placeholder="Điền số trang sách" value="<?php echo ($product['pages']); ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Số lượng</label>
                                <input type="number" class="form-control" id="" placeholder="Nhập số lượng" name="quantity" value="<?php echo ($product['quantity']); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label>Trạng thái sản phẩm</label>
                                <select name="status" class="form-control select2" style="width: 100%;">
                                    <option>--Chọn trạng thái---</option>
                                    <option value="0">Đang nhập</option>
                                    <option value="1">Mở bán</option>
                                    <option value="-1">Hết hàng</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <img  style="width: 180px; height: 200px;"s id="avatar" src="" alt="">
                            <input type="file" class="form-control" id="image-choose" placeholder="Nhập file ảnh" name="image">
                        </div>
                    </div>
                <button name="submit" type="submit" id="submit" class="btn btn-primary">ADD</button>
        </form>
        <a href="index.php?mod=product&act=list" class="btn btn-danger">Hủy bỏ</a>
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