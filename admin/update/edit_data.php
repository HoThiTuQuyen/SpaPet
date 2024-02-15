<?php

    $id = $_GET['id'];
   $sql = "SELECT * from tb_admin where id ='$id' ";
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
                <form method="post" action="update/update_data.php" enctype="multipart/form-data">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="form-group">
                                <label class="form-label" for="customFile">Tải hình ảnh lên</label>
                                <input type="file" name='photo' class="form-control" id="customFile" />

                            </div>
                            <img src="assets/image/<?php echo $value['image'];?>" style="padding-left: 20px;"
                                width="100" alt="">

                        </div>
                        <button type="submit" class="btn btn-sm btn-info"
                            style="margin-top: 20px; margin-bottom: 20px;"> Lưu </button>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" class="form-control" placeholder="nhập tên"
                                    value="<?php echo $value['name'] ?> " name="name" required>
                                <input type="text" class="form-control" placeholder="nhập tên"
                                    value="<?php echo $value['id'] ?> " name="id" hidden>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tên Tài Khoản</label>
                                <input type="text" class="form-control" placeholder="tên tài khoản"
                                    value="<?php echo $value['username'] ?>" name="username" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mật Khẩu</label>
                                <input type="text" class="form-control" placeholder="mật khẩu"
                                    value="<?php echo $value['password'] ?>" name="password" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Vai Trò</label>
                                <select class="custom-select" id="inputGroupSelect01" name="level" disabled>
                                    <option value="<?php echo $value['level'] ?>" selected><?php echo $value['level'];?>
                                    </option>
                                    <option value="người quản lý">người quản lý</option>
                                    <option value="thủ kho">thủ kho</option>
                                </select>
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