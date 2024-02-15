<?php
    include_once("../services/connect.php");
    $madmchinh = $_POST['madmchinh'];
    $tendmchinh = $_POST['tendmchinh'];
    $motadmchinh = $_POST['motadmchinh'];
    $madm = $_POST['madm'];

    // Sử dụng prepared statements để ngăn chặn SQL Injection
    $stmt = $conn->prepare("UPDATE dmchinh SET  tendmchinh = ?, motadmchinh = ?,madm = ? WHERE madmchinh = ?");
    $stmt->bind_param("ssss", $tendmchinh, $motadmchinh, $madm, $madmchinh);

    // Thực hiện câu lệnh SQL
    if ($stmt->execute()) {
        header("Location: ../index.php?page=danhmucchinh");
    } else {
        echo "Có lỗi xảy ra khi cập nhật dữ liệu: " . $stmt->error;
    }
    
   
?>