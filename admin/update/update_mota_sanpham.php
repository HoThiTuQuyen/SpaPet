<?php
include_once("../services/connect.php");

$masp = $_POST['masp'];
$mota = $_POST['mota'];
$loiich = $_POST['loiich'];
$huongdan = $_POST['huongdan'];
$luuy = $_POST['luuy'];

// Sử dụng prepared statements để ngăn chặn SQL Injection
$stmt = $conn->prepare("UPDATE motasp SET mota = ?, loiich = ?, huongdan = ?, luuy = ? WHERE masp = ?");
$stmt->bind_param("sssss", $mota, $loiich, $huongdan, $luuy, $masp);

// Thực hiện câu lệnh SQL
if ($stmt->execute()) {
    header("Location: ../index.php?page=mota_sanpham");
} else {
    echo "Có lỗi xảy ra khi cập nhật dữ liệu: " . $stmt->error;
}

// Đóng prepared statement
$stmt->close();
// Đóng kết nối
$conn->close();
?>