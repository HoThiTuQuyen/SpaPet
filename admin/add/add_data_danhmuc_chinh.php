<!-- tambah_data.php -->

<?php
    include_once("../services/connect.php");
    $madmchinh = $_GET['madmchinh'];
    $tendmchinh = $_GET['tendmchinh'];
    $motadmchinh = $_GET['motadmchinh'];
    $madm = $_GET['madm'];
   
    
    $clean_madmchinh = htmlspecialchars($madmchinh, ENT_QUOTES, 'UTF-8');
    $clean_tendmchinh = htmlspecialchars($tendmchinh, ENT_QUOTES, 'UTF-8');
    $clean_motadmchinh = htmlspecialchars($motadmchinh, ENT_QUOTES, 'UTF-8');
   

    $checktendmchinh = "SELECT * FROM dmchinh WHERE tendmchinh = '$clean_tendmchinh' ";
    $checkmadmchinh = "SELECT * FROM dmchinh WHERE madmchinh = '$clean_madmchinh' ";
    $resultchecktendmchinh = $conn->query($checktendmchinh); 
    $resultcheckmadmchinh = $conn->query($checkmadmchinh); 
    $madm_array = (array) $_GET['madm'];

    if($resultchecktendmchinh->num_rows > 0 || $resultcheckmadmchinh->num_rows > 0 || !in_array($madm, $madm_array)) {
        header('Location:../index.php?page=danhmucchinh&error=1');
    } else if(empty($clean_madmchinh) || empty($clean_tendmchinh) || empty($madm)) {
        header('Location:../index.php?page=danhmucchinh&error=2');
    } else {
        $sql = "INSERT INTO dmchinh (madmchinh, tendmchinh, motadmchinh, madm) VALUES ('$clean_madmchinh','$clean_tendmchinh','$clean_motadmchinh','$madm')";
        $result = $conn->query($sql); 
        header("Location: ../index.php?page=danhmucchinh");
    }
   


   
?>