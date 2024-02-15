<?php
// get_order_details.php

include_once '../qiyshop/services/connect.php';

// Assuming you have a column named 'mactdh' in your chitiet_donhang table
$madh = $_POST['madh'];

// Fetch order details based on madh
$stmt = $conn->prepare("SELECT *, (gia * soluong) AS tonggia, (gianhap * soluong) AS tonggia_nhap FROM chitiet_donhang WHERE madh = ?");
$stmt->bind_param("i", $madh);
$stmt->execute();
$result = $stmt->get_result();

// Initialize variables
$currentOrderId = null;
$totalPrice = 0;
$totalCost = 0;

// Output the details in HTML format
while ($row = $result->fetch_assoc()) {
    // Check if the order ID has changed
    if ($row['madh'] != $currentOrderId) {
        // If it has changed, display order information
        echo '<p>' . '<b>Mã đơn hàng</b>' . ': ' . $row['madh'] . '</p>';
        $currentOrderId = $row['madh'];
    }

    // Fetch product information based on masp
    $productStmt = $conn->prepare("SELECT * FROM sanpham WHERE masp = ?");
    $productStmt->bind_param("i", $row['masp']);
    $productStmt->execute();
    $productResult = $productStmt->get_result();
    $product = $productResult->fetch_assoc();

    // Display product information
    echo '<p>' . '<b>Mã sản phẩm</b>' . ': ' . $row['masp'] . ' - ' . $product['tensp'] . '</br>' . ' <b>Giá</b>' . ': ' . $row['gia'] .' x '.$row['soluong']. ' = '. $row['tonggia']  . '</br>' . '</p';

    // Add the price and cost to the total
    $totalPrice += $row['tonggia'];
    // $totalCost += $row['tonggia_nhap'];

    // Close the product statement
    $productStmt->close();
}

// Display the total price and cost
echo '<p>' . '<b>Tổng Giá</b>' . ': ' . $totalPrice . '.000'. '</p>';
// echo '<p>' . '<b>Tổng Giá Nhập</b>' . ': ' . $totalCost . '.000'. '</p>';

// Close the database connection
$stmt->close();
$conn->close();
?>