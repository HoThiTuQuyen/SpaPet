<?php
    include_once("../services/connect.php");
    $matonkho = $_GET['matonkho'];
    
    $sql = "DELETE FROM tonkho WHERE matonkho='$matonkho'";
    $result = $conn->query($sql); 

    // $query = mysqli_query($conn,"DELETE FROM tb_admin WHERE id='$id'");
    header("Location: ../index.php?page=ton_kho");
?>