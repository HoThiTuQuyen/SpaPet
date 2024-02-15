<?php
    include_once("../services/connect.php");
    
    $madh = $_GET['madh'];
    
    // Bắt đầu một giao dịch để đảm bảo tính nhất quán
    $conn->begin_transaction();
    
    try {
        // Xóa chi tiết đơn hàng
        $sqlDeleteChiTiet = "DELETE FROM chitiet_donhang WHERE madh='$madh'";
        $resultChiTiet = $conn->query($sqlDeleteChiTiet);
        
        // Kiểm tra nếu xóa chi tiết thành công
        if ($resultChiTiet) {
            // Nếu xóa chi tiết thành công, tiếp tục xóa đơn hàng
            $sqlDeleteDonHang = "DELETE FROM donhang WHERE madh='$madh'";
            $resultDonHang = $conn->query($sqlDeleteDonHang);

            // Kiểm tra nếu xóa đơn hàng thành công
            if ($resultDonHang) {
                // Commit giao dịch nếu mọi thứ đều thành công
                $conn->commit();
            } else {
                // Nếu xóa đơn hàng không thành công, rollback giao dịch
                $conn->rollback();
            }
        } else {
            // Nếu xóa chi tiết không thành công, rollback giao dịch
            $conn->rollback();
        }
    } catch (Exception $e) {
        // Nếu có bất kỳ lỗi nào xảy ra, rollback giao dịch và xử lý lỗi
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
    
    // Chuyển hướng sau khi hoàn thành
    header("Location: ../index.php?page=donhang");
?>