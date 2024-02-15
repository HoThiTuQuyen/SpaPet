<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Nhập Kho</h3>
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
                                    <th>Mã phiếu</th>
                                    <th>Ngày nhập</th>
                                    <th>Nhà cung cấp</th>
                                    <th>Tài khoản</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền/SL</th>
                                    <th>Lô hàng</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include_once("./services/connect.php");
                                        $query = mysqli_query($conn,"SELECT * FROM phieunhap");
                                        while ($mhs = mysqli_fetch_array($query))
                                        {
                                            
                                ?>
                                <tr>

                                    <td><?php echo $mhs['mapn']?></td>
                                    <td><?php echo $mhs['ngaynhap']?></td>
                                    <td><?php echo getSupplierName($mhs['mancc'], $conn)?></td>
                                    <td><?php echo getAccountName($mhs['id'], $conn)?></td>
                                    <td><?php echo $mhs['sl_tong']?></td>
                                    <td><?php echo $mhs['giatri_tong']?></td>
                                    <td><?php echo $mhs['lohang']?></td>
                                    <td><a onclick="hapus_data('<?php echo $mhs['mapn'];?>')"
                                            class="btn btn-sm btn-danger">Xóa</a>
                                        <a class="btn btn-sm btn-info view-data-pn" data-toggle="modal"
                                            data-target="#orderDetailsModal" data-mapn="<?php echo $mhs['mapn']; ?>">Xem
                                            chi tiết</a>

                                        <!-- <a href="index.php?page=edit_nha_cung_cap&&mancc=<?php echo $mhs['mapn'];?>"
                                            class="btn btn-sm btn-success">Sửa</a> -->
                                        <!-- <a class="view-data-ncc btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modal-view-pn" data-mancc="<?php echo $mhs['mapn']?>"
                                            data-tenncc=" <?php echo $mhs['tenncc']?>" data-id="<?php echo $mhs['id']?>"
                                            data-sl_tong="<?php echo $mhs['sl_tong']?>"
                                            data-giatri_tong="<?php echo $mhs['giatri_tong']?>"
                                            data-lohang="<?php echo $mhs['lohang']?>"
                                            data-sanpham="<?php echo $mhs['masp']?>"
                                            data-soluong="<?php echo $mhs['soluong']?>"
                                            data-gianhap="<?php echo $mhs['gianhap']?>"
                                            data-tongtien_sp="<?php echo $mhs['tongtien_sp']?>">

                                            Chi
                                            Tiết
                                        </a> -->

                                    </td>
                                </tr>
                                <?php 
                                }
                                ?>
                                <?php
                                // Hàm để lấy tên nhà cung cấp
                                function getSupplierName($mancc, $conn) {
                                    $query = mysqli_query($conn, "SELECT tenncc FROM nhacc WHERE mancc = '$mancc'");
                                    $result = mysqli_fetch_assoc($query);
                                    return $result['tenncc'];
                                }

                                // Hàm để lấy tên tài khoản
                                function getAccountName($accountId, $conn) {
                                    $query = mysqli_query($conn, "SELECT name FROM tb_admin WHERE id = '$accountId'");
                                    $result = mysqli_fetch_assoc($query);
                                    return $result['name'];
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
                <h4 class="modal-title">Phiếu nhập kho</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- them data user -->
            <form method="post" action="../admin/add/process.php">
                <div class="modal-body">

                    <div class="form-row" style="margin-bottom: 20px;">
                        <div class="col">
                            <label>Ngày nhập:</label>

                            <input type="text" class="form-control" name="ngayNhap"
                                value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
                        </div>
                        <div class="col">
                            <label>Tài khoản:</label>

                            <select name="maNguoiQuanLy" class="form-control">
                                <?php
                            // Truy vấn mã người quản lý từ bảng tb_admin
                            $sqlAdmin = "SELECT id, name FROM tb_admin";
                            $resultAdmin = $conn->query($sqlAdmin);

                            // Hiển thị danh sách mã người quản lý trong dropdown
                            if ($resultAdmin->num_rows > 0) {
                                while ($rowAdmin = $resultAdmin->fetch_assoc()) {
                                    echo "<option value='" . $rowAdmin['id'] . "'>" . $rowAdmin['name'] . "</option>";
                                }
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col">
                            <label>Nhà cung cấp:</label>
                            <select class="form-control" name="maNhaCungCap">
                                <option selected>Chọn nhà cung cấp</option>
                                <?php  
                                            $query = mysqli_query($conn, "SELECT * FROM nhacc");
                                            while ($mhs = mysqli_fetch_array($query)) {
                                                echo '<option value="' . $mhs['mancc'] . '">' . $mhs['tenncc'] . '</option>';
                                            }
                                            ?>
                            </select>
                        </div>
                        <div class="col">
                            <label>Lô hàng:</label>
                            <input type="text" class="form-control" placeholder="Mã lô hàng" name="maLoHang"
                                id="maLoHangInput">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label>Sản phẩm:</label>
                            <select name="sanPham[]" id="sanPhamSelect" onchange="updateGiaXuat()"
                                class="form-control select2-search" style="overflow: auto;">
                                <?php
                            // Truy vấn mã sản phẩm từ bảng sanpham
                            $sqlProduct = "SELECT masp, tensp FROM sanpham";
                            $resultProduct = $conn->query($sqlProduct);

                            // Hiển thị danh sách mã sản phẩm trong dropdown
                            if ($resultProduct->num_rows > 0) {
                                while ($rowProduct = $resultProduct->fetch_assoc()) {
                                    echo "<option value='" . $rowProduct['masp'] . "'>" . $rowProduct['tensp'] . "</option>";
                                }
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col">
                            <label>Số lượng:</label>
                            <input type="number" name="soLuong[]" id="soLuongInput" min="1" class="form-control"
                                placeholder="Số lượng">
                        </div>
                        <!-- <div class="col">
                            <label>Giá xuất:</label>
                            <input id="giaNhapText" class="form-control" placeholder="Giá Nhập">
                        </div> -->
                        <div class="col">
                            <label></label>
                            <button type="button" class="btn btn-info" style="margin-top: 30px;"
                                onclick="themSanPham()">Thêm </button>
                        </div>
                    </div>
                </div>
                <div class="form-row" style="margin-left: 15px; margin-top: 10px; margin-right:15px">
                    <div class="col">
                        <h4 class="modal-title">Danh Sách Sản Phẩm</h4>
                        <div style="max-height: 300px; overflow-y: auto;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Huỷ</th>
                                        <th>Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                        <!-- <th>Giá Nhập</th> -->

                                    </tr>
                                </thead>
                                <tbody id="danhSachSanPhamTable"></tbody>
                            </table>
                        </div>
                    </div>
                    <script>
                    $(document).ready(function() {
                        $('.select2-search').select2({
                            theme: 'bootstrap4',
                            allowClear: true,
                            placeholder: 'Tìm kiếm sản phẩm...',
                            ajax: {
                                url: 'add/search.php', // Đường dẫn đến tập tin xử lý tìm kiếm
                                dataType: 'json',
                                delay: 250,
                                processResults: function(data) {
                                    return {
                                        results: data
                                    };
                                },
                                cache: true
                            },
                            dropdownAutoWidth: true // Thêm thanh cuộn cho dropdown
                        });
                    });
                    </script>
                    <script>
                    function themSanPham() {
                        // Lấy giá trị từ các input
                        var sanPhamSelect = document.getElementById("sanPhamSelect");
                        var soLuongInput = document.getElementById("soLuongInput");
                        // Thay đổi giá nhập theo masp
                        var giaNhapInput = sanPhamSelect.options[sanPhamSelect.selectedIndex].getAttribute(
                            "data-gianhap");

                        var danhSachSanPhamTable = document.getElementById("danhSachSanPhamTable");

                        // Tạo một dòng mới trong bảng
                        var newRow = danhSachSanPhamTable.insertRow();
                        // Tạo ô nút xóa trong dòng
                        var cell0 = newRow.insertCell(0);
                        cell0.innerHTML =
                            '<button type="button" class="btn btn-danger" onclick="xoaSanPham(this)">x</button>';

                        // Tạo các ô trong dòng
                        var cell1 = newRow.insertCell(1);
                        var cell2 = newRow.insertCell(2);
                        var cell3 = newRow.insertCell(3);

                        // Đặt nội dung cho từng ô
                        cell1.innerHTML = sanPhamSelect.options[sanPhamSelect.selectedIndex].text;
                        cell2.innerHTML = soLuongInput.value;
                        cell3.innerHTML = giaNhapInput;

                        // Thêm giá trị vào form data
                        var hiddenInputSanPham = document.createElement("input");
                        hiddenInputSanPham.type = "hidden";
                        hiddenInputSanPham.name = "sanPham[]";
                        hiddenInputSanPham.value = sanPhamSelect.value;
                        newRow.appendChild(hiddenInputSanPham);

                        var hiddenInputSoLuong = document.createElement("input");
                        hiddenInputSoLuong.type = "hidden";
                        hiddenInputSoLuong.name = "soLuong[]";
                        hiddenInputSoLuong.value = soLuongInput.value;
                        newRow.appendChild(hiddenInputSoLuong);

                        var hiddenInputGiaNhap = document.createElement("input");
                        hiddenInputGiaNhap.type = "hidden";
                        hiddenInputGiaNhap.name = "giaNhap[]";
                        hiddenInputGiaNhap.value = giaNhapInput;
                        newRow.appendChild(hiddenInputGiaNhap);
                    }

                    function updateGiaXuat() {
                        var sanPhamSelect = document.getElementById("sanPhamSelect");
                        var giaNhapText = document.getElementById("giaNhapText");

                        // Lấy giá trị giá nhập từ thuộc tính data-gianhap của option đã chọn
                        var giaNhap = sanPhamSelect.options[sanPhamSelect.selectedIndex].getAttribute("data-gianhap");

                        // Hiển thị giá nhập
                        giaNhapText.value = giaNhap;
                    }

                    function xoaSanPham(button) {
                        var row = button.parentNode.parentNode;
                        row.parentNode.removeChild(row);
                    }
                    </script>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Thêm Phiếu Nhập</button>
                </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- model view data -->
<div class="modal fade" id="orderDetailsModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chi Tiết</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Nội dung chi tiết đơn hàng sẽ được hiển thị ở đây -->
                <div id="orderDetailsContent"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<!-- vid 11 -->
<script>
$('.view-data-pn').on('click', function() {
    var mapn = $(this).data('mapn');

    $.ajax({
        type: 'POST',
        url: 'add/get_details_pn.php',
        data: {
            mapn: mapn
        },
        success: function(response) {
            $('#orderDetailsContent').html(response);
            $('#orderDetailsModal').modal('show');
        }
    });
});

function hapus_data(mapn) {
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
            window.location.href = "../admin/delete/remove_phieunhap.php?mapn=" + mapn;
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
  