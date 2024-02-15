<?php
session_start();
include_once('../services/connect.php');

// Assuming you have a user ID stored in the session
$userId = $_SESSION['makh'];

// Fetch cart items from the database
$stmt = $conn->prepare("SELECT giohang.*, sanpham.anhsp, sanpham.gianhap, tonkho.soluong AS tonkho_soluong FROM giohang 
                        JOIN sanpham ON giohang.masp = sanpham.masp 
                        JOIN tonkho ON giohang.masp = tonkho.masp
                        WHERE giohang.makh = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Redirect back to the cart page with an error message
    $_SESSION['error_message'] = "Không thể đặt hàng vì giỏ hàng đang trống. Vui lòng thêm sản phẩm vào giỏ hàng.";
    header('Location: ../cart.php');
    exit();
}

// Calculate total amount and total cost
$totalPrice = 0;
$totalCost = 0;
while ($row = $result->fetch_assoc()) {
    $totalPrice += $row['tonggia_sp'];
    $totalCost += $row['soluong'] * $row['gianhap']; // Calculate total cost
}

// Calculate shipping fee, tax, and total amount
$shippingFee = ($totalPrice < 500) ? 35 : 0;
$taxRate = 0.08;
$tax = $totalPrice * $taxRate;
$totalAmount = $totalPrice + $shippingFee + $tax;

$paymentMethod = isset($_POST['paymentMethod']) ? $_POST['paymentMethod'] : 'Tiền mặt';
// Insert into invoices table
$stmt_invoice = $conn->prepare("INSERT INTO donhang (makh,tonggia_nhap, tonggia, phigiaohang, thue, thanhtien, hinhthuc) VALUES (?,?, ?, ?, ?, ?, ?)");
$stmt_invoice->bind_param("iddddds", $userId, $totalCost, $totalPrice, $shippingFee, $tax, $totalAmount, $paymentMethod);
$stmt_invoice->execute();
$invoiceId = $stmt_invoice->insert_id;

// Move cart items to invoice_items table and update tonkho
$stmt_move_to_invoice = $conn->prepare("INSERT INTO chitiet_donhang (madh, masp, soluong, gia, tonggia,gianhap, tonggia_nhap) VALUES (?, ?, ?,?, ?, ?, ?)");

$result->data_seek(0);
while ($row = $result->fetch_assoc()) {
    $tonggia_nhap = $row['soluong'] * $row['gianhap']; // Calculate total cost for each item
    $stmt_move_to_invoice->bind_param("isidddd", $invoiceId, $row['masp'], $row['soluong'], $row['giaban'], $row['tonggia_sp'], $row['gianhap'], $tonggia_nhap);
    $stmt_move_to_invoice->execute();

    // Update soluong in the tonkho table
    $newStockQuantity = $row['tonkho_soluong'] - $row['soluong'];
    $stmt_update_stock = $conn->prepare("UPDATE tonkho SET soluong = ? WHERE masp = ?");
    $stmt_update_stock->bind_param("ii", $newStockQuantity, $row['masp']);
    $stmt_update_stock->execute();
}

// Clear the cart for the current user
$stmt_clear_cart = $conn->prepare("DELETE FROM giohang WHERE makh = ?");
$stmt_clear_cart->bind_param("i", $userId);
$stmt_clear_cart->execute();

$stmt_invoice->close();
$stmt_move_to_invoice->close();
$stmt_clear_cart->close();

// Redirect to the invoice page
header('Location: ../quanlydonhang.php');
?>