<?php

    $madm = $_GET['madm'];
   $sql = "SELECT * from danhmuc where madm ='$madm' ";
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
                <form method="post" action="update/update_data_danhmuc.php" enctype="multipart/form-data">
                    <div class="col-sm-6">
                        <!-- <div class="row">
                            <div class="form-group">
                                <label class="form-label" for="customFile">Tải hình ảnh lên</label>
                                <input type="file" name='photo' class="form-control" id="customFile" />

                            </div>
                            <img src="assets/image/<?php echo $value['image'];?>" style="padding-left: 20px;"
                                width="100" alt="">

                        </div> -->
                        <button type="submit" class="btn btn-sm btn-info"
                            style="margin-top: 20px; margin-bottom: 20px;"> Lưu </button>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mã danh mục</label>
                                <input type="text" class="form-control" placeholder="nhập mã danh mục"
                                    value="<?php echo $value['madm'] ?> " name="madm" required>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text" class="form-control" placeholder="nhập tên"
                                    value="<?php echo $value['tendm'] ?> " name="tendm" required>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input type="text" class="form-control" placeholder="mô tả"
                                    value="<?php echo $value['motadm'] ?>" name="motadm">
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