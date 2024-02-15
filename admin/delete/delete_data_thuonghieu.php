<?php
    include_once("../services/connect.php");
    $math = $_GET['math'];
    
    $sql = "DELETE FROM thuonghieu WHERE math='$math'";
    $result = $conn->query($sql); 
   
    // $query = mysqli_query($conn,"DELETE FROM tb_admin WHERE id='$id'");
    header("Location: ../index.php?page=thuonghieu");
?>