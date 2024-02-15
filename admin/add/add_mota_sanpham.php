<?php
include_once("../services/connect.php");

$masp = $_POST['masp'];
$mota = $_POST['mota'];
$loiich = $_POST['loiich'];
$huongdan = $_POST['huongdan'];
$luuy = $_POST['luuy'];



$clean_masp = htmlspecialchars($masp, ENT_QUOTES, 'UTF-8');
$clean_mota = htmlspecialchars($mota, ENT_QUOTES, 'UTF-8');
$clean_loiich = htmlspecialchars($loiich, ENT_QUOTES, 'UTF-8');
$clean_huongdan = htmlspecialchars($huongdan, ENT_QUOTES, 'UTF-8');
$clean_luuy = htmlspecialchars($luuy, ENT_QUOTES, 'UTF-8');




// $checktensp = "SELECT * FROM sanpham WHERE tensp = '$clean_tensp'";
$checktmasp = "SELECT * FROM motasp WHERE masp = '$clean_masp'";
// $resultchecktensp = $conn->query($checktensp);
$resultcheckmasp = $conn->query($checktmasp);  

// $madmphu_array = (array) $_POST['madmphu'];
// $math_array = (array) $_POST['math'];

if($resultcheckmasp->num_rows > 0) {
    header('Location:../index.php?page=mota_sanpham&error=1');
} else if ($clean_masp == null ) {
    header('Location:../index.php?page=mota_sanpham&error=2');
} else {
    $sql = "INSERT INTO motasp (masp, mota, loiich, huongdan,luuy) VALUES ('$clean_masp','$clean_mota','$clean_loiich','$clean_huongdan','$clean_luuy')";
    $result = $conn->query($sql); 
    header("Location: ../index.php?page=mota_sanpham");
}
?>