<!-- tambah_data.php -->

<?php
    include_once("../services/connect.php");
    
  
    $tenkh = $_GET['tenkh'];
    $email = $_GET['email'];
    $matkhau = $_GET['matkhau'];
    $sdt = $_GET['sdt'];
    $diachi = $_GET['diachi'];

    
    $clean_tenkh = htmlspecialchars($tenkh, ENT_QUOTES, 'UTF-8');
    $clean_email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $clean_matkhau = htmlspecialchars($matkhau, ENT_QUOTES, 'UTF-8');
    $clean_sdt = htmlspecialchars($sdt, ENT_QUOTES, 'UTF-8');
    $clean_diachi = htmlspecialchars($diachi, ENT_QUOTES, 'UTF-8');

    $checkemail = "SELECT * FROM khachhang WHERE email = '$email' ";
    $resultcheckemail = $conn->query($checkemail); 
    if($resultcheckemail->num_rows > 0){
        header('Location:../index.php?page=khachhang&error=1');
    }else if($clean_tenkh ==null ||$clean_email == null||$clean_matkhau == null){
        // header('Location:../index.php?page=admin&error=2');
          header('Location:../index.php?page=khachhang&error=2');
    }else{
        $sql = "INSERT INTO khachhang (tenkh,email, matkhau,sdt,diachi) VALUES ('$clean_tenkh','$clean_email','$clean_matkhau','$clean_sdt','$clean_diachi')";
        $result = $conn->query($sql); 
        // $query = mysqli_query($conn,"INSERT INTO tb_admin ( name, username, password, level) VALUES ('$name','$username','$password','$level')");
        header("Location: ../index.php?page=khachhang");
    }

   


   
?>