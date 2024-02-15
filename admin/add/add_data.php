<!-- tambah_data.php -->

<?php
    include_once("../services/connect.php");
    
    $name = $_GET['name'];
    $username = $_GET['username'];
    $password = $_GET['password'];
    $level = $_GET['level'];

    $clean_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $clean_username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    $clean_password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
    $clean_level = htmlspecialchars($level, ENT_QUOTES, 'UTF-8');

    $checkUsername = "SELECT * FROM tb_admin WHERE username = '$username' ";
    $resultcheckUsername = $conn->query($checkUsername); 
    if($resultcheckUsername->num_rows > 0){
        header('Location:../index.php?page=admin&error=1');
    }else if($clean_name == null||$clean_username == null||$clean_password == null||$clean_level == ''){
        // header('Location:../index.php?page=admin&error=2');
          header('Location:../index.php?page=admin&error=2');
    }else{
        $sql = "INSERT INTO tb_admin ( name, username, password, level) VALUES ('$clean_name','$clean_username','$clean_password','$clean_level')";
        $result = $conn->query($sql); 
        // $query = mysqli_query($conn,"INSERT INTO tb_admin ( name, username, password, level) VALUES ('$name','$username','$password','$level')");
        header("Location: ../index.php?page=admin");
    }

   


   
?>