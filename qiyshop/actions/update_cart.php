<?php
include_once('../services/connect.php');

session_start(); // Ensure session is started
$userId = isset($_SESSION['makh']) ? $_SESSION['makh'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $masp = $_POST['masp'];
    $quantity = $_POST['quantity'];

    // Perform the query to update the quantity of the product in the cart
    $stmtUpdate = $conn->prepare("UPDATE giohang SET soluong = ? WHERE masp = ? AND makh = ?");
    $stmtUpdate->bind_param("iii", $quantity, $masp, $userId);
    $stmtUpdate->execute();
    $stmtUpdate->close();

    // Calculate the total price, shipping fee, tax, and grand total
    $totalPrice = 0;
    $products = array(); // Array to store individual product details

    // Retrieve the updated cart information after the update
    $stmt = $conn->prepare("SELECT giohang.*, sanpham.anhsp, sanpham.giaban FROM giohang JOIN sanpham ON giohang.masp = sanpham.masp WHERE giohang.makh = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $totalPrice += $row['giaban'] * $row['soluong'];
        $products[] = [
            'masp' => $row['masp'],
            'giaban' => $row['giaban'],
            'quantity' => $row['soluong'],
        ];
    }

    $shippingFee = ($totalPrice < 500000) ? 35000 : 0;
    $taxRate = 0.08;
    $tax = $totalPrice * $taxRate;
    $grandTotal = $totalPrice + $tax + $shippingFee;

    // Update the total price in the giohang table
    $stmtUpdateTotal = $conn->prepare("UPDATE giohang SET tonggia_sp = ? WHERE makh = ?");
    $stmtUpdateTotal->bind_param("di", $grandTotal, $userId);
    $stmtUpdateTotal->execute();
    $stmtUpdateTotal->close();

    // Return updated data to the website
    $response = [
        'totalPrice' => $totalPrice,
        'shippingFee' => $shippingFee,
        'tax' => $tax,
        'grandTotal' => $grandTotal,
        'products' => $products, // Include individual product details
    ];

    echo json_encode($response);
    
} else {
    // Return an error if it's not a POST request
    header('HTTP/1.1 400 Bad Request');
    echo 'Bad Request';
}
?>