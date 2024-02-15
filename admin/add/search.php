<?php
// Kết nối CSDL (sử dụng mysqli hoặc PDO tùy thuộc vào dự án của bạn)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petshome";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Lấy từ khóa tìm kiếm từ yêu cầu Ajax
$searchTerm = $_GET['term'];

// Truy vấn CSDL để lấy dữ liệu sản phẩm dựa trên từ khóa tìm kiếm
$sql = "SELECT masp, tensp FROM sanpham WHERE tensp LIKE '%$searchTerm%'";
$result = $conn->query($sql);

// Chuẩn bị mảng để chứa kết quả
$data = array();

// Lặp qua kết quả và đưa vào mảng
while ($row = $result->fetch_assoc()) {
    $data[] = array(
        'id' => $row['masp'],
        'text' => $row['tensp']
    );
}

// Format kết quả thành định dạng JSON và in ra
header('Content-Type: application/json');
echo json_encode($data);

// Đóng kết nối CSDL
$conn->close();
?>