<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Nhà Cung Cấp</h3>
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
                                    <th>Mã NCC</th>
                                    <th>Tên NCC</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                        $query = mysqli_query($conn,"SELECT * FROM nhacc");
                                        while ($mhs = mysqli_fetch_array($query)){
                                            
                                ?>
                                <tr>

                                    <td><?php echo $mhs['mancc']?></td>
                                    <td><?php echo $mhs['tenncc']?></td>
                                    <td><?php echo $mhs['diachi']?></td>
                                    <td><?php echo $mhs['sdt']?></td>
                                    <td><a onclick="hapus_data('<?php echo $mhs['mancc'];?>')"
                                            class="btn btn-sm btn-danger">Xóa</a>

                                        <a href="index.php?page=edit_nha_cung_cap&&mancc=<?php echo $mhs['mancc'];?>"
                                            class="btn btn-sm btn-success">Sửa</a>
                                        <a class="view-data-ncc btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modal-view" data-mancc="<?php echo $mhs['mancc']?>"
                                            data-tenncc="<?php echo $mhs['tenncc']?>"
                                            data-diachi="<?php echo $mhs['diachi']?>"
                                            data-sdt="<?php echo $mhs['sdt']?>">Chi
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
            <form method="get" action="../admin/add/add_nha_cung_cap.php">
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Mã nhà cung cấp" name="mancc">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Tên nhà cung cấp" name="tenncc">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Số điện thoại" name="sdt">
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


            <form method="get" action="../admin/add/add_nha_cung_cap.php">
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col">
                            <b>Mã NCC:</b> <span id="mancc"></span>
                        </div>

                        <div class="col">
                            <b>Tên NCC:</b> <span id="tenncc"></span>
                        </div>
                        <div class="col">
                            <b>Địa chỉ:</b> <span id="diachi"></span>
                        </div>
                        <div class="col">
                            <b>Số điện thoại:</b> <span id="sdt"></span>
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
function hapus_data(mancc) {
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
            window.location.href = "../admin/delete/delete_nha_cung_cap.php?mancc=" + mancc;
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
  