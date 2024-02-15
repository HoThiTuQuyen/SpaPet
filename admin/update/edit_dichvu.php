<?php

    $madv= $_GET['madv'];
   $sql = "SELECT * from dichvu where madv ='$madv' ";
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
                <form method="post" action="update/update_dichvu.php" enctype="multipart/form-data">


                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mã loại</label>
                                <input type="text" class="form-control" placeholder=""
                                    value="<?php echo $value['madv'] ?> " name="madv" disabled>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tên dịch vụ</label>
                                <input type="text" class="form-control" placeholder="nhập "
                                    value="<?php echo $value['tendv'] ?> " name="tendv">

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tên dịch vụ</label>
                                <select class="form-control mb-3" id="inputGroupSelect01" name="maldv">
                                    <option selected>Chọn loại dịch vụ</option>
                                    <?php  
                                    $query = mysqli_query($conn, "SELECT * FROM loaidichvu");
                                    while ($mhs = mysqli_fetch_array($query)) {
                                        $selected = ($value['maldv'] == $mhs['maldv']) ? 'selected' : '';
                                        echo '<option value="' . $mhs['maldv'] . '" ' .$selected .'>' . $mhs['tenloaidv'] . '</option>';
                                    }
                                    ?>
                                </select>


                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text" class="form-control" placeholder="nhập "
                                    value="<?php echo $value['giadv'] ?> " name="giadv">

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