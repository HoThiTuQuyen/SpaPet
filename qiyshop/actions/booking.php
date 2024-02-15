<?php
// Kết nối đến database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "petshome";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối database thất bại: " . $conn->connect_error);
}

// Xử lý dữ liệu được gửi từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị từ form
    $loaiDichVu = $_POST['loai_dich_vu'];
    $dichVu = $_POST['dich_vu'];
    $ngay = $_POST['ngay'];
    $gio = $_POST['gio'];
    $tenKhachHang = $_POST['ten_khach_hang'];
    $soDienThoai = $_POST['so_dien_thoai'];
    $ghichu = $_POST['ghichu'];

    // Chuẩn bị câu lệnh SQL để chèn dữ liệu
    $sql = "INSERT INTO dat_lich (loai_dich_vu, dich_vu, ngay, gio, ten_khach_hang, so_dien_thoai, ghichu) 
            VALUES ('$loaiDichVu', '$dichVu', '$ngay', '$gio', '$tenKhachHang', '$soDienThoai', '$ghichu')";

    // Thực hiện câu lệnh SQL
    if ($conn->query($sql) === TRUE) {
        echo "Lịch đã được đặt thành công!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Đóng kết nối database
$conn->close();
?>