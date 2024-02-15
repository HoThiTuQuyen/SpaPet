<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tổng kho</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="summaryTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Tổng số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        // Truy vấn và tính toán tổng số lượng sản phẩm
                            $summaryQuery = mysqli_query($conn, "SELECT masp, tensp, SUM(soluong) as tong_soluong FROM tonkho GROUP BY masp, tensp");
                            while ($summary = mysqli_fetch_array($summaryQuery)) {
                            ?>
                                <tr>
                                    <td><?php echo $summary['masp']; ?></td>
                                    <td><?php echo $summary['tensp']; ?></td>
                                    <td><?php echo $summary['tong_soluong']; ?></td>
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

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sản phẩm theo lô hàng</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                            Thêm
                        </button> -->


                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mã tồn kho</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>

                                    <th>Lô hàng</th>
                                    <th>Ngày nhập</th>

                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                        $query = mysqli_query($conn,"SELECT * FROM tonkho");
                                        while ($mhs = mysqli_fetch_array($query)){
                                        
     
                                ?>
                                <tr>
                                    <td><?php echo $mhs['matonkho']?></td>
                                    <td><?php echo $mhs['masp']?></td>
                                    <td><?php echo $mhs['tensp']?></td>
                                    <td><?php echo $mhs['soluong']?></td>
                                    <!-- <td><?php echo $mhs['von_ton']?></td>
                                    <td><?php echo $mhs['giatri_ton']?></td> -->
                                    <td><?php echo $mhs['lohang']?></td>
                                    <td><?php echo $mhs['ngaynhap']?></td>
                                    <!-- <td><?php echo $mhs['hsd']?></td>
                                    <td><?php echo $mhs['ghichu']?></td> -->
                                    <td><a onclick="hapus_data('<?php echo $mhs['matonkho'];?>')"
                                            class="btn btn-sm btn-danger">Xóa</a>



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

<script>
// Đợi cho trang được tải hoàn toàn
document.addEventListener('DOMContentLoaded', function() {
    // Lấy tất cả các dòng trong bảng tổng kho
    var rows = document.querySelectorAll('#summaryTable tbody tr');

    // Lặp qua từng dòng
    rows.forEach(function(row) {
        // Lấy giá trị của cột "Tổng số lượng"
        var quantity = parseInt(row.cells[2].textContent);

        // Thêm cảnh báo màu vàng nếu số lượng dưới 20
        if (quantity < 15 && quantity >= 5) {
            row.style.backgroundColor = '#e3d566'; // Màu vàng
        }

        // Thêm cảnh báo màu đỏ nếu số lượng dưới 10
        if (quantity < 5) {
            row.style.backgroundColor = '#e36a5c'; // Màu đỏ
        }
    });
});
</script>

<!-- <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            
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

                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
        </div>
        </form>
    </div>
</div> -->
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
function hapus_data(matonkho) {
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
            window.location.href = "../admin/delete/delete_ton_kho.php?matonkho=" + matonkho;
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
  