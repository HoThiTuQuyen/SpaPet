<?php
include_once("../services/connect.php");

$masp = $_POST['masp'];
$tensp = $_POST['tensp'];
$math = $_POST['math'];
$madmphu = $_POST['madmphu'];
$gianhap = $_POST['gianhap'];
$giaban = $_POST['giaban'];
$donvitinh = $_POST['donvitinh'];
$motasp = $_POST['motasp'];
$phanloai = $_POST['phanloai'];


$clean_masp = htmlspecialchars($masp, ENT_QUOTES, 'UTF-8');
$clean_tensp = htmlspecialchars($tensp, ENT_QUOTES, 'UTF-8');
$clean_math = htmlspecialchars($math, ENT_QUOTES, 'UTF-8');
$clean_madmphu = htmlspecialchars($madmphu, ENT_QUOTES, 'UTF-8');
$clean_gianhap = htmlspecialchars($gianhap, ENT_QUOTES, 'UTF-8');
$clean_giaban = htmlspecialchars($giaban, ENT_QUOTES, 'UTF-8');
$clean_donvitinh = htmlspecialchars($donvitinh, ENT_QUOTES, 'UTF-8');
$clean_phanloai = htmlspecialchars($phanloai, ENT_QUOTES, 'UTF-8');
// $clean_motasp = htmlspecialchars($motasp, ENT_QUOTES, 'UTF-8');

$name_file = $_FILES['photo']['name'];
$file_tmp = $_FILES['photo']['tmp_name'];
move_uploaded_file($file_tmp, '../assets/image/sanpham/' . $name_file);

$checktensp = "SELECT * FROM sanpham WHERE tensp = '$clean_tensp'";
// $checktmasp = "SELECT * FROM sanpham WHERE masp = '$clean_masp'";
$resultchecktensp = $conn->query($checktensp);
// $resultcheckmasp = $conn->query($checkmasp);  

// $madmphu_array = (array) $_POST['madmphu'];
// $math_array = (array) $_POST['math'];

if($resultchecktensp->num_rows > 0) {
    header('Location:../index.php?page=sanpham&error=1');
} else if ($clean_masp == null || $clean_tensp == null || $clean_math == null || $clean_madmphu == null ) {
    header('Location:../index.php?page=sanpham&error=2');
} else {
    $sql = "INSERT INTO sanpham (masp, tensp, anhsp, math, madmphu,donvitinh,gianhap, giaban, motasp, phanloai) VALUES ('$clean_masp','$clean_tensp','$name_file','$clean_math','$clean_madmphu','$clean_donvitinh','$clean_gianhap','$clean_giaban','$motasp','$phanloai')";
    $result = $conn->query($sql); 
    header("Location: ../index.php?page=sanpham");
}
?>