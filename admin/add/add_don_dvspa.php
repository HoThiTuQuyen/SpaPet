<?php
include_once("../services/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ngaytao = $_POST['ngaytao'];
    $tenkh = $_POST['tenkh'];
    $sdt = $_POST['sdt'];
    $loai_dich_vu = $_POST['loai_dich_vu'];
    $dich_vu = $_POST['dich_vu'];

    // Thực hiện truy vấn để lấy giá dịch vụ theo madv
    $sql_get_giadv = "SELECT giadv FROM dichvu WHERE madv = '$dich_vu'";
    $result_get_giadv = $conn->query($sql_get_giadv);

    if ($result_get_giadv->num_rows > 0) {
        $row = $result_get_giadv->fetch_assoc();
        $giadv = $row['giadv'];

        // Tính thuế (8%)
        $thue = $giadv * 0.08;

        // Tính tổng tiền (giadv + thue)
        $tongtien = $giadv + $thue;

        // Thêm vào bảng don_dvspa
        $sql = "INSERT INTO don_dv_spa (ngaytao, tenkh,sdt, maldv, madv, giadv, thue, tongtien)
                                VALUES ('$ngaytao', '$tenkh', '$sdt','$loai_dich_vu', '$dich_vu', '$giadv', '$thue', '$tongtien')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../index.php?page=don_dv_spa");
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Không tìm thấy giá dịch vụ cho mã dịch vụ: $dich_vu";
    }

    $conn->close();
}
?>