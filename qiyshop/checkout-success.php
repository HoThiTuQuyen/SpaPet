<?php
include_once '../qiyshop/services/connect.php';

require __DIR__."/vendor/autoload.php";

session_start();
$userId = $_SESSION['makh'];

// Fetch cart items from the database
$stmt = $conn->prepare("SELECT giohang.*, sanpham.anhsp, sanpham.gianhap FROM giohang JOIN sanpham ON giohang.masp = sanpham.masp WHERE giohang.makh = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

// Tính toán tổng giá trị và tổng giá nhập của đơn hàng
$totalPrice = 0;
$totalCost = 0;
while ($row = $result->fetch_assoc()) {
    $totalPrice += $row['tonggia_sp'];
    $totalCost += $row['soluong'] * $row['gianhap']; // Tính tổng giá nhập
}

// Tính toán phí giao hàng
$shippingFee = ($totalPrice < 500) ? 35 : 0;

// Tính toán thuế (giả sử tỷ lệ thuế là 8%)
$taxRate = 0.08;
$tax = $totalPrice * $taxRate;
    
// Tính toán tổng số tiền
$totalAmount = $totalPrice + $shippingFee + $tax;

$paymentMethod = 'Chuyển khoản';

// Insert order
$insertOrder = $conn->prepare("INSERT INTO donhang (makh, ngaytao, tonggia_nhap, tonggia, phigiaohang, thue, thanhtien, trangthai, hinhthuc) VALUES (?, NOW(), ?,?, ?, ?, ?, 'Chưa thanh toán', ?)");
$insertOrder->bind_param("iddddds", $userId, $totalCost, $totalPrice, $shippingFee, $tax, $totalAmount, $paymentMethod);
$insertOrder->execute();
$orderId = $insertOrder->insert_id;
$insertOrder->close();

// Move the result pointer back to the beginning for the next loop
$result->data_seek(0);

// Insert individual items into `chitiet_donhang` table
while ($row = $result->fetch_assoc()) {
    $tonggia_nhap = $row['soluong'] * $row['gianhap']; // Tính tổng giá nhập cho từng sản phẩm
    $insertOrderDetail = $conn->prepare("INSERT INTO chitiet_donhang (madh, masp, soluong, gia, tonggia,gianhap, tonggia_nhap) VALUES (?, ?, ?,?, ?, ?, ?)");
    $insertOrderDetail->bind_param("isidddd", $orderId, $row['masp'], $row['soluong'], $row['giaban'], $row['tonggia_sp'],$row['gianhap'], $tonggia_nhap);
    $insertOrderDetail->execute();
    $insertOrderDetail->close();
}

// Clear user's cart
$clearCart = $conn->prepare("DELETE FROM giohang WHERE makh = ?");
$clearCart->bind_param("i", $userId);
$clearCart->execute();
$clearCart->close();

// Update the trangthai column in the donhang table
$updateOrderStatus = $conn->prepare("UPDATE donhang SET trangthai = 'Đã thanh toán' WHERE madh = ?");
$updateOrderStatus->bind_param("i", $orderId);
$updateOrderStatus->execute();
$updateOrderStatus->close();

$result->data_seek(0);
while ($row = $result->fetch_assoc()) {
    $masp = $row['masp'];
    $soluong = $row['soluong'];

    // Cập nhật số lượng trong bảng tồn kho
    $updateStockQuery = "UPDATE tonkho SET soluong = soluong - $soluong WHERE masp = '$masp'";
    mysqli_query($conn, $updateStockQuery);
}

// Redirect to a thank-you page or display a success message
header("Location: http://localhost:3000/qiyshop/thank-you.php");
exit;
?>