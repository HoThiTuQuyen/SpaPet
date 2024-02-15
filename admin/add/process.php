<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petshome";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Dữ liệu từ biểu mẫu nhập
$ngayNhap = $_POST['ngayNhap'];
$maNhaCungCap = $_POST['maNhaCungCap'];
$maNguoiQuanLy = $_POST['maNguoiQuanLy'];
$maLoHang = $_POST['maLoHang']; // Lấy giá trị mã lô hàng

// Thêm thông tin phiếu nhập vào bảng Phiếu nhập
$sqlInsertReceipt = "INSERT INTO phieunhap (ngaynhap, mancc, id, lohang) VALUES ('$ngayNhap', '$maNhaCungCap', '$maNguoiQuanLy', '$maLoHang')";
if ($conn->query($sqlInsertReceipt) === TRUE) {
    $lastReceiptID = $conn->insert_id; // Lấy ID của phiếu nhập vừa được thêm vào

    // Lặp qua danh sách sản phẩm và thêm thông tin chi tiết phiếu nhập
    $totalValue = 0; // Initialize total value
$totalSoluong = 0;
for ($i = 1; $i < count($_POST['sanPham']); $i++) {
    $sanPham = $_POST['sanPham'][$i];
    $soLuong = $_POST['soLuong'][$i];

    // Lấy thông tin từ bảng sanpham
    $sqlGetProductInfo = "SELECT tensp, gianhap FROM sanpham WHERE masp = '$sanPham'";
    $resultProductInfo = $conn->query($sqlGetProductInfo);

    if ($resultProductInfo->num_rows > 0) {
        $rowProductInfo = $resultProductInfo->fetch_assoc();
        $tenSP = $rowProductInfo['tensp'];
        $giaNhap = $rowProductInfo['gianhap'];

        // Tính tổng giá của sản phẩm
        $tongGia = $soLuong * $giaNhap;
        $totalValue += $tongGia; // Update total value
        $totalSoluong += $soLuong; // Update total value

        // Thêm thông tin chi tiết phiếu nhập vào bảng Chi tiết phiếu nhập
        $sqlInsertDetail = "INSERT INTO ct_phieunhap (mapn, masp, soluong, gianhap, tongtien_sp) 
                            VALUES ('$lastReceiptID', '$sanPham', '$soLuong', '$giaNhap', '$tongGia')";
        $conn->query($sqlInsertDetail);

        // Thêm mới sản phẩm vào bảng tonkho
        $sqlInsertTonKho = "INSERT INTO tonkho (masp, soluong, lohang, tensp, ngaynhap) 
                            VALUES ('$sanPham', '$soLuong', '$maLoHang', '$tenSP', '$ngayNhap' )";
        $conn->query($sqlInsertTonKho);
    }
}

    // Update giatri_tong column in the phieunhap table
    $sqlUpdateTotalValue = "UPDATE phieunhap SET giatri_tong = '$totalValue', sl_tong = '$totalSoluong' WHERE mapn = '$lastReceiptID'";
    $conn->query($sqlUpdateTotalValue);

    echo "Thêm phiếu nhập thành công";
    header("Location: ../index.php?page=phieu_nhap_kho"); 
    exit();
} else {
    echo "Lỗi: " . $sqlInsertReceipt . "<br>" . $conn->error;
}

// Đóng kết nối
$conn->close();
?>