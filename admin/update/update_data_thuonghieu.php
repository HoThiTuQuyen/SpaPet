<?php
    include_once("../services/connect.php");
    $math = $_POST['math'];
    $tenth = $_POST['tenth'];
    $motath = $_POST['motath'];

    $name_file = $_FILES['photo']['name'];
    $clean_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');


    $file_tmp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($file_tmp,'../assets/image/thuonghieu/'. $name_file);
    // Sử dụng prepared statements để ngăn chặn SQL Injection
    $sql = "UPDATE thuonghieu SET tenth = '$tenth', image_th='$name_file'where math='$math'";
        $result = $conn->query($sql); 
        // $query = mysqli_query($conn,"INSERT INTO tb_admin ( name, username, password, level) VALUES ('$name','$username','$password','$level')");
        header("Location: ../index.php?page=thuonghieu");
    
   
?>