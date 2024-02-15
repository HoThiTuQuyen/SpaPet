<?php
    include_once("../services/connect.php");
    $makh = $_GET['makh'];
    
    $sql = "DELETE FROM khachhang WHERE makh='$makh'";
    $result = $conn->query($sql); 
   
    // $query = mysqli_query($conn,"DELETE FROM tb_admin WHERE id='$id'");
    header("Location: ../index.php?page=khachhang");

    
?>