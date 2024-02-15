<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petshome";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Dữ liệu từ biểu mẫu nhập
$ngayXuat = $_POST['ngayXuat'];
$maNguoiXuat = $_POST['maNguoiXuat'];
$maLoHang = $_POST['maLoHang']; // Lấy giá trị mã lô hàng
$maKhachHang = $_POST['maKhachHang']; // Lấy giá trị mã khách hàng

// Thêm thông tin phiếu xuất vào bảng Phiếu xuất
$sqlInsertIssue = "INSERT INTO phieuxuat (ngayxuat, id, lohang, makh) VALUES ('$ngayXuat', '$maNguoiXuat', '$maLoHang', '$maKhachHang')";
if ($conn->query($sqlInsertIssue) === TRUE) {
    $lastIssueID = $conn->insert_id; // Lấy ID của phiếu xuất vừa được thêm vào

    // Lặp qua danh sách sản phẩm và thêm thông tin chi tiết phiếu xuất
    for ($i = 1; $i < count($_POST['sanPham']); $i++) {
        $sanPham = $_POST['sanPham'][$i];
        $soLuong = $_POST['soLuong'][$i];

        // Kiểm tra số lượng tồn kho của sản phẩm trong lô hàng
        $sqlCheckStock = "SELECT soluong FROM tonkho WHERE masp = '$sanPham' AND lohang = '$maLoHang'";
        $resultCheckStock = $conn->query($sqlCheckStock);

        if ($resultCheckStock->num_rows > 0) {
            $row = $resultCheckStock->fetch_assoc();
            $soLuongTonKho = $row['soluong'];

            if ($soLuongTonKho >= $soLuong) {
                // Trừ số lượng sản phẩm từ bảng tonkho
               // Trừ số lượng sản phẩm từ bảng tonkho
                $sqlUpdateTonKho = "UPDATE tonkho SET soluong = soluong - '$soLuong' WHERE masp = '$sanPham' AND lohang = '$maLoHang'";
                $conn->query($sqlUpdateTonKho);

                // Thêm thông tin chi tiết phiếu xuất vào bảng Chi tiết phiếu xuất
       // Thêm thông tin chi tiết phiếu xuất vào bảng Chi tiết phiếu xuất
                $sqlInsertDetail = "INSERT INTO ct_phieuxuat (mapx, masp, soluong, giaban, tongtien_sp) VALUES ('$lastIssueID', '$sanPham', '$soLuong', (SELECT giaban FROM sanpham WHERE masp = '$sanPham'), '$soLuong' * (SELECT giaban FROM sanpham WHERE masp = '$sanPham'))";
                $conn->query($sqlInsertDetail);

                // Tính tổng giá trị đơn và tổng số lượng xuất
                $sqlCalculateTotal = "SELECT SUM(tongtien_sp) AS total, SUM(soluong) AS quantity FROM ct_phieuxuat WHERE mapx = '$lastIssueID'";
                $resultTotal = $conn->query($sqlCalculateTotal);

                if ($resultTotal->num_rows > 0) {
                    $rowTotal = $resultTotal->fetch_assoc();
                    $totalValue = $rowTotal['total'];
                    $quantity = $rowTotal['quantity'];

                    // Cập nhật tổng giá trị đơn và tổng số lượng xuất vào bảng phieuxuat
                    $sqlUpdateTotal = "UPDATE phieuxuat SET giatri_tong = '$totalValue', sl_xuat = '$quantity' WHERE mapx = '$lastIssueID'";
                    $conn->query($sqlUpdateTotal);
                }


            } else {
                echo "Lỗi: Không đủ số lượng sản phẩm trong lô hàng";
                exit;
            }
        } else {
            echo "Lỗi: Sản phẩm không có trong lô hàng";
            exit;
        }
    }

    // Kiểm tra và xóa sản phẩm khỏi tồn kho nếu đã xuất hết
    $sqlCheckEmptyStock = "SELECT COUNT(*) AS count FROM tonkho WHERE lohang = '$maLoHang' AND soluong <= 0";
    $resultCheckEmptyStock = $conn->query($sqlCheckEmptyStock);

    if ($resultCheckEmptyStock->num_rows > 0) {
        $row = $resultCheckEmptyStock->fetch_assoc();
        $count = $row['count'];

        if ($count > 0) {
            // Xóa sản phẩm khỏi tồn kho nếu đã xuất hết
            $sqlDeleteStock = "DELETE FROM tonkho WHERE lohang = '$maLoHang' AND soluong <= 0";
            $conn->query($sqlDeleteStock);
        }
    }

    echo "";
    header("Location: ../index.php?page=phieu_xuat_kho");
} else {
    echo "Lỗi: " . $sqlInsertIssue . "<br>" . $conn->error;
}

// Đóng kết nối
$conn->close();
?>