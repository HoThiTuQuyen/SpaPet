<?php
    session_start(); // Bắt đầu phiên làm việc ở đầu trang

    include_once('../services/connect.php');
   
    $_SESSION['makh'] = $makh;
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
    move_uploaded_file($file_tmp, '../assets/image/image_kh/' . $name_file);

    $sql = "UPDATE khachhang SET tenkh = '$clean_tenkh', email = '$clean_email', matkhau = '$clean_matkhau', sdt = '$clean_sdt', diachi = '$clean_diachi', image_kh = '$name_file' WHERE makh = '$makh'";

    // $result = $conn->query($sql);
    // $makh = $_SESSION['makh'];
    // $query = mysqli_query($conn, "SELECT * FROM khachhang WHERE makh = '$makh'");
    // $mhs = mysqli_fetch_array($query);
    // $query = mysqli_query($conn,"INSERT INTO tb_admin ( name, username, password, level) VALUES ('$name','$username','$password','$level')");
    header("Location: ../index.php");
    exit();
?>