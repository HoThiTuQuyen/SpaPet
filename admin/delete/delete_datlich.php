<?php
    include_once("../services/connect.php");
    $madatlich = $_GET['madatlich'];
    
    $sql = "DELETE FROM datlich1 WHERE madatlich='$madatlich'";
    $result = $conn->query($sql); 
   
    // $query = mysqli_query($conn,"DELETE FROM tb_admin WHERE id='$id'");
    header("Location: ../index.php?page=lich_spa");
?>