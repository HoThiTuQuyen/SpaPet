<?php
// trangthai_donhang.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    // Assuming you have a database connection
    include '../admin/services/connect.php';

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Hành động "duyệt đơn hàng"
    if ($_POST["action"] == "duyet_don_hang") {
        $madh = $_POST["madh"];
        $newStatus = "Đã duyệt";

        // Bắt đầu một giao dịch để đảm bảo tính nhất quán
        $conn->begin_transaction();

        try {
            // Thực hiện truy vấn để cập nhật trạng thái đơn hàng
            $updateQuery = "UPDATE donhang SET trangthai = '$newStatus' WHERE madh = '$madh'";
            mysqli_query($conn, $updateQuery);

            // Nếu cập nhật trạng thái thành công, commit giao dịch
            if (mysqli_affected_rows($conn) > 0) {
                $conn->commit();
                echo "Status updated successfully";
            } else {
                // Nếu cập nhật trạng thái không thành công, rollback giao dịch
                $conn->rollback();
                echo "Error updating status";
            }
        } catch (Exception $e) {
            // Nếu có lỗi, rollback giao dịch và xử lý lỗi
            $conn->rollback();
            echo "Error: " . $e->getMessage();
        }
    }

    // Hành động "hủy đơn hàng"
    if ($_POST["action"] == "huy_don_hang") {
        $madh = $_POST["madh"];
        $newStatus = "Đã hủy đơn";

        // Bắt đầu một giao dịch để đảm bảo tính nhất quán
        $conn->begin_transaction();

        try {
            // Thực hiện truy vấn để cập nhật trạng thái đơn hàng
            $updateQuery = "UPDATE donhang SET trangthai = '$newStatus' WHERE madh = '$madh'";
            mysqli_query($conn, $updateQuery);

            // Nếu cập nhật trạng thái thành công, lấy chi tiết đơn hàng
            if (mysqli_affected_rows($conn) > 0) {
                // Fetch order details
                $orderDetailsQuery = "SELECT masp, soluong FROM chitiet_donhang WHERE madh = '$madh'";
                $result = mysqli_query($conn, $orderDetailsQuery);

                // Duyệt qua từng sản phẩm trong chi tiết đơn hàng và cộng lại vào tồn kho
                while ($row = mysqli_fetch_assoc($result)) {
                    $masp = $row['masp'];
                    $soluong = $row['soluong'];

                    // Cộng lại số lượng trong bảng tồn kho
                    $updateStockQuery = "UPDATE tonkho SET soluong = soluong + $soluong WHERE masp = '$masp'";
                    mysqli_query($conn, $updateStockQuery);
                }

                // Commit giao dịch nếu mọi thứ đều thành công
                $conn->commit();
                echo "Status updated and stock quantity updated successfully";
            } else {
                // Nếu cập nhật trạng thái không thành công, rollback giao dịch
                $conn->rollback();
                echo "Error updating status";
            }
        } catch (Exception $e) {
            // Nếu có lỗi, rollback giao dịch và xử lý lỗi
            $conn->rollback();
            echo "Error: " . $e->getMessage();
        }
    }


    mysqli_close($conn);
}
?>