<?php

    $maldv= $_GET['maldv'];
   $sql = "SELECT * from loaidichvu where maldv ='$maldv' ";
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
                <form method="post" action="update/update_loaidichvu.php" enctype="multipart/form-data">


                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mã loại</label>
                                <input type="text" class="form-control" placeholder=""
                                    value="<?php echo $value['maldv'] ?> " name="maldv" disabled>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tên loại dịch vụ</label>
                                <input type="text" class="form-control" placeholder="nhập mã bài viết"
                                    value="<?php echo $value['tenloaidv'] ?> " name="tenloaidv">

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-sm btn-info"
                                style="margin-top: 20px; margin-bottom: 20px;"> Lưu </button>
                        </div>
                    </div>


                    <?php } ?>

                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>