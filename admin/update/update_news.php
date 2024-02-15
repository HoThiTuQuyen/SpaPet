<?php
include_once("../services/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $manews = $_POST['manews'];
    $tieude = $_POST['tieude'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noi_dung']; // Sửa thành 'noi_dung'

    // Kiểm tra xem có tệp ảnh mới được tải lên hay không
    if ($_FILES['photo']['error'] == 0) {
        $name_file = $_FILES['photo']['name'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        move_uploaded_file($file_tmp, '../assets/image/image_news/' . $name_file);

        // Cập nhật đường dẫn ảnh trong cơ sở dữ liệu
        $sqlUpdateImage = "UPDATE news SET image_news = '$name_file' WHERE manews = '$manews'";
        $conn->query($sqlUpdateImage);
    }
    $name_file = $_FILES['photo']['name'];
    $clean_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');


    $file_tmp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($file_tmp,'../assets/image/thuonghieu/'. $name_file);
    // Cập nhật thông tin bài viết và ngày đăng
    $sqlUpdate = "UPDATE news SET ngaydang = NOW(), tieude = '$tieude', tomtat = '$tomtat', noidung = '$noidung' WHERE manews = '$manews'";

    if ($conn->query($sqlUpdate) === TRUE) {
        header("Location: ../index.php?page=news");
    } else {
        echo "Lỗi MySQLi: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>