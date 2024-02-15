<?php
include_once("../services/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tendv = $_POST['tendv'];
    $giadv = $_POST['giadv'];
    $maldv = $_POST['maldv'];

    // Kiểm tra sự tồn tại của maldv trong bảng loaidichvu
    $checkMaldvQuery = "SELECT maldv FROM loaidichvu WHERE maldv = '$maldv'";
    $resultCheckMaldv = $conn->query($checkMaldvQuery);

    if ($resultCheckMaldv->num_rows > 0) {
        // Nếu maldv tồn tại, thêm dữ liệu vào bảng dichvu
        $sql = "INSERT INTO dichvu (tendv, maldv, giadv) VALUES ('$tendv', '$maldv', '$giadv')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../index.php?page=dichvu");
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Nếu maldv không tồn tại, xử lý lỗi hoặc thông báo cho người dùng
        echo "Lỗi: maldv không tồn tại trong bảng loaidichvu";
    }

    $conn->close();
}
?>
