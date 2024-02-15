<?php
    include_once("../services/connect.php");
    $id = $_POST['id'];
    $name = $_POST['name'];
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    // $level = $_POST['level'];
    $name_file = $_FILES['photo']['name'];
    $clean_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    // $clean_username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    // $clean_password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
    // $clean_level = htmlspecialchars($level, ENT_QUOTES, 'UTF-8');

    $file_tmp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($file_tmp,'../assets/image/'. $name_file);
 
        $sql = "UPDATE tb_admin SET name = '$clean_name', image='$name_file'where id='$id'";
        $result = $conn->query($sql); 
        // $query = mysqli_query($conn,"INSERT INTO tb_admin ( name, username, password, level) VALUES ('$name','$username','$password','$level')");
        header("Location: ../index.php?page=admin");
    
   
?>