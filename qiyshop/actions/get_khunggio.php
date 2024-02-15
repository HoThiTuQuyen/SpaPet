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
if (isset($_GET['mangay'])) {
    $selectedNgay = $_GET['mangay'];

    // Truy vấn danh sách giờ từ bảng gio1 dựa trên ngày đã chọn
    $query_gio = "SELECT magio, gio, trangthai FROM gio1 WHERE mangay = '$selectedNgay'";
    $result_gio = $conn->query($query_gio);

    // Tạo một mảng để lưu thông tin về từng khung giờ
    $khungGio = array();

    // Duyệt qua kết quả và thêm vào mảng
    while ($row_gio = $result_gio->fetch_assoc()) {
        $khungGio[] = array(
            'ma_gio' => $row_gio['magio'],
            'time' => $row_gio['gio'],
            'status' => $row_gio['trangthai']
        );
    }

    // Trả về dữ liệu dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($khungGio);
}

// Đóng kết nối database
$conn->close();
?>