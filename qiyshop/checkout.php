<?php
include_once '../qiyshop/services/connect.php';

require __DIR__."/vendor/autoload.php";

// Assume you have the user's ID stored in the session
session_start();
$userId = $_SESSION['makh'];

// Fetch cart items from the database
$stmt = $conn->prepare("SELECT giohang.*, sanpham.anhsp FROM giohang JOIN sanpham ON giohang.masp = sanpham.masp WHERE giohang.makh = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

// Build line_items array dynamically based on the user's cart
$lineItems = [];
$totalPrice = 0; // Initialize total price

while ($row = $result->fetch_assoc()) {
    $lineItems[] = [
        "quantity" => $row['soluong'],
        "price_data" => [
            "currency" => "VND",
            "unit_amount" => $row['giaban'] * 1000, // Amount should be in cents
            "product_data" => [
                "name" => $row['tensp'],
                "images" => [$row['anhsp']],
            ]
        ]
    ];

    // Calculate total price
    $totalPrice += $row['soluong'] * $row['giaban'];
}

// Calculate shipping fee
$shippingFee = ($totalPrice < 500) ? 35000 : 0;

// Calculate tax (8%)
$taxRate = 0.08;
$tax = $totalPrice * $taxRate;

// Calculate total amount
$totalAmount = $totalPrice + $shippingFee + $tax;

\Stripe\Stripe::setApiKey("sk_test_51OPcbaCis9AMNkTWOlp3KCntP3RvdsKZVeoaLKptsMSZexDrQMlHuotoJQreP1He3LssEAiOz7VxjYf3wMhoQHJf00M4VlpoXj");

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost:3000/qiyshop/checkout-success.php",
    "cancel_url" => "http://localhost/index.php",
    "locale" => "auto",
    "line_items" => $lineItems,
]);

http_response_code(303);
header("Location: " . $checkout_session->url);
?>