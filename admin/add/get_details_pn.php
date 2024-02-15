<?php
// services/connect.php
include_once("../services/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mapn'])) {
    $mapn = $_POST['mapn'];

    $stmt = $conn->prepare("SELECT c.*, s.masp, s.gianhap, s.tensp, p.mapn
    FROM ct_phieunhap c
    JOIN sanpham s ON c.masp = s.masp
    JOIN phieunhap p ON c.mapn = p.mapn
    WHERE p.mapn = ?");

    $stmt->bind_param("i", $mapn);
    $stmt->execute();
    $result = $stmt->get_result();

    $currentOrderId = null;
    $totalPrice = 0;

    while ($mhs = $result->fetch_assoc()) {
        if ($mhs['mapn'] != $currentOrderId) {
            echo '<p>' . '<b>Mã phiếu nhập</b>' . ': ' . $mhs['mapn'] . '</p>';
            $currentOrderId = $mhs['mapn'];
        }

        echo '<p>' . '<b>Mã sản phẩm</b>' . ': ' . $mhs['masp'] . ' - ' . $mhs['tensp'] . '</br>'
            . ' <b>Giá</b>' . ': ' . $mhs['gianhap'] .' x '. $mhs['soluong']. ' = '. $mhs['tongtien_sp']  . '</br>' . '</p>';

        $totalPrice += $mhs['tongtien_sp'];
    }

    echo '<p>' . '<b>Tổng Giá</b>' . ': ' . $totalPrice . '.000'. '</p>';

    $stmt->close();
    $conn->close();
}
?>