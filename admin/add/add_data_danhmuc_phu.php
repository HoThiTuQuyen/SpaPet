<!-- tambah_data.php -->

<?php
    include_once("../services/connect.php");
    $madmphu = $_GET['madmphu'];
    $tendmphu = $_GET['tendmphu'];
    $motadmphu = $_GET['motadmphu'];
    $madmchinh = $_GET['madmchinh'];
   
    
    $clean_madmphu = htmlspecialchars($madmphu, ENT_QUOTES, 'UTF-8');
    $clean_tendmphu = htmlspecialchars($tendmphu, ENT_QUOTES, 'UTF-8');
    $clean_motadmphu = htmlspecialchars($motadmphu, ENT_QUOTES, 'UTF-8');
   

    $checktendmphu = "SELECT * FROM dmphu WHERE tendmphu = '$clean_tendmphu' ";
    $checkmadmphu = "SELECT * FROM dmphu WHERE madmphu = '$clean_madmphu' ";
    $resultchecktendmphu = $conn->query($checktendmphu); 
    $resultcheckmadmphu = $conn->query($checkmadmphu); 
    $madmchinh_array = (array) $_GET['madmchinh'];

    if($resultchecktendmphu->num_rows > 0 || $resultcheckmadmphu->num_rows > 0 || !in_array($madmchinh, $madmchinh_array)) {
        header('Location:../index.php?page=danhmucphu&error=1');
    } else if(empty($clean_madmphu) || empty($clean_tendmphu) || empty($madmchinh)) {
        header('Location:../index.php?page=danhmucphu&error=2');
    } else {
        $sql = "INSERT INTO dmphu (madmphu, tendmphu, motadmphu, madmchinh) VALUES ('$clean_madmphu','$clean_tendmphu','$clean_motadmphu','$madmchinh')";
        $result = $conn->query($sql); 
        header("Location: ../index.php?page=danhmucphu");
    }
   


   
?>