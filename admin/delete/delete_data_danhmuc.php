<?php
    include_once("../services/connect.php");
    $madm = $_GET['madm'];

    $sql = "DELETE FROM danhmuc WHERE madm='$madm'";
    $result = $conn->query($sql); 
    header("Location: ../index.php?page=danhmuc");

    $maldv = $_GET['maldv'];

    $sql = "DELETE FROM loaidichvu WHERE maldv='$maldv'";
    $result = $conn->query($sql); 
    header("Location: ../index.php?page=loaidichvu");
   
    $mangay = $_GET['mangay'];

    $sql = "DELETE FROM ngay1 WHERE mangay='$mangay'";
    $result = $conn->query($sql); 

    header("Location: ../index.php?page=ngay_gio");

    $madvspa = $_GET['madvspa'];

    $sql = "DELETE FROM don_dv_spa WHERE madvspa='$madvspa'";
    $result = $conn->query($sql); 

    header("Location: ../index.php?page=don_dv_spa");

?>