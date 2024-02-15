<?php
    include_once("../services/connect.php");
    $madmchinh = $_GET['madmchinh'];
    
    $sql = "DELETE FROM dmchinh WHERE madmchinh='$madmchinh'";
    $result = $conn->query($sql); 

    // $query = mysqli_query($conn,"DELETE FROM tb_admin WHERE id='$id'");
    header("Location: ../index.php?page=danhmucchinh");
?>