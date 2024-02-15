<?php
session_start();
include_once('../services/connect.php');

if (isset($_POST['masp']) && isset($_POST['soluong'])) {
    $masp = $_POST['masp'];
    $soluong = $_POST['soluong'];

    // Retrieve product details from the database
    $stmt = $conn->prepare("SELECT * FROM sanpham WHERE masp = ?");
    $stmt->bind_param("s", $masp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Product exists, fetch details
        $sanpham = $result->fetch_assoc();

        // Check if the product is already in the cart
        $stmt_check = $conn->prepare("SELECT * FROM giohang WHERE makh = ? AND masp = ?");
        $stmt_check->bind_param("is", $_SESSION['makh'], $masp);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            // Product is already in the cart, update the quantity
            $stmt_update = $conn->prepare("UPDATE giohang SET soluong = soluong + ?, tonggia_sp = giaban * (soluong + ?) WHERE makh = ? AND masp = ?");
            $stmt_update->bind_param("diis", $soluong, $soluong, $_SESSION['makh'], $masp);

            try {
                if ($stmt_update->execute()) {
                    header('Location: /qiyshop/shop.php');
                } else {
                    echo 'Error updating quantity!';
                }
            } catch (mysqli_sql_exception $e) {
                echo 'Error: Lỗi ' . $e->getMessage();
            }

            $stmt_update->close();
        } else {
            // Product is not in the cart, add a new item
            $tonggia = $soluong * $sanpham['giaban'];
            $stmt_insert = $conn->prepare("INSERT INTO giohang (makh, masp, tensp, giaban, soluong, tonggia_sp) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt_insert->bind_param("isssdd", $_SESSION['makh'], $masp, $sanpham['tensp'], $sanpham['giaban'], $soluong, $tonggia);

            try {
                if ($stmt_insert->execute()) {
                   header('Location: /qiyshop/shop.php');
                } else {
                    echo 'Error adding item to the cart!';
                }
            } catch (mysqli_sql_exception $e) {
                header('Location: /qiyshop/login.php');
                // echo 'Error: ' ;
            }

            $stmt_insert->close();
        }

        $stmt_check->close();
    } else {
        // Product not found
        echo 'Product not found!';
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Invalid request!';
}
?>