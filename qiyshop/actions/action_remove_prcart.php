<?php
session_start();
include_once('../services/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['masp'])) {
    $masp = $_GET['masp'];

    // Remove the product from the giohang table
    $stmt = $conn->prepare("DELETE FROM giohang WHERE makh = ? AND masp = ?");
    $stmt->bind_param("is", $_SESSION['makh'], $masp);
    $stmt->execute();
    $stmt->close();

    // Redirect back to the cart page
    header('Location: /qiyshop/cart.php');
    exit();
} else {
    // Invalid request
    http_response_code(400);
    exit();
}
?>