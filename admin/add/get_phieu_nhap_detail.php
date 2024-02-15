<?php
// Kết nối đến cơ sở dữ liệu
include_once("../services/connect.php");

// Kiểm tra nếu tồn tại mapn trong request
if (isset($_POST['mapn'])) {
    $mapn = $_POST['mapn'];

    // Truy vấn để lấy thông tin chi tiết phiếu nhập
    $query = "SELECT phieunhap.*, tb_admin.name as tenNguoiQuanLy
              FROM phieunhap
              INNER JOIN tb_admin ON phieunhap.id = tb_admin.id
              WHERE mapn = '$mapn'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $phieuNhap = mysqli_fetch_assoc($result);

        // Truy vấn để lấy danh sách sản phẩm trong phiếu nhập
        $querySanPham = "SELECT sanpham.tensp, ct_pn.soluong, ct_pn.gianhap
                         FROM ct_pn
                         INNER JOIN sanpham ON ct_pn.masp = sanpham.masp
                         WHERE ct_pn.mapn = '$mapn'";
        $resultSanPham = mysqli_query($conn, $querySanPham);

        $danhSachSanPham = array();
        while ($rowSanPham = mysqli_fetch_assoc($resultSanPham)) {
            $danhSachSanPham[] = $rowSanPham;
        }

        // Tạo mảng kết quả để trả về dưới dạng JSON
        $response = array(
            'ngayNhap' => $phieuNhap['ngaynhap'],
            'tenNguoiQuanLy' => $phieuNhap['tenNguoiQuanLy'],
            // Thêm các thông tin khác nếu cần
            'danhSachSanPham' => $danhSachSanPham
        );

        // Trả về kết quả dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Xử lý khi có lỗi truy vấn
        echo json_encode(array('error' => 'Có lỗi xảy ra khi truy vấn thông tin chi tiết phiếu nhập.'));
    }
} else {
    // Xử lý khi không có mapn trong request
    echo json_encode(array('error' => 'Thiếu tham số mapn trong yêu cầu.'));
}
?>