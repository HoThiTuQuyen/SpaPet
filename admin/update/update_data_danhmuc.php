<?php
    include_once("../services/connect.php");
    $madm = $_POST['madm'];
    $tendm = $_POST['tendm'];
    $motadm = $_POST['motadm'];

    // Sử dụng prepared statements để ngăn chặn SQL Injection
    $stmt = $conn->prepare("UPDATE danhmuc SET tendm = ?, motadm = ? WHERE madm = ?");
    $stmt->bind_param("sss", $tendm, $motadm, $madm);

    // Thực hiện câu lệnh SQL
    if ($stmt->execute()) {
        header("Location: ../index.php?page=danhmuc");
    } else {
        echo "Có lỗi xảy ra khi cập nhật dữ liệu: " . $stmt->error;
    }
    
   


    $mangay = $_POST['mangay'];
    $ngay = $_POST['ngay'];
   

    $clean_ngay = htmlspecialchars($ngay, ENT_QUOTES, 'UTF-8');
    
    $sql = "UPDATE ngay1 SET  ngay = '$clean_ngay' WHERE mangay = '$mangay'";
    
    $result = $conn->query($sql); 
    header("Location: ../index.php?page=ngay_gio");



    $makg = $_POST['makg'];
    $gio = $_POST['gio'];
   

    $clean_gio = htmlspecialchars($gio, ENT_QUOTES, 'UTF-8');
    
    $sql = "UPDATE khung_gio SET  gio = '$clean_gio' WHERE makg = '$makg'";
    
    $result = $conn->query($sql); 
    header("Location: ../index.php?page=ngay_gio");
?>