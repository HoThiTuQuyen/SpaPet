<?php
include_once("../services/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ngaydang = $_POST['ngaydang'];
    $maNguoiQuanLy = $_POST['maNguoiQuanLy'];
    $loai_bai_viet = $_POST['loai_bai_viet'];
    $tieude = $_POST['tieude'];
    $tomtat = $_POST['tomtat'];
    $noi_dung = $_POST['noi_dung'];

    $name_file = $_FILES['photo']['name'];
    $file_tmp = $_FILES['photo']['tmp_name'];

    move_uploaded_file($file_tmp, '../assets/image/image_news/' . $name_file);

    $sql = "INSERT INTO news (ngaydang, id, loai, tieude, tomtat, noidung, image_news)
            VALUES ('$ngaydang', '$maNguoiQuanLy', '$loai_bai_viet', '$tieude', '$tomtat', '$noi_dung', '$name_file')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php?page=news");
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>