<!-- get_dichvu.php -->
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

// Xử lý dữ liệu được gửi từ AJAX
if (isset($_GET['maldv'])) {
    $selectedLoaiDichVu = $_GET['maldv'];

    // Truy vấn danh sách dịch vụ từ bảng dichvu dựa trên loại dịch vụ đã chọn
    $query_dich_vu = "SELECT * FROM dichvu WHERE maldv = '$selectedLoaiDichVu'";
    $result_dich_vu = $conn->query($query_dich_vu);

    // Trả về HTML của danh sách dịch vụ
    while ($row_dich_vu = $result_dich_vu->fetch_assoc()) {
        echo "<option value='" . $row_dich_vu['madv'] . "'>" . $row_dich_vu['tendv'] . "</option>";
    }
}

// Đóng kết nối database
$conn->close();
?>