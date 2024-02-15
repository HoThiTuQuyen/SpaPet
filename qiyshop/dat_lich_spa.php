<?php
    include_once "header.php";
    include_once("../qiyshop/services/connect.php");

    $query_loai_dich_vu = "SELECT * FROM loaidichvu";
    $result_loai_dich_vu = $conn->query($query_loai_dich_vu);

    $query_gio = "SELECT * FROM khung_gio";
    $result_gio = $conn->query($query_gio);

    // Lấy ngày hiện tại
    $currentDate = new DateTime();
    $currentDateStr = $currentDate->format('Y-m-d');

    // Tính ngày trong tương lai (5 ngày tiếp theo)
    $futureDate = new DateTime();
    $futureDate->modify('+5 days');
    $formattedFutureDate = $futureDate->format('Y-m-d');

    // Truy vấn ngày từ CSDL trong khoảng từ ngày hiện tại đến 5 ngày tiếp theo
    // $query_ngay = "SELECT * FROM ngay1 WHERE ngay >= '$currentDateStr' AND ngay <= '$formattedFutureDate' ORDER BY ngay LIMIT 5";
    // $result_ngay = $conn->query($query_ngay);


    // function countBookings($conn, $ngay, $makg) {
    //     $query_count = "SELECT COUNT(*) as count FROM datlich1 WHERE ngay = '$ngay' AND makg = '$makg'";
    //     $result_count = $conn->query($query_count);
    
    //     if ($result_count) {
    //         $row = $result_count->fetch_assoc();
    //         return $row['count'];
    //     } else {
    //         return 0;
    //     }
    // }


  
   

?>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg dichvu">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <!-- <p>Get 24/7 Support</p> -->
                    <h1>Đặt lịch</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="form-title">
                    <h2>Hãy để chúng tôi chăm sóc thú cưng của bạn!</h2>
                    <p style="color:darkorange;">Vui lòng đặt lịch theo các khung giờ, ngày
                        bên dưới để chúng tôi đem lại trải nghiệm tốt nhất cho bạn.</p>
                </div>
                <div id="form_status"></div>
                <div class="contact-form dl">

                    <form action="actions/process_booking.php" method="post" onsubmit="return validateForm()">
                        <p>
                            <label for="loai_dich_vu">Chọn loại dịch vụ:</label>
                            <label for="dich_vu">Chọn dịch vụ:</label>
                        </p>
                        <p>

                            <select class="" name="loai_dich_vu" id="loai_dich_vu" onchange="loadDichVu()">
                                <?php
                                while ($row = $result_loai_dich_vu->fetch_assoc()) {
                                    echo "<option value='" . $row['maldv'] . "'>" . $row['tenloaidv'] . "</option>";
                                }
                                ?>

                            </select>

                            <select class="" name="dich_vu" id="dich_vu"></select>

                        </p>

                        <?php
                    
                    if (isset($_SESSION['booking_error'])) {
                        echo '<div class="alert alert-danger">' . $_SESSION['booking_error'] . '</div>';

                        // Xóa thông báo lỗi sau khi đã hiển thị
                        unset($_SESSION['booking_error']);
                    }
                    ?>
                        <p>
                            <label for="ngay">Chọn ngày:</label>
                            <label for="dich_vu">Giờ:</label>
                        </p>
                        <p>

                            <input type="date" class="" name="ngay" id="ngay" required
                                min="<?php echo $currentDateStr; ?>" max="<?php echo $formattedFutureDate; ?>">

                            <select class="" name="makg" id="makg">
                                <?php
                                while ($row_gio = $result_gio->fetch_assoc()) {
                                    echo "<option value='" . $row_gio['makg'] . "'>" . $row_gio['gio'] . "</option>";
                                }
                                ?>
                            </select>

                        </p>
                        <p>
                            <label for="ten_khach_hang">Tên khách hàng:</label>
                            <label for="so_dien_thoai">Số điện thoại:</label>
                        </p>
                        <p>

                            <input type="text" class="" name="tenkh" id="tenkh">
                            <input type="text" class="" name="sdt" id="sdt">
                        </p>
                        <p>
                            <label for="email">Email:</label>

                        </p>
                        <p>
                            <input type="text" class="" name="email" id="email">
                        <p style="color:darkorange;">*Ghi chú nếu bạn có yêu cầu khác hoặc lưu ý đặt biệt.</p>
                        <p>
                            <textarea name="ghichu" id="ghichu" cols="30" rows="10" placeholder="Ghi chú"></textarea>
                        </p>

                        <input type="hidden" name="token" value="FsWga4&@f6aw" />
                        <p><input type="submit" value="Đặt lịch">

                        </p>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-form-wrap">
                    <div class="contact-form-box">
                        <h4><i class="fas fa-map"></i> Địa chỉ</h4>
                        <p>236, Đ. Lê Văn Sỹ <br> Phường 1, Tân Bình. <br> Tp.Hồ Chí Minh</p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="far fa-clock"></i> Giờ hoạt động</h4>
                        <p>Thứ hai - Thứ sáu: 9 AM đến 9 PM <br> Thứ bảy: 10 AM to 7 PM </p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="fas fa-address-book"></i> Liên hệ</h4>
                        <p>Phone: +0987 457 151 <br> Email: pethomemart@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end contact form -->

<?php
    include_once 'footer.php';

?>

<script>
function loadDichVu() {
    var loaiDichVu = document.getElementById("loai_dich_vu");
    var dichVu = document.getElementById("dich_vu");

    // Lấy giá trị đã chọn từ loại dịch vụ
    var selectedLoaiDichVu = loaiDichVu.value;

    // Gửi yêu cầu AJAX để lấy danh sách dịch vụ tương ứng
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Cập nhật danh sách dịch vụ
            dichVu.innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "actions/get_dichvu.php?maldv=" + selectedLoaiDichVu, true);
    xhr.send();
};

function validateForm() {
    // Lấy giá trị từ các trường nhập liệu
    var loaiDichVu = document.getElementById("loai_dich_vu").value;
    var dichVu = document.getElementById("dich_vu").value;
    var ngay = document.getElementById("ngay").value;
    var makg = document.getElementById("makg").value;
    var tenkh = document.getElementById("tenkh").value;
    var sdt = document.getElementById("sdt").value;
    var email = document.getElementById("email").value;

    // Kiểm tra xem các trường có bị trống không
    if (loaiDichVu === "" || dichVu === "" || ngay === "" || makg === "" || tenkh === "" || sdt === "" || email ===
        "") {
        // Hiển thị cảnh báo
        alert("Vui lòng điền đầy đủ thông tin!");

        // Ngăn chặn việc gửi biểu mẫu
        return false;
    }

    // Kiểm tra địa chỉ email có đúng định dạng hay không
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        // Hiển thị cảnh báo về địa chỉ email không hợp lệ
        alert("Địa chỉ email không hợp lệ!");

        // Ngăn chặn việc gửi biểu mẫu
        return false;
    }

    // Nếu không có trường nào bị trống và địa chỉ email hợp lệ, tiếp tục gửi biểu mẫu
    return true;
}
</script>