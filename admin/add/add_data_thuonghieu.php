<?php
include_once("../services/connect.php");

$math = $_POST['math'];
$tenth = $_POST['tenth'];
$motath = $_POST['motath'];

$clean_math = htmlspecialchars($math, ENT_QUOTES, 'UTF-8');
$clean_tenth = htmlspecialchars($tenth, ENT_QUOTES, 'UTF-8');
$clean_motath = htmlspecialchars($motath, ENT_QUOTES, 'UTF-8');

$name_file = $_FILES['photo']['name'];
$file_tmp = $_FILES['photo']['tmp_name'];
move_uploaded_file($file_tmp, '../assets/image/thuonghieu/'. $name_file);

$checktenth = "SELECT * FROM thuonghieu WHERE tenth = '$clean_tenth'";
$resultchecktenth = $conn->query($checktenth); 
if($resultchecktenth->num_rows > 0) {
    header('Location:../index.php?page=thuonghieu&error=1');
} else if ($clean_math == null || $clean_tenth == null) {
    header('Location:../index.php?page=thuonghieu&error=2');
} else {
    $sql = "INSERT INTO thuonghieu (math, tenth, image_th, motath) VALUES ('$clean_math','$clean_tenth','$name_file','$clean_motath')";
    $result = $conn->query($sql); 
    header("Location: ../index.php?page=thuonghieu");
}




?>