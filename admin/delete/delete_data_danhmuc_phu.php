<?php
    include_once("../services/connect.php");
    $madmphu = $_GET['madmphu'];
    
    $sql = "DELETE FROM dmphu WHERE madmphu='$madmphu'";
    $result = $conn->query($sql); 

    // $query = mysqli_query($conn,"DELETE FROM tb_admin WHERE id='$id'");
    header("Location: ../index.php?page=danhmucphu");
?>