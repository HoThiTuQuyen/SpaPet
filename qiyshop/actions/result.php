<?php
// Kết nối đến cơ sở dữ liệu
include_once('../services/connect.php');

if (isset($_GET['search'])) {
    $keyword = '%' . $_GET['search'] . '%';

    // Truy vấn cơ sở dữ liệu để lấy kết quả tìm kiếm
    $query = "SELECT * FROM sanpham WHERE tensp LIKE ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $keyword);
    $stmt->execute();
    $result = $stmt->get_result();
    // Hiển thị kết quả
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Hiển thị thông tin sản phẩm, bạn có thể điều chỉnh theo cấu trúc trang web của bạn
            echo "<div class='col-lg-4 col-md-6 text-center strawberry'>";
            // ... (Hiển thị thông tin sản phẩm tương tự như phần trong vòng lặp while ban đầu)
            echo "</div>";
        }
    } else {
        echo "Không tìm thấy kết quả cho: '$keyword'";
    }

    // Dừng xử lý để tránh hiển thị nội dung trang chính
    exit();
}
?>