<?php
include_once("../services/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $madv = $_POST['madv'];
    $tendv = $_POST['tendv'];
    $maldv = $_POST['maldv'];
    $giadv = $_POST['giadv'];

    // Sử dụng Prepared Statements để tránh SQL injection
    $sql = "UPDATE dichvu SET tendv = ?, maldv = ?, giadv = ? WHERE madv = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $tendv, $maldv, $giadv, $madv);
    
    // Kiểm tra và thực hiện truy vấn
    if ($stmt->execute()) {
        header("Location: ../index.php?page=dichvu");
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>