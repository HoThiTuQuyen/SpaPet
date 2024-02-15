<?php

include_once("../services/connect.php");
$gio = $_POST['gio'];

// Validate and sanitize input (customize as needed)
$clean_gio = htmlspecialchars($gio, ENT_QUOTES, 'UTF-8');

$checkgio = "SELECT * FROM khung_gio WHERE gio = '$clean_gio'";
// $resultcheckgio = $conn->query($checkgio);

if ( $clean_gio == null) {
    header("Location: ../index.php?page=ngay_gio");
} else {
    $sql = "INSERT INTO khung_gio (gio) VALUES ('$clean_gio')";
    $result = $conn->query($sql);

    if ($result) {
        header("Location: ../index.php?page=ngay_gio");
    } else {
        header("Location: ../index.php?page=ngay_gio"). $conn->error;
    }
}
?>