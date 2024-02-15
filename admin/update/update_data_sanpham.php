<?php
include_once("../services/connect.php");

$masp = $_POST['masp'];
$tensp = $_POST['tensp'];
$math = $_POST['math'];
$madmphu = $_POST['madmphu'];
$donvitinh = $_POST['donvitinh'];
$gianhap = $_POST['gianhap'];
$giaban = $_POST['giaban'];
$motasp = $_POST['motasp'];
$phanloai = $_POST['phanloai'];

// Kiểm tra xem người dùng đã chọn file mới hay không
if (!empty($_FILES['photo']['name'])) {
    // Nếu có file mới, di chuyển file tải lên vào thư mục
    $name_file = $_FILES['photo']['name'];
    $file_tmp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($file_tmp, '../assets/image/sanpham/' . $name_file);
} else {
    // Nếu không có file mới, sử dụng tên file hiện tại
    $name_file = $_POST['current_photo'];
}

// Sử dụng prepared statements để ngăn chặn SQL Injection
$sql = "UPDATE sanpham SET tensp = ?, math = ?, madmphu = ?, donvitinh = ?, gianhap = ?,  giaban = ?, anhsp = ?, motasp = ?, phanloai = ? WHERE masp = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssss", $tensp, $math, $madmphu, $donvitinh,$gianhap, $giaban, $name_file, $motasp,$phanloai, $masp);
$result = $stmt->execute();

// Kiểm tra kết quả
if ($result) {
    header("Location: ../index.php?page=sanpham");
} else {
    echo "Cập nhật không thành công: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>