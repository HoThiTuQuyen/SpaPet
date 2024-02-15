<?php

    $mancc = $_GET['mancc'];
   $sql = "SELECT * from nhacc where mancc ='$mancc' ";
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
                <form method="post" action="update/update_nha_cung_cap.php" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mã NCC</label>
                                <input type="text" class="form-control" placeholder="nhập mã "
                                    value="<?php echo $value['mancc'] ?> " name="mancc" disabled>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tên NCC</label>
                                <input type="text" class="form-control" placeholder="nhập tên"
                                    value="<?php echo $value['tenncc'] ?> " name="tenncc">

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
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" placeholder="Số điện thoại"
                                    value="<?php echo $value['sdt'] ?>" name="sdt">
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