<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
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
                                    <th>Tên Tài Khoản</th>
                                    <th>Tài Khoản</th>
                                    <th>Mật Khẩu</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                        $query = mysqli_query($conn,"SELECT * FROM tb_admin");
                                        while ($mhs = mysqli_fetch_array($query)){
                                    
                                ?>
                                <tr>

                                    <td><?php echo $mhs['id']?></td>
                                    <td><?php echo $mhs['name']?></td>
                                    <td><?php echo $mhs['username']?></td>
                                    <td><?php echo $mhs['password']?></td>
                                    <td><a onclick="hapus_data(<?php echo $mhs['id'];?>)"
                                            class="btn btn-sm btn-danger">Xóa</a>
                                        <a href="index.php?page=edit_data&& id=<?php echo $mhs['id'];?>"
                                            class="btn btn-sm btn-success">Sửa</a>
                                        <a class="view-data btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modal-view" data-id="<?php echo $mhs['id']?>"
                                            data-name="<?php echo $mhs['name']?>"
                                            data-password="<?php echo $mhs['password']?>"
                                            data-username="<?php echo $mhs['username']?>"
                                            data-level="<?php echo $mhs['level']?>">Chi
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
            <form method="get" action="../admin/add/add_data.php">
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Name" name="name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="col">
                            <select class="custom-select" id="inputGroupSelect01" name="level">
                                <option selected>Chọn vai trò</option>
                                <option value="người quản lý">người quản lý</option>
                                <option value="thủ kho">thủ kho</option>
                            </select>
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
            <form method="get" action="../admin/add/add_data.php">
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col">
                            ID: <span id="id"></span>
                        </div>

                        <div class="col">
                            Tên: <span id="name"></span>
                        </div>
                        <div class="col">
                            Tài Khoản: <span id="username"></span>
                        </div>
                        <div class="col">
                            Mật Khẩu: <span id="password"></span>
                        </div>
                        <div class="col">
                            Vai Trò: <span id="level"></span>
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
function hapus_data(id) {
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
            window.location.href = "../admin/delete/delete_data.php?id=" + id;
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
  