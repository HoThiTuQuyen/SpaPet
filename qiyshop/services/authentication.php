<?php

    include_once("connect.php");
    session_start();
    // $tenkh = $_POST['tenkh'];
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
   

    //loại bỏ lỗi sql injection khỏi bị hacker tấn công
    // $clean_tenkh = htmlspecialchars($tenkh, ENT_QUOTES, 'UTF-8');
    $clean_email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $clean_matkhau = htmlspecialchars($matkhau, ENT_QUOTES, 'UTF-8');

  


   $sql = "SELECT * FROM khachhang WHERE email='$clean_email' and matkhau='$clean_matkhau'";
   $result = $conn->query($sql); 
   if(mysqli_num_rows($result)==1){
        session_start();
        $user = mysqli_fetch_array($result);
        $_SESSION["email"] = $email;
        $_SESSION["tenkh"] = $user['tenkh'];
        $_SESSION["image_kh"] = $user['image_kh'];

        // Đặt biến session để cho biết người dùng đã đăng nhập
        $_SESSION["is_logged_in"] = true;

        header('Location:../index.php');
   }
   else if($clean_email == '' || $clean_matkhau == ''){
    header('Location:../login.php?error=2');  

   }else{
    header('Location:../login.php?error=1');  

   }

?>