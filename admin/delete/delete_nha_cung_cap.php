<?php
    include_once("../services/connect.php");
    $mancc = $_GET['mancc'];
    
    $sql = "DELETE FROM nhacc WHERE mancc='$mancc'";
    $result = $conn->query($sql); 

    // $query = mysqli_query($conn,"DELETE FROM tb_admin WHERE id='$id'");
    header("Location: ../index.php?page=nha_cung_cap");
?>