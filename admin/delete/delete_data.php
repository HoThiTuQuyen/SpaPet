<?php
    include_once("../services/connect.php");
    $id = $_GET['id'];
    
    $sql = "DELETE FROM tb_admin WHERE id='$id'";
    $result = $conn->query($sql); 
   
    // $query = mysqli_query($conn,"DELETE FROM tb_admin WHERE id='$id'");
    header("Location: ../index.php?page=admin");
?>