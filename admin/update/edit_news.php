<?php

    $manews = $_GET['manews'];
   $sql = "SELECT * from news where manews ='$manews' ";
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
                <form method="post" action="update/update_news.php" enctype="multipart/form-data">


                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mã bài viết</label>
                                <input type="text" class="form-control" placeholder="nhập mã bài viết"
                                    value="<?php echo $value['manews'] ?> " name="manews" disabled>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ngày đăng</label>
                                <input type="text" class="form-control" placeholder="mô tả"
                                    value="<?php echo $value['ngaydang'] ?>" name="ngaydang" disabled>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tài khoản</label>
                                <?php
                                // Lấy giá trị id từ $value['id']
                                $adminId = $value['id'];

                                // Truy vấn SQL để lấy thông tin từ bảng tb_admin
                                $sqlAdminInfo = "SELECT name FROM tb_admin WHERE id = $adminId";
                                $resultAdminInfo = $conn->query($sqlAdminInfo);

                                // Kiểm tra và hiển thị thông tin tài khoản
                                if ($resultAdminInfo->num_rows > 0) {
                                    $adminInfo = $resultAdminInfo->fetch_assoc();
                                    echo '<input type="text" class="form-control" placeholder="mô tả" value="' . $adminInfo['name'] . '" name="name" disabled>';
                                } else {
                                    echo '<input type="text" class="form-control" placeholder="mô tả" value="Không tìm thấy" name="name" disabled>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Loại</label>
                                <input type="text" class="form-control" placeholder="mô tả"
                                    value="<?php echo $value['loai'] ?>" name="loai" disabled>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tên bài viết</label>
                                <input type="text" class="form-control" placeholder="nhập tên"
                                    value="<?php echo $value['tieude'] ?> " name="tieude" required>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-label" for="customFile">Tải hình ảnh lên</label>
                                    <input type="file" name='photo' class="form-control" id="customFile" />

                                </div>
                                <img src="assets/image/image_news/<?php echo $value['image_news'];?>"
                                    style="padding-left: 20px;" width="100" alt="">

                            </div>

                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <input type="text" class="form-control" placeholder="nhập tóm tắt"
                                    value="<?php echo $value['tomtat'] ?> " name="tomtat">

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nội dung:</label>
                                <!-- Thêm id cho textarea -->
                                <textarea name="noidung" id="editor1" rows="10"
                                    cols="80"><?php echo $value['noidung']; ?></textarea>
                            </div>
                            <input type="hidden" name="noi_dung" id="hiddenEditorContent">
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-sm btn-info"
                                style="margin-top: 20px; margin-bottom: 20px;"> Lưu </button>
                        </div>


                        <script>
                        // Sử dụng CKEditor cho textarea có ID là 'editor1'
                        ClassicEditor
                            .create(document.querySelector('#editor1'))
                            .then(editor => {
                                editor.setData('<?php echo $value['noidung']; ?>');
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