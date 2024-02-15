<?php
include_once("../services/connect.php");


    $maldv = $_POST['maldv'];
    $tenloaidv = $_POST['tenloaidv'];
   

    $clean_tenloaidv = htmlspecialchars($tenloaidv, ENT_QUOTES, 'UTF-8');
    
    $sql = "UPDATE loaidichvu SET  tenloaidv = '$clean_tenloaidv' WHERE maldv = '$maldv'";
    
    $result = $conn->query($sql); 
    header("Location: ../index.php?page=loaidichvu");


?>