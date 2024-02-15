<?php
    include_once("../services/connect.php");
    $manews = $_GET['manews'];
    
    $sql = "DELETE FROM news WHERE manews='$manews'";
    $result = $conn->query($sql); 
   
    // $query = mysqli_query($conn,"DELETE FROM tb_admin WHERE id='$id'");
    header("Location: ../index.php?page=news");
?>