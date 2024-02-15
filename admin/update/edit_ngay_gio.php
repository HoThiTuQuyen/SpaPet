<?php

    $mangay = $_GET['mangay'];
   $sql = "SELECT * from ngay1 where mangay ='$mangay' ";
   $result = $conn->query($sql); 



?>

<section class="content">
    <div class="container-fluid">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Sửa thông tin ngày</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <?php foreach( $result as $value ){?>
                <form method="post" action="update/update_data_danhmuc.php" enctype="multipart/form-data">
                    <div class="col-sm-6">

                        <button type="submit" class="btn btn-sm btn-info"
                            style="margin-top: 20px; margin-bottom: 20px;"> Lưu </button>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mã ngày</label>
                                <input type="text" class="form-control" placeholder="nhập mã "
                                    value="<?php echo $value['mangay'] ?> " name="mangay" required>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Ngày</label>
                                <input type="text" class="form-control" placeholder="nhập "
                                    value="<?php echo $value['ngay'] ?> " name="ngay" required>

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