<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petshome";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

if (isset($_GET['lohang'])) {
    $maLoHang = $_GET['lohang'];

    // Truy vấn sản phẩm thuộc mã lô hàng đã chọn
    $sqlProducts = "SELECT sanpham.masp, sanpham.tensp, sanpham.giaban FROM sanpham 
                    INNER JOIN tonkho ON sanpham.masp = tonkho.masp 
                    WHERE tonkho.lohang = '$maLoHang'";
    $resultProducts = $conn->query($sqlProducts);

    if ($resultProducts->num_rows > 0) {
        while ($rowProduct = $resultProducts->fetch_assoc()) {
            echo "<option value='" . $rowProduct['masp'] . "' data-giaban='" . $rowProduct['giaban'] . "'>" . $rowProduct['tensp'] . "</option>";
        }
    } else {
        echo "<option value='' data-giaban=''>Không có sản phẩm</option>";
    }
} else {
    echo "<option value='' data-giaban=''>Không có mã lô hàng được chọn</option>";
}

$conn->close();
?>