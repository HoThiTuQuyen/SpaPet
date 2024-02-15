<!-- tambah_data.php -->

<?php
    include_once("../services/connect.php");
    $mancc = $_GET['mancc'];
    $tenncc = $_GET['tenncc'];
    $diachi = $_GET['diachi'];
    $sdt = $_GET['sdt'];

    $clean_mancc = htmlspecialchars($mancc, ENT_QUOTES, 'UTF-8');
    $clean_tenncc = htmlspecialchars($tenncc, ENT_QUOTES, 'UTF-8');
    $clean_diachi = htmlspecialchars($diachi, ENT_QUOTES, 'UTF-8');
    $clean_sdt = htmlspecialchars($sdt, ENT_QUOTES, 'UTF-8');

    $checktenncc = "SELECT * FROM nhacc WHERE tenncc = '$tenncc' ";
    $resultchecktenncc = $conn->query($checktenncc); 
    if($resultchecktenncc->num_rows > 0){
        header('Location:../index.php?page=nha_cung_cap&error=1');
    }else if($clean_mancc == null||$clean_tenncc == null){
        // header('Location:../index.php?page=admin&error=2');
          header('Location:../index.php?page=nha_cung_cap&error=2');
    }else{
        $sql = "INSERT INTO nhacc (mancc, tenncc, diachi, sdt) VALUES ('$clean_mancc','$clean_tenncc','$clean_diachi','$clean_sdt')";
        $result = $conn->query($sql); 
        // $query = mysqli_query($conn,"INSERT INTO tb_admin ( name, username, password, level) VALUES ('$name','$username','$password','$level')");
        header("Location: ../index.php?page=nha_cung_cap");
    }

   


   
?>