<?php
    include_once("../services/connect.php");
    $masp = $_GET['masp'];
    
    $sql = "DELETE FROM motasp WHERE masp='$masp'";
    $result = $conn->query($sql); 

    // $query = mysqli_query($conn,"DELETE FROM tb_admin WHERE id='$id'");
    header("Location: ../index.php?page=mota_sanpham");
?>