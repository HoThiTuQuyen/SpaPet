<?php
    include_once("../services/connect.php");
    $makh = $_POST['makh'];
    
    $tenkh = $_POST['tenkh'];
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];

    $name_file = $_FILES['photo']['name'];

    $clean_tenkh = htmlspecialchars($tenkh, ENT_QUOTES, 'UTF-8');
    $clean_email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $clean_matkhau = htmlspecialchars($matkhau, ENT_QUOTES, 'UTF-8');
    $clean_sdt = htmlspecialchars($sdt, ENT_QUOTES, 'UTF-8');
    $clean_diachi = htmlspecialchars($diachi, ENT_QUOTES, 'UTF-8');

    $file_tmp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($file_tmp,'../assets/image/image_kh/'. $name_file);
 
    $sql = "UPDATE khachhang SET tenkh = '$clean_tenkh', email = '$clean_email', matkhau = '$clean_matkhau', sdt = '$clean_sdt', diachi = '$clean_diachi' WHERE makh = '$makh'";
    
        $result = $conn->query($sql); 
        // $query = mysqli_query($conn,"INSERT INTO tb_admin ( name, username, password, level) VALUES ('$name','$username','$password','$level')");
        header('Location: /qiyshop/profile.php');
    
   
?>