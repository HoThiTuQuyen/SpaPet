<?php
include_once '../qiyshop/services/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $_POST['orderId'];

    // Kiểm tra trạng thái đơn hàng
    $checkStatusQuery = "SELECT trangthai FROM donhang WHERE madh = $orderId";
    $result = mysqli_query($conn, $checkStatusQuery);
    $row = mysqli_fetch_assoc($result);

    if ($row['trangthai'] === 'Đã duyệt' || $row['trangthai'] === 'Đã thanh toán') {
        // Trạng thái không hợp lệ, ghi log và gửi phản hồi
        error_log('Cannot cancel an order that has been approved or paid. Order ID: ' . $orderId);
        http_response_code(400); // Bad Request
        echo 'Cannot cancel an order that has been approved or paid.';
        exit();
    }

    // Cập nhật trạng thái đơn hàng thành "Đã hủy đơn"
    $updateStatusQuery = "UPDATE donhang SET trangthai = 'Đã hủy đơn' WHERE madh = $orderId";
    mysqli_query($conn, $updateStatusQuery);

    // Gửi phản hồi về client (nếu cần)
    echo 'Order cancelled successfully';
} else {
    // Trường hợp không phải là POST request
    error_log('Invalid request method.');
    http_response_code(400); // Bad Request
    echo 'Invalid request method';
}
?>