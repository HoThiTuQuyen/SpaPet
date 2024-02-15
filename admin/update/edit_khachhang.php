<?php

    $makh = $_GET['makh'];
   $sql = "SELECT * from khachhang where makh ='$makh' ";
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
                <form method="post" action="update/update_khachhang.php" enctype="multipart/form-data">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="form-group">
                                <label class="form-label" for="customFile">Tải hình ảnh lên</label>
                                <input type="file" name='photo' class="form-control" id="customFile" />

                            </div>
                            <img src="assets/image/image_kh/<?php echo $value['image_kh'];?>"
                                style="padding-left: 20px;" width="100" alt="">

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mã KH</label>
                                <input type="text" class="form-control" placeholder=""
                                    value="<?php echo $value['makh'] ?> " name="makh" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" class="form-control" placeholder="nhập tên"
                                    value="<?php echo $value['tenkh'] ?> " name="tenkh">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="Email"
                                    value="<?php echo $value['email'] ?>" name="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mật Khẩu</label>
                                <input type="text" class="form-control" placeholder="Mật khẩu"
                                    value="<?php echo $value['matkhau'] ?>" name="matkhau">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" placeholder="Số điện thoại"
                                    value="<?php echo $value['sdt'] ?>" name="sdt">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" placeholder="Địa chỉ"
                                    value="<?php echo $value['diachi'] ?>" name="diachi">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">

                                <button type="submit" class="btn btn-sm btn-info"
                                    style="margin-top: 20px; margin-bottom: 20px;"> Lưu </button>
                            </div>
                        </div>

                    </div>


                    <?php } ?>

                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>