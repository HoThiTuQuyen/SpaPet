<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Quản lý thương hiệu</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                            Thêm
                        </button>
                        <br></br>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mã thương hiệu</th>
                                    <th>Tên thương hiệu</th>
                                    <th>Image</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                        $query = mysqli_query($conn,"SELECT * FROM thuonghieu");
                                        while ($mhs = mysqli_fetch_array($query)){
                                            
                                ?>
                                <tr>

                                    <td><?php echo $mhs['math']?></td>
                                    <td><?php echo $mhs['tenth']?></td>
                                    <td><img src="assets/image/thuonghieu/<?php echo $mhs['image_th'];?>"
                                            style="padding-left: 20px;" width="100" alt=""></td>

                                    <td><a onclick="hapus_data('<?php echo $mhs['math'];?>')"
                                            class="btn btn-sm btn-danger">Xóa</a>

                                        <a href="index.php?page=edit_data_thuonghieu&&math=<?php echo $mhs['math'];?>"
                                            class="btn btn-sm btn-success">Sửa</a>
                                        <a class="view-data-th btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modal-view" data-math="<?php echo $mhs['math']?>"
                                            data-tenth="<?php echo $mhs['tenth']?>"
                                            data-image_th="<?php echo $mhs['image_th']?>"
                                            data-motath="<?php echo $mhs['motath']?>">Chi
                                            Tiết
                                        </a>

                                    </td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>



                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- them data user -->
            <form method="post" action="../admin/add/add_data_thuonghieu.php" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Mã thương hiệu" name="math">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Ten thương hiệu" name="tenth">
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <!-- <label class="form-label" for="customFile">Tải hình ảnh lên</label> -->
                                <input type="file" name='photo' class="form-control" id="customFile" />

                            </div>
                            <img src="../assets/image/thuonghieu/<?php echo $value['image_th'];?>"
                                style="padding-left: 20px;" width="100" alt="">

                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Mo ta " name="motath">
                        </div>

                        <!-- <div class="col">
                            <select class="custom-select" id="inputGroupSelect01" name="level">
                                <option selected>Chọn vai trò</option>
                                <option value="người quản lý">người quản lý</option>
                                <option value="thủ kho">thủ kho</option>
                            </select>
                        </div> -->
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- model view data -->
<div class="modal fade" id="modal-view">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chi tiết</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="get" action="../admin/add/add_data_thuonghieu.php">
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col">
                            <b>Mã thương hiệu:</b> <span id="math"></span>
                        </div>

                        <div class="col">
                            <b>Tên thương hiệu:</b> <span id="tenth"></span>
                        </div>
                        <div class="col">
                            <b>Ảnh:</b> <span id="image_th"></span>
                        </div>
                        <div class="col">
                            <b>Mô tả:</b> <span id="motath"></span>
                        </div>

                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
                    <!-- <button type="submit" class="btn btn-primary">Lưu</button> -->
                </div>
            </form>
        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<!-- vid 11 -->
<script>
function hapus_data(math) {
    // Show a confirmation dialog using SweetAlert2
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa không?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "../admin/delete/delete_data_thuonghieu.php?math=" + math;
        }
    });
}
</script>


<?php
  if(isset ($_GET['error'])){
    $x =($_GET['error']);
    if($x==1){
      echo "
      <script>
      var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 2000
      });
      Toast.fire({
        icon: 'warning',
        title: 'Danh mục đã có'
      })</script>";
      
    }
    else if($x==2){
      echo "
      <script>
      var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 2000
      });
      Toast.fire({
        icon: 'warning',
        title: 'Hãy nhập đầy đủ thông tin'
      })</script>";
      
    }else{
      echo "";
    }
  }
  