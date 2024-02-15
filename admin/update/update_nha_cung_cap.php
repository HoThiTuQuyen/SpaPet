<?php
    include_once("../services/connect.php");
    $mancc = $_POST['mancc'];
    
    $tenncc = $_POST['tenncc'];
   
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];

   

    $clean_tenncc = htmlspecialchars($tenncc, ENT_QUOTES, 'UTF-8');
    $clean_diachi = htmlspecialchars($diachi, ENT_QUOTES, 'UTF-8');
    $clean_sdt = htmlspecialchars($sdt, ENT_QUOTES, 'UTF-8');
    

  
 
    $sql = "UPDATE nhacc SET tenncc = '$clean_tenncc', diachi = '$clean_diachi', sdt = '$clean_sdt' WHERE mancc = '$mancc'";
    
        $result = $conn->query($sql); 
        // $query = mysqli_query($conn,"INSERT INTO tb_admin ( name, username, password, level) VALUES ('$name','$username','$password','$level')");
        header("Location: ../index.php?page=nha_cung_cap");
    
   
?>