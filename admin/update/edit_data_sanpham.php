<?php

    $masp = $_GET['masp'];
   $sql = "SELECT * from sanpham where masp ='$masp' ";
   $result = $conn->query($sql); 



?>

<section class="content">
    <div class="container-fluid">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Sửa thông tin</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <?php foreach( $result as $value ){?>
                <form method="post" action="update/update_data_sanpham.php" enctype="multipart/form-data">


                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mã sản phẩm</label>
                                <input type="text" class="form-control" placeholder="nhập mã thương hiệu"
                                    value="<?php echo $value['masp'] ?> " name="masp" required>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" placeholder="nhập tên"
                                    value="<?php echo $value['tensp'] ?> " name="tensp" required>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Mã thương hiệu</label>
                            <select class="custom-select" id="inputGroupSelect01" name="math">
                                <option selected>Chọn mã thương hiệu</option>
                                <?php  
                                $query = mysqli_query($conn, "SELECT * FROM thuonghieu");
                                while ($mhs = mysqli_fetch_array($query)) {
                                    $selected = ($value['math'] == $mhs['math']) ? 'selected' : '';
                                    echo '<option value="' . $mhs['math'] . '" ' . $selected . '>' . $mhs['tenth'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Mã danh mục phụ</label>
                            <select class="custom-select" id="inputGroupSelect01" name="madmphu">
                                <option selected>Chọn mã danh mục phụ</option>
                                <?php  
                                $query = mysqli_query($conn, "SELECT * FROM dmphu");
                                while ($mhs = mysqli_fetch_array($query)) {
                                    $selected = ($value['madmphu'] == $mhs['madmphu']) ? 'selected' : '';
                                    echo '<option value="' . $mhs['madmphu'] . '" ' . $selected . '>' . $mhs['tendmphu'] . '</option>';
                                }
                            ?>q
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Giá nhập</label>
                                <input type="text" class="form-control" placeholder="nhập gia"
                                    value="<?php echo $value['gianhap'] ?> " name="gianhap" required>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Giá bán</label>
                                <input type="text" class="form-control" placeholder="nhập tên"
                                    value="<?php echo $value['giaban'] ?> " name="giaban" required>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-label" for="customFile">Tải hình ảnh lên</label>
                                    <input type="file" name='photo' class="form-control" id="customFile" />
                                </div>
                                <?php
                                if (!empty($value['anhsp'])) {
                                    echo '<img src="../assets/image/sanpham/' . $value['anhsp'] . '" style="padding-left: 20px;" width="200" alt="">';
                                }
                            ?>
                                <input type="hidden" name="current_photo" value="<?php echo $value['anhsp']; ?>">

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Đơn vị tính</label>
                                <select class="form-control mb-3" name="donvitinh">
                                    <option>Chọn đơn vị tính</option>
                                    <option value="Túi" <?php echo ($value['donvitinh'] == 'Túi') ? 'selected' : ''; ?>>
                                        Túi</option>
                                    <option value="Cái" <?php echo ($value['donvitinh'] == 'Cái') ? 'selected' : ''; ?>>
                                        Cái</option>
                                    <option value="Chai"
                                        <?php echo ($value['donvitinh'] == 'Chai') ? 'selected' : ''; ?>>Chai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phân loại</label>
                                <select class="form-control mb-3" name="phanloai">
                                    <option>Chọn phân loại</option>
                                    <option value="Thực phẩm"
                                        <?php echo ($value['phanloai'] == 'Thực phẩm') ? 'selected' : ''; ?>>
                                        Thực phẩm</option>
                                    <option value="Sức khoẻ"
                                        <?php echo ($value['phanloai'] == 'Sức khoẻ') ? 'selected' : ''; ?>>
                                        Sức khoẻ</option>
                                    <option value="Đồ dùng"
                                        <?php echo ($value['phanloai'] == 'Đồ dùng') ? 'selected' : ''; ?>>
                                        Đồ dùng</option>
                                    <option value="Phụ kiện"
                                        <?php echo ($value['phanloai'] == 'Phụ kiện') ? 'selected' : ''; ?>>
                                        Phụ kiện</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nội dung:</label>
                                <textarea name="motasp" id="editor1" rows="10"
                                    cols="80"><?php echo $value['motasp']; ?></textarea>
                            </div>
                            <input type="hidden" name="motasp" id="hiddenEditorContent"
                                value="<?php echo $value['motasp']; ?>">
                        </div>
                        <div class="col-sm-12">

                            <button type="submit" class="btn btn-sm btn-info"
                                style="margin-top: 20px; margin-bottom: 20px;"> Lưu </button>
                        </div>

                        <script>
                        // Sử dụng CKEditor cho textarea có ID là 'editor1'
                        ClassicEditor
                            .create(document.querySelector('#editor1'))
                            .then(editor => {
                                editor.setData('<?php echo $value['motasp']; ?>');
                                editor.model.document.on('change', () => {
                                    // Cập nhật giá trị của input ẩn mỗi khi nội dung thay đổi
                                    document.getElementById('hiddenEditorContent').value = editor.getData();
                                });
                            })
                            .catch(error => {
                                console.error(error);
                            });
                        </script>

                    </div>


                    <?php } ?>

                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>