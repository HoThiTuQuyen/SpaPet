<?php
        session_start(); // Start the session at the beginning

    include_once('../services/connect.php'); 
    $email = $_POST['email'];
    $password = $_POST['matkhau'];

   
    $sql = "SELECT * FROM khachhang WHERE email=? AND matkhau=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows == 1) {
        $khachhang = $result->fetch_assoc(); 
        $_SESSION["makh"]  = $khachhang['makh']; // Use fetch_assoc to get associative array
        $_SESSION["name"] = $khachhang['tenkh']; // Assuming 'username' is the correct column name
        // $_SESSION["name"] = $khachhang['name'];  
        // $_SESSION["level"] = $khachhang['level'];
        // $_SESSION["image"] = $khachhang['image'];
        header('Location:../index.php');
    } else{
        echo 'sai tài khoản hoặc mật khẩu';
    }

    // Close the statement
    $stmt->close();
    // Close the connection
    $conn->close();



?>