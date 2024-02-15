<?php
    include_once("../services/connect.php");
    $madmphu = $_POST['madmphu'];
    $tendmphu = $_POST['tendmphu'];
    $motadmphu = $_POST['motadmphu'];
    $madmchinh = $_POST['madmchinh'];

    // Sử dụng prepared statements để ngăn chặn SQL Injection
    $stmt = $conn->prepare("UPDATE dmphu SET  tendmphu = ?, motadmphu = ?,madmchinh = ? WHERE madmphu = ?");
    $stmt->bind_param("ssss",  $tendmphu, $motadmphu, $madmchinh, $madmphu);

    // Thực hiện câu lệnh SQL
    if ($stmt->execute()) {
        header("Location: ../index.php?page=danhmucphu");
    } else {
        echo "Có lỗi xảy ra khi cập nhật dữ liệu: " . $stmt->error;
    }
    
   
?>