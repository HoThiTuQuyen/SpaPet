<?php
include_once('../services/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $masp = $_POST['masp'];
    $soluong_giohang = $_POST['soluong'];

    // Thực hiện truy vấn để kiểm tra số lượng tồn kho
    $stmt_inventory = $conn->prepare("SELECT soluong FROM tonkho WHERE masp = ?");
    $stmt_inventory->bind_param("s", $masp);
    $stmt_inventory->execute();
    $result_inventory = $stmt_inventory->get_result();

    if ($result_inventory->num_rows > 0) {
        $row_inventory = $result_inventory->fetch_assoc();
        $soluong_tonkho = $row_inventory['soluong'];

        // Kiểm tra nếu số lượng trong giỏ hàng vượt quá tồn kho
        if ($soluong_giohang > $soluong_tonkho) {
            echo 'Số lượng sản phẩm còn lại: ' . $soluong_tonkho;
        } else {
            echo 'success';
        }
    } else {
        // Không tìm thấy số lượng tồn kho cho sản phẩm
        echo 'Hết hàng';
    }

    $stmt_inventory->close();
} else {
    // Không phải request POST
    echo 'invalid_request';
}
?>