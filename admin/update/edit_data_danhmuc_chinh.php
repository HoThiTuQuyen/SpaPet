<?php

    $madmchinh = $_GET['madmchinh'];
   $sql = "SELECT * from dmchinh where madmchinh ='$madmchinh' ";
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
                <form method="post" action="update/update_data_danhmuc_chinh.php" enctype="multipart/form-data">
                    <div class="col-sm-6">
                        <!-- <div class="row">
                            <div class="form-group">
                                <label class="form-label" for="customFile">Tải hình ảnh lên</label>
                                <input type="file" name='photo' class="form-control" id="customFile" />

                     

                        </div> -->
                        <button type="submit" class="btn btn-sm btn-info"
                            style="margin-top: 20px; margin-bottom: 20px;"> Lưu </button>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mã danh mục chính</label>
                                <input type="text" class="form-control" placeholder="nhập mã danh mục"
                                    value="<?php echo $value['madmchinh'] ?> " name="madmchinh" required>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tên danh mục chính</label>
                                <input type="text" class="form-control" placeholder="nhập tên"
                                    value="<?php echo $value['tendmchinh'] ?> " name="tendmchinh" required>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input type="text" class="form-control" placeholder="mô tả"
                                    value="<?php echo $value['motadmchinh'] ?>" name="motadmchinh">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Mã danh mục</label>
                            <select class="custom-select" id="inputGroupSelect01" name="madm">
                                <option selected>Chọn mã danh mục</option>
                                <?php  
                                    $query = mysqli_query($conn, "SELECT * FROM danhmuc");
                                    while ($mhs = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $mhs['madm'] . '">' . $mhs['tendm'] . '</option>';
                                    }
                                    ?>
                            </select>
                        </div>



                    </div>


                    <?php } ?>

                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>