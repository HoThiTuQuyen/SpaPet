<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thông Tin Khách Hàng </h3>
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
                                    <th>ID</th>

                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Mật Khẩu</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Ảnh</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                        $query = mysqli_query($conn,"SELECT * FROM khachhang");
                                        while ($mhs = mysqli_fetch_array($query)){
                                    
                                ?>
                                <tr>

                                    <td><?php echo $mhs['makh']?></td>

                                    <td><?php echo $mhs['tenkh']?></td>
                                    <td><?php echo $mhs['email']?></td>
                                    <td><?php echo $mhs['matkhau']?></td>
                                    <td><?php echo $mhs['sdt']?></td>
                                    <td><?php echo $mhs['diachi']?></td>
                                    <td><img src="assets/image/image_kh/<?php echo $mhs['image_kh'];?>"
                                            style="padding-left: 20px;" width="100" alt=""></td>

                                    <td><a onclick="hapus_data(<?php echo $mhs['makh'];?>)"
                                            class="btn btn-sm btn-danger">Xóa</a>
                                        <a href="index.php?page=edit_khachhang&& makh=<?php echo $mhs['makh'];?>"
                                            class="btn btn-sm btn-success">Sửa</a>
                                        <a class="view-data-kh btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modal-view" data-makh="<?php echo $mhs['makh']?>"
                                            data-tenkh="<?php echo $mhs['tenkh']?>"
                                            data-email="<?php echo $mhs['email']?>"
                                            data-matkhau="<?php echo $mhs['matkhau']?>"
                                            data-sdt="<?php echo $mhs['sdt']?>"
                                            data-diachi="<?php echo $mhs['diachi']?>">Chi
                                            Tiết</a>
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
            <form method="get" action="../admin/add/add_khachhang.php">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <!-- <input type="text" class="form-control mb-3" placeholder="Mã khách hàng" name="makh"> -->

                            <input type="text" class="form-control mb-3" placeholder="Tên" name="tenkh">
                            <input type="text" class="form-control mb-3" placeholder="Email" name="email">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-3" placeholder="Mật khẩu" name="matkhau">
                            <input type="text" class="form-control mb-3" placeholder="Số điện thoại" name="sdt">
                            <input type="text" class="form-control mb-3" placeholder="Địa chỉ" name="diachi">
                            <!-- <input type="file" name='photo' class="form-control mb-3" id="customFile"> -->
                        </div>
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
                <h4 class="modal-title">View Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- them data user -->
            <form method="get" action="../admin/add/add_khachhang.php">
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col-md-6">
                            ID: <span id="makh"></span>
                        </div>

                        <div class="col-md-6">
                            Tên: <span id="tenkh"></span>
                        </div>

                        <div class="col-md-6">
                            Email: <span id="email"></span>
                        </div>
                        <div class="col-md-6">
                            Mật Khẩu: <span id="matkhau"></span>
                        </div>
                        <div class="col-md-6">
                            Số điện thoại: <span id="sdt"></span>
                        </div>
                        <div class="col-md-6">
                            Địa chỉ: <span id="diachi"></span>
                        </div>
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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<!-- vid 11 -->
<script>
function hapus_data(makh) {
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
            window.location.href = "../admin/delete/delete_khachhang.php?makh=" + makh;
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
        title: 'Tên tài khoản đã bị trùng'
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
  