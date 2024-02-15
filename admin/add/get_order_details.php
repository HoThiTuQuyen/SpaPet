<!-- admin/get_order_details.php -->
<?php
// services/connect.php
include_once("../services/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $madh = $_POST['madh'];

    $stmt = $conn->prepare("SELECT c.*, s.tensp, s.giaban
                            FROM chitiet_donhang c
                            JOIN sanpham s ON c.masp = s.masp
                            WHERE c.madh = ?");
    $stmt->bind_param("i", $madh);
    $stmt->execute();
    $result = $stmt->get_result();

    $currentOrderId = null;
    $totalPrice = 0;

    while ($mhs = $result->fetch_assoc()) {
        if ($mhs['madh'] != $currentOrderId) {
            echo '<p>' . '<b>Mã đơn hàng</b>' . ': ' . $mhs['madh'] . '</p>';
            $currentOrderId = $mhs['madh'];
        }

        echo '<p>' . '<b>Mã sản phẩm</b>' . ': ' . $mhs['masp'] . ' - ' . $mhs['tensp'] . '</br>'
            . ' <b>Giá</b>' . ': ' . $mhs['giaban'] .' x '. $mhs['soluong']. ' = '. $mhs['tonggia']  . '</br>' . '</p>';

        $totalPrice += $mhs['tonggia'];
    }

    echo '<p>' . '<b>Tổng Giá</b>' . ': ' . $totalPrice . '.000'. '</p>';

    $stmt->close();
    $conn->close();
}
?>