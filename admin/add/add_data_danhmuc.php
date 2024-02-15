<!-- tambah_data.php -->

<?php
    include_once("../services/connect.php");
    $madm = $_GET['madm'];
    $tendm = $_GET['tendm'];
    $motadm = $_GET['motadm'];

    $clean_madm = htmlspecialchars($madm, ENT_QUOTES, 'UTF-8');
    $clean_tendm = htmlspecialchars($tendm, ENT_QUOTES, 'UTF-8');
    $clean_motadm = htmlspecialchars($motadm, ENT_QUOTES, 'UTF-8');
   

    $checktendm = "SELECT * FROM danhmuc WHERE tendm = '$tendm' ";
    $resultchecktendm = $conn->query($checktendm); 
    if($resultchecktendm->num_rows > 0){
        header('Location:../index.php?page=danhmuc&error=1');
    }else if($clean_madm == null||$clean_tendm == null){
        // header('Location:../index.php?page=admin&error=2');
          header('Location:../index.php?page=danhmuc&error=2');
    }else{
        $sql = "INSERT INTO danhmuc (madm, tendm, motadm) VALUES ('$clean_madm','$clean_tendm','$clean_motadm')";
        $result = $conn->query($sql); 
        // $query = mysqli_query($conn,"INSERT INTO tb_admin ( name, username, password, level) VALUES ('$name','$username','$password','$level')");
        header("Location: ../index.php?page=danhmuc");
    }

   


   
?>