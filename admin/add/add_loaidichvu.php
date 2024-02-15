<?php
include_once("../services/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenloaidv = $_POST['tenloaidv'];
   

    $sql = "INSERT INTO loaidichvu (tenloaidv)
            VALUES ('$tenloaidv')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php?page=loaidichvu");
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>