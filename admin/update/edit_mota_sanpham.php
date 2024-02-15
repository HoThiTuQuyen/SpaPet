<?php

    $masp = $_GET['masp'];
   $sql = "SELECT * from motasp where masp ='$masp' ";
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
                <form method="post" action="update/update_mota_sanpham.php" enctype="multipart/form-data">


                    <div class="row">
                        <div class="col-sm-6">
                            <label>Mã sản phẩm</label>
                            <select class="custom-select" id="inputGroupSelect01" name="masp">
                                <option selected>Chọn mã sản phẩm</option>
                                <?php  
                                $query = mysqli_query($conn, "SELECT * FROM sanpham");
                                while ($mhs = mysqli_fetch_array($query)) {
                                    echo '<option value="' . $mhs['masp'] . '">' . $mhs['masp'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input type="text" class="form-control" placeholder="Nhập mô tả"
                                    value="<?php echo $value['mota'] ?> " name="mota" required>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Lợi ích</label>
                                <input type="text" class="form-control" placeholder="Lợi ích"
                                    value="<?php echo $value['loiich'] ?> " name="loiich" required>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Hướng dẫn</label>
                                <input type="text" class="form-control" placeholder="Hướng dẫn"
                                    value="<?php echo $value['huongdan'] ?> " name="huongdan" required>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Lưu ý</label>
                                <input type="text" class="form-control" placeholder="Lưu ý"
                                    value="<?php echo $value['luuy'] ?> " name="luuy" required>

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