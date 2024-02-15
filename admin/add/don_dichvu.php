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
$ngaytao = isset($_POST['ngaytao']) ? $_POST['ngaytao'] : '';
$tenkh = isset($_POST['tenkh']) ? $_POST['tenkh'] : '';
$loai_dich_vu = isset($_POST['loai_dich_vu']) ? $_POST['loai_dich_vu'] : '';
$dich_vu = isset($_POST['dich_vu']) ? $_POST['dich_vu'] : array();
$giadv_arr = isset($_POST['giadv']) ? $_POST['giadv'] : array();

// Thêm thông tin đơn dịch vụ vào bảng don_dichvu
$sqlInsertOrder = $conn->prepare("INSERT INTO don_dichvu (ngaytao, tenkh) VALUES (?, ?)");
$sqlInsertOrder->bind_param("ss", $ngaytao, $tenkh);
$sqlInsertOrder->execute();

if ($conn->query($sqlInsertOrder) === TRUE) {
    $lastOrderID = $conn->insert_id; // Lấy ID của đơn dịch vụ vừa được thêm vào

    $totalValue = 0; // Khởi tạo tổng giá trị
    $query_dich_vu = "SELECT * FROM dichvu WHERE maldv = '$selectedLoaiDichVu'";

    foreach ($dich_vu as $index => $selectedDichVu) {
        $giadv = $giadv_arr[$index];
        $totalValue += $giadv; 

        // Thêm vào bảng ct_datlich
        $sqlInsertDetail = "INSERT INTO ct_datlich (maddv, mact_ddv, madv, maldv, giadv) 
                            VALUES ('$lastOrderID', '$loai_dich_vu', '$selectedDichVu', '$loai_dich_vu', '$giadv')";
        $conn->query($sqlInsertDetail);
    }

    // Cập nhật tổng giá trị trong bảng don_dichvu
    $sqlUpdateTotalValue = "UPDATE don_dichvu SET tongdon = '$totalValue' WHERE maddv = '$lastOrderID'";
    $conn->query($sqlUpdateTotalValue);

    echo "Thêm đơn dịch vụ thành công";
    header("Location: ../index.php?page=don_dich_vu");
    exit();
} else {
    echo "Lỗi: " . $sqlInsertOrder . "<br>" . $conn->error;
}

// Đóng kết nối
$conn->close();
?>