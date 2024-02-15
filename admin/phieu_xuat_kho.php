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
                                    <th>Ngày xuất</th>
                                    <th>Khách hàng</th>

                                    <th>Số lượng</th>
                                    <th>Tổng tiền/SL</th>
                                    <!-- <th>Lô hàng</th> -->
                                    <th>Tài khoản xuất</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "petshome";

                                    $conn = new mysqli($servername, $username, $password, $dbname);

                                    if ($conn->connect_error) {
                                        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                                    }

                                    $maLoHangDefault = "";

                                    if (isset($_POST['maLoHang'])) {
                                        $maLoHangDefault = $_POST['maLoHang'];
                                    }
                                    ?>
                                <?php 
                                    
                                    $query = mysqli_query($conn, "SELECT * FROM phieuxuat");
                                    while ($mhs = mysqli_fetch_array($query)) {
                                            
                                ?>
                                <tr>

                                    <td><?php echo $mhs['mapx']?></td>
                                    <td><?php echo $mhs['ngayxuat']?></td>
                                    <td><?php echo getName($mhs['makh'], $conn)?></td>

                                    <td><?php echo $mhs['sl_xuat']?></td>
                                    <td><?php echo $mhs['giatri_tong']?></td>
                                    <!-- <td><?php echo $mhs['lohang']?></td> -->
                                    <td><?php echo getidName($mhs['id'], $conn)?></td>
                                    <td><a onclick="hapus_data('<?php echo $mhs['mapx'];?>')"
                                            class="btn btn-sm btn-danger">Xóa</a>

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
                                <?php
                                // Hàm để lấy tên nhà cung cấp
                                function getName($makh, $conn) {
                                    $query = mysqli_query($conn, "SELECT tenkh FROM khachhang WHERE makh = '$makh'");
                                    $result = mysqli_fetch_assoc($query);
                                    return $result['tenkh'];
                                }
                                

                                // Hàm để lấy tên tài khoản
                                function getidName($accountId, $conn) {
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
                <h4 class="modal-title">Phiếu xuất kho</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- them data user -->
            <form method="post" id="phieuXuatForm" action="../admin/add/processxk.php">
                <div class="modal-body">

                    <div class="form-row" style="margin-bottom: 20px;">
                        <div class="col">
                            <label>Ngày xuất:</label>

                            <input type="text" class="form-control" name="ngayXuat"
                                value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
                        </div>
                        <div class="col">
                            <label>Tài khoản:</label>

                            <select name="maNguoiXuat" class="form-control">
                                <?php
                            $sqlAdmin = "SELECT id, name FROM tb_admin";
                            $resultAdmin = $conn->query($sqlAdmin);

                            if ($resultAdmin->num_rows > 0) {
                                while ($rowAdmin = $resultAdmin->fetch_assoc()) {
                                    echo "<option value='" . $rowAdmin['id'] . "'>" . $rowAdmin['name'] . "</option>";
                                }
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col">
                            <label>Khách hàng:</label>
                            <select name="maKhachHang" id="maKhachHangSelect" class="form-control">
                                <?php
                            // Truy vấn mã khách hàng từ bảng khachhang
                            $sqlKhachHang = "SELECT makh, tenkh FROM khachhang";
                            $resultKhachHang = $conn->query($sqlKhachHang);

                            // Hiển thị danh sách mã khách hàng trong dropdown
                            if ($resultKhachHang->num_rows > 0) {
                                while ($rowKhachHang = $resultKhachHang->fetch_assoc()) {
                                    echo "<option value='" . $rowKhachHang['makh'] . "'>" . $rowKhachHang['tenkh'] . "</option>";
                                }
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col">
                            <label>Lô hàng:</label>
                            <select name="maLoHang" id="maLoHangSelect" class="form-control">
                                <?php
                                $sqlLoHang = "SELECT DISTINCT lohang FROM tonkho";
                                $resultLoHang = $conn->query($sqlLoHang);

                                if ($resultLoHang->num_rows > 0) {
                                    while ($rowLoHang = $resultLoHang->fetch_assoc()) {
                                        $selected = ($maLoHangDefault == $rowLoHang['lohang']) ? 'selected' : '';
                                        echo "<option value='" . $rowLoHang['lohang'] . "' $selected>" . $rowLoHang['lohang'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label>Sản phẩm:</label>
                            <select name="sanPham[]" id="sanPhamSelect" class="form-control" onchange="updateGiaXuat()">
                            </select>
                        </div>
                        <div class="col">
                            <label>Số lượng:</label>
                            <input type="number" name="soLuong[]" id="soLuongInput" min="1" class="form-control"
                                placeholder="Số lượng">
                        </div>
                        <div class="col">
                            <label>Giá xuất:</label>
                            <input id="giaXuatText" class="form-control" placeholder="Giá xuất">
                        </div>
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
                                        <th>Giá Xuất</th>

                                    </tr>
                                </thead>
                                <tbody id="danhSachSanPhamTable"></tbody>
                            </table>
                        </div>
                    </div>
                    <script>
                    document.getElementById("maLoHangSelect").addEventListener("change", function() {
                        var selectedLoHang = this.value;

                        console.log("Selected LoHang:", selectedLoHang);

                        var xhr = new XMLHttpRequest();
                        xhr.open("GET", "add/get_products_by_lohang.php?lohang=" + selectedLoHang, true);

                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                document.getElementById("sanPhamSelect").innerHTML = xhr.responseText;
                                updateGiaXuat(); // Update giá xuất khi danh sách sản phẩm thay đổi
                            }
                        };

                        xhr.send();
                    });

                    function updateGiaXuat() {
                        var sanPhamSelect = document.getElementById("sanPhamSelect");
                        var giaXuatText = document.getElementById("giaXuatText");

                        // Lấy giá trị giá xuất từ thuộc tính data-giaban của option đã chọn
                        var giaXuat = sanPhamSelect.options[sanPhamSelect.selectedIndex].getAttribute("data-giaban");

                        // Hiển thị giá xuất
                        giaXuatText.textContent = "Giá Xuất: " + giaXuat;
                    }

                    function themSanPham() {
                        var sanPhamSelect = document.getElementById("sanPhamSelect");
                        var soLuongInput = document.getElementById("soLuongInput");

                        var danhSachSanPham = document.getElementById("danhSachSanPham");

                        var listItem = document.createElement("li");
                        listItem.textContent = sanPhamSelect.options[sanPhamSelect.selectedIndex].text +
                            " - Số lượng: " + soLuongInput.value +
                            " - Giá xuất: " + sanPhamSelect.options[sanPhamSelect.selectedIndex].getAttribute(
                                "data-giaban");

                        danhSachSanPham.appendChild(listItem);

                        var hiddenInputSanPham = document.createElement("input");
                        hiddenInputSanPham.type = "hidden";
                        hiddenInputSanPham.name = "sanPham[]";
                        hiddenInputSanPham.value = sanPhamSelect.value;
                        danhSachSanPham.appendChild(hiddenInputSanPham);

                        var hiddenInputSoLuong = document.createElement("input");
                        hiddenInputSoLuong.type = "hidden";
                        hiddenInputSoLuong.name = "soLuong[]";
                        hiddenInputSoLuong.value = soLuongInput.value;
                        danhSachSanPham.appendChild(hiddenInputSoLuong);
                    }
                    </script>
                    <script>
                    function updateGiaXuat() {
                        var sanPhamSelect = document.getElementById("sanPhamSelect");
                        var giaXuatText = document.getElementById("giaXuatText");

                        // Lấy giá trị giá xuất từ thuộc tính data-giaban của option đã chọn
                        var giaXuat = sanPhamSelect.options[sanPhamSelect.selectedIndex].getAttribute("data-giaban");

                        // Hiển thị giá xuất
                        giaXuatText.value = giaXuat; // Sử dụng value thay vì textContent
                    }

                    function themSanPham() {
                        var sanPhamSelect = document.getElementById("sanPhamSelect");
                        var soLuongInput = document.getElementById("soLuongInput");
                        var giaXuatInput = document.getElementById("giaXuatText"); // Đặt ID giống nhau cho giá xuất

                        var danhSachSanPhamTable = document.getElementById("danhSachSanPhamTable");

                        var newRow = danhSachSanPhamTable.insertRow();

                        var cell0 = newRow.insertCell(0);
                        cell0.innerHTML =
                            '<button type="button" class="btn btn-danger" onclick="xoaSanPham(this)">x</button>';

                        var cell1 = newRow.insertCell(1);
                        var cell2 = newRow.insertCell(2);
                        var cell3 = newRow.insertCell(3);

                        cell1.innerHTML = sanPhamSelect.options[sanPhamSelect.selectedIndex].text;
                        cell2.innerHTML = soLuongInput.value;
                        cell3.innerHTML = giaXuatInput.value; // Sử dụng giá xuất thay vì giá nhập

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

                        var hiddenInputGiaXuat = document.createElement("input"); // Đặt tên đúng cho giá xuất
                        hiddenInputGiaXuat.type = "hidden";
                        hiddenInputGiaXuat.name = "giaXuat[]";
                        hiddenInputGiaXuat.value = giaXuatInput.value;
                        newRow.appendChild(hiddenInputGiaXuat);
                    }

                    function xoaSanPham(button) {
                        var row = button.parentNode.parentNode;
                        row.parentNode.removeChild(row);
                    }
                    </script>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Xuất kho</button>
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
  