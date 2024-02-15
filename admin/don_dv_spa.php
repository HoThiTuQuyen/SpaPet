<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Đơn dịch vụ</h3>
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
                                    <th>Mã đơn</th>
                                    <th>Ngày tạo</th>
                                    <th>Tên KH</th>
                                    <th>Sđt</th>
                                    <th>Loại dịch vụ</th>
                                    <th>Dịch vụ</th>
                                    <th>Giá dv</th>
                                    <th>Tổng đơn</th>
                                    <th>Trạng thái</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                     $servername = "127.0.0.1";
                                     $username = "root";
                                     $password = "";
                                     $dbname = "petshome";
                                     
                                     $conn = new mysqli($servername, $username, $password, $dbname);
                                     
                                     // Kiểm tra kết nối
                                     if ($conn->connect_error) {
                                         die("Kết nối database thất bại: " . $conn->connect_error);
                                     }
                                        
                                     $query = mysqli_query($conn, "SELECT don_dv_spa.madvspa, don_dv_spa.ngaytao, don_dv_spa.tenkh, don_dv_spa.sdt, 
                                     don_dv_spa.maldv, loaidichvu.tenloaidv, don_dv_spa.madv, dichvu.tendv,
                                     don_dv_spa.giadv, don_dv_spa.tongtien, don_dv_spa.trangthai
                                     FROM don_dv_spa
                                     INNER JOIN loaidichvu ON don_dv_spa.maldv = loaidichvu.maldv
                                     INNER JOIN dichvu ON don_dv_spa.madv = dichvu.madv");
       
                                    while ($mhs = mysqli_fetch_array($query)){
                                        // $conn->close();
                            ?>
                                <tr>

                                    <td><?php echo $mhs['madvspa']?></td>
                                    <td><?php echo $mhs['ngaytao']?></td>

                                    <td><?php echo $mhs['tenkh']?></td>
                                    <td><?php echo $mhs['sdt']?></td>
                                    <td><?php echo $mhs['tenloaidv']?></td>
                                    <td><?php echo $mhs['tendv']?></td>
                                    <td><?php echo $mhs['giadv']?></td>
                                    <td><?php echo $mhs['tongtien']?></td>
                                    <td><?php echo $mhs['trangthai']?></td>
                                    <td><a onclick="hapus_data('<?php echo $mhs['madvspa'];?>')"
                                            class="btn btn-sm btn-danger">Xóa</a>
                                        <a href="invoice_dichvu.php?madvspa=<?php echo $mhs['madvspa']; ?>"
                                            class="btn btn-sm btn-success">In hoá đơn</a>

                                        <!-- <a href="index.php?page=edit_nha_cung_cap&&mancc=<?php echo $mhs['mapn'];?>"
                                            class="btn btn-sm btn-success">Sửa</a> -->
                                        <!-- <a class="view-data-ncc btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modal-view" data-mancc="<?php echo $mhs['mapn']?>"
                                            data-ngaynhap="<?php echo $mhs['ngaynhap']?>"
                                            data-tenncc="<?php echo $mhs['tenncc']?>"
                                            data-name="<?php echo $mhs['name']?>"
                                            data-sl_tong="<?php echo $mhs['sl_tong']?>"
                                            data-giatri_tong="<?php echo $mhs['giatri_tong']?>"
                                            data-lohang="<?php echo $mhs['lohang']?>">
                                            Chi
                                            Tiết
                                        </a> -->

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
                <h4 class="modal-title">Tạo đơn</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
               $query_loai_dich_vu = "SELECT * FROM loaidichvu";
               $result_loai_dich_vu = $conn->query($query_loai_dich_vu);
             ?>
            <!-- them data user -->
            <form method="post" action="../admin/add/add_don_dvspa.php">
                <div class="modal-body">

                    <div class="form-row" style="margin-bottom: 20px;">
                        <div class="col-6">
                            <label>Ngày tạo:</label>

                            <input type="text" class="form-control" name="ngaytao"
                                value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
                        </div>
                        <div class="col-6" style="margin-bottom: 20px;">
                            <label>Tên khách hàng:</label>

                            <input type="text" class="form-control" placeholder="Tên khách hàng" name="tenkh"
                                id="tenkh">
                        </div>
                        <div class="col-6">
                            <label>Sđt:</label>

                            <input type="text" class="form-control" placeholder="Sđt" name="sdt" id="sdt">
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 20px;">
                        <div class="col-6">
                            <label for="loai_dich_vu">Chọn loại dịch vụ:</label>
                            <select class="form-control" name="loai_dich_vu" id="loai_dich_vu" onchange="loadDichVu()">
                                <!-- Load danh sách loại dịch vụ từ database và hiển thị -->
                                <?php
                                while ($row = $result_loai_dich_vu->fetch_assoc()) {
                                    echo "<option value='" . $row['maldv'] . "'>" . $row['tenloaidv'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="dich_vu">Chọn dịch vụ:</label>
                            <select class="form-control" name="dich_vu" id="dich_vu">
                            </select>

                            </select>
                        </div>
                    </div>
                    <div class="form-row">

                        <!-- <div class="col-6">
                            <label>Giá dịch vụ:</label>
                            <input id="giadvText" class="form-control" placeholder="Giá dịch vụ">
                        </div> -->

                    </div>

                </div>


                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Tạo đơn</button>
                </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
< <script>
    function loadDichVu() {
    var loaiDichVu = document.getElementById("loai_dich_vu");
    var dichVu = document.getElementById("dich_vu");

    // Lấy giá trị đã chọn từ loại dịch vụ
    var selectedLoaiDichVu = loaiDichVu.value;

    // Gửi yêu cầu AJAX để lấy danh sách dịch vụ tương ứng
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
    // Cập nhật danh sách dịch vụ
    dichVu.innerHTML = xhr.responseText;
    // Clear giadvText when changing the selected service
    document.getElementById("giadvText").value = "";
    }
    };
    xhr.open("GET", "add/get_tendichvu_by_maldv.php?maldv=" + selectedLoaiDichVu, true);
    xhr.send();
    }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <!-- vid 11 -->
    <script>
    function hapus_data(madvspa) {
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
                window.location.href = "../admin/delete/delete_data_danhmuc.php?madvspa=" + madvspa;
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
  