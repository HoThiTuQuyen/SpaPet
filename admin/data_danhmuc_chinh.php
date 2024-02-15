<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Quản Lí Danh Mục Chính</h3>
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
                                    <th>Mã danh mục chính</th>
                                    <th>Tên danh mục chính</th>
                                    <th>Mã danh mục</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                        $query = mysqli_query($conn,"SELECT * FROM dmchinh");
                                        while ($mhs = mysqli_fetch_array($query)){
                                            
                                ?>
                                <tr>

                                    <td><?php echo $mhs['madmchinh']?></td>
                                    <td><?php echo $mhs['tendmchinh']?></td>
                                    <td><?php echo $mhs['madm']?></td>


                                    <td><a onclick="hapus_data('<?php echo $mhs['madmchinh'];?>')"
                                            class="btn btn-sm btn-danger">Xóa</a>

                                        <a href="index.php?page=edit_data_danhmuc_chinh&&madmchinh=<?php echo $mhs['madmchinh'];?>"
                                            class="btn btn-sm btn-success">Sửa</a>
                                        <a class="view-data-dmchinh btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modal-view" data-madmchinh="<?php echo $mhs['madmchinh']?>"
                                            data-tendmchinh="<?php echo $mhs['madmchinh']?>"
                                            data-motadmchinh="<?php echo $mhs['motadmchinh']?>"
                                            data-madm="<?php echo $mhs['madm']?>">Chi
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
            <form method="get" action="../admin/add/add_data_danhmuc_chinh.php">
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Mã danh mục" name="madmchinh">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Ten danh muc" name="tendmchinh">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Mo ta danh muc" name="motadmchinh">
                        </div>
                        <div class="col">
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


            <form method="get" action="../admin/add/add_data_danhmuc_chinh.php">
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col">
                            Ma DM: <span id="madmchinh"></span>
                        </div>

                        <div class="col">
                            Tên DM: <span id="tendmchinh"></span>
                        </div>
                        <div class="col">
                            Mô tả: <span id="motadmchinh"></span>
                        </div>
                        <div class="col">
                            Mã danh mục: <span id="madm"></span>
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
function hapus_data(madmchinh) {
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
            window.location.href = "../admin/delete/delete_data_danhmuc_chinh.php?madmchinh=" + madmchinh;
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
  