<?php
    include_once("../services/connect.php");
    // $mapn = $_GET['mapn'];
    
    // $sql = "DELETE FROM phieunhap WHERE mapn='$mapn'";
    // $result = $conn->query($sql); 

    // $query = mysqli_query($conn,"DELETE FROM tb_admin WHERE id='$id'");
    header("Location: ../index.php?page=phieu_nhap_kho");

    if (isset($_POST['deleteReceipt'])) {
        $mapnToDelete = $_POST['mapnToDelete'];
    
        // Xóa chi tiết phiếu nhập
        // $sqlDeleteDetail = "DELETE FROM ct_phieunhap WHERE mapn = '$mapnToDelete'";
        // $conn->query($sqlDeleteDetail);
    
        // Xóa thông tin phiếu nhập
        $sqlDeleteReceipt = "DELETE FROM phieunhap WHERE mapn = '$mapnToDelete'";
        if ($conn->query($sqlDeleteReceipt) === TRUE) {
            echo "Xóa phiếu nhập thành công";
        } else {
            echo "Lỗi khi xóa phiếu nhập: " . $conn->error;
        }
    }
?>