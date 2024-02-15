<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Mô Tả Sản Phẩm</h3>
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
                                    <th>Mã sản phẩm</th>
                                    <th>Mô tả</th>
                                    <th>Lợi ích</th>
                                    <th>Hướng dẫn</th>
                                    <th>Lưu ý</th>
                                    <th>Hành Động</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                        $query = mysqli_query($conn,"SELECT * FROM motasp");
                                        while ($mhs = mysqli_fetch_array($query)){
                                            
                                            
                                ?>
                                <tr>

                                    <td><?php echo $mhs['masp']?></td>
                                    <td><?php echo $mhs['mota']?></td>
                                    <td><?php echo $mhs['loiich']?></td>
                                    <td><?php echo $mhs['huongdan']?></td>
                                    <td><?php echo $mhs['luuy']?></td>


                                    <td><a onclick="hapus_data('<?php echo $mhs['masp'];?>')"
                                            class="btn btn-sm btn-danger">Xóa</a>

                                        <a href="index.php?page=edit_mota_sanpham&&masp=<?php echo $mhs['masp'];?>"
                                            class="btn btn-sm btn-success">Sửa</a>
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
            <form method="post" action="../admin/add/add_mota_sanpham.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">

                            <select class="custom-select mb-3" name="masp">
                                <option selected>Chọn sản phẩm</option>
                                <?php  
                                $query = mysqli_query($conn, "SELECT * FROM sanpham");
                                while ($mhs = mysqli_fetch_array($query)) {
                                    echo '<option value="' . $mhs['masp'] . '">' . $mhs['masp'] . '</option>';
                                }
                                ?>
                            </select>
                            <input type="text" class="form-control mb-3" placeholder="Mô tả" name="mota">
                        </div>
                        <div class="col-md-6">

                            <input type="text" class="form-control mb-3" placeholder="Lợi ích" name="loiich">
                            <input type="text" class="form-control mb-3" placeholder="Hướng dẫn" name="huongdan">
                            <input type="text" class="form-control mb-3" placeholder="Lưu ý" name="luuy">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->




    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <!-- vid 11 -->
    <script>
    function hapus_data(masp) {
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
                window.location.href = "../admin/delete/delete_mota_sanpham.php?masp=" + masp;
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
  