<?php
    include_once('connect.php'); 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    //loại bỏ lỗi sql injection khỏi bị hacker tấn công
    $clean_username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    $clean_password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

  


   $sql = "SELECT * FROM tb_admin WHERE username='$clean_username' and password='$clean_password'";
   $result = $conn->query($sql); 
   if(mysqli_num_rows($result)==1){
        session_start();
        $user = mysqli_fetch_array($result);
        $_SESSION["username"] = $username;
        $_SESSION["name"] = $user['name'];
        $_SESSION["level"] = $user['level'];
        $_SESSION["image"] = $user['image'];
        header('Location:../index.php');
   }
   else if($clean_username == '' || $clean_password == ''){
    header('Location:../login.php?error=2');  

   }else{
    header('Location:../login.php?error=1');  

   }


?>