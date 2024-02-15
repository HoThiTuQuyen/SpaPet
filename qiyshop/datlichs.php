<?php
// Kết nối đến database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "petshome";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối database thất bại: " . $conn->connect_error);
}

// Truy vấn loại dịch vụ
$query_loai_dich_vu = "SELECT * FROM loaidichvu";
$result_loai_dich_vu = $conn->query($query_loai_dich_vu);

// Truy vấn danh sách khung giờ từ bảng tg_dl


// Truy vấn danh sách ngày từ cơ sở dữ liệu
$currentDate = date('Y-m-d');

// Sửa truy vấn lấy danh sách ngày
$query_ngay = "SELECT * FROM ngay1 WHERE ngay >= '$currentDate' ORDER BY ngay LIMIT 5";
$result_ngay = $conn->query($query_ngay);

// Kiểm tra xem có bất kỳ lỗi nào xuất hiện trong quá trình truy vấn không
if (!$result_ngay) {
    die("Lỗi truy vấn ngày: " . $conn->error);
}
?>


<!-- index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đặt lịch dịch vụ</title>
    <!-- Thêm thẻ meta để hỗ trợ responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Thêm thư viện Bootstrap CSS từ CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
    /* Thêm CSS để tạo bố cục dạng lưới */
    /* Thêm CSS để tô đen khi chọn và màu đỏ khi đã đặt */
    .time-slot.selected {
        background-color: #000;
        color: #fff;
    }

    .time-slot.booked {
        background-color: #ff0000;
        color: #fff;
        cursor: not-allowed;
        /* Disable cursor for booked slots */
    }

    .time-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 10px;
    }

    .time-slot {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
        cursor: pointer;
    }

    /* Thêm CSS để tô đen khi chọn */
    .time-slot.selected {
        background-color: #000;
        color: #fff;
    }
    </style>
    <script>
    function loadDichVu() {
        console.log("Hàm loadDichVu được gọi");
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
    }

    function loadKhungGio() {
        console.log("Hàm loadKhungGio được gọi");
        var ngay = document.getElementById("mangay");
        var timeGrid = document.getElementById("time-grid");

        // Lấy giá trị đã chọn từ ngày
        var selectedNgay = ngay.value;

        // Gửi yêu cầu AJAX để lấy danh sách giờ tương ứng
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Xóa các ô vuông thời gian hiện tại
                timeGrid.innerHTML = '';

                // Tạo các ô vuông thời gian mới
                var khungGio = JSON.parse(xhr.responseText);
                for (var i = 0; i < khungGio.length; i++) {
                    var statusClass = khungGio[i].status === 'DaDat' ? 'booked' : '';
                    var timeSlot = document.createElement('div');
                    timeSlot.className = 'time-slot ' + statusClass;
                    timeSlot.setAttribute('onclick', 'selectTime(this, "' + khungGio[i].time + '", "' + khungGio[i]
                        .status + '")');
                    timeSlot.innerHTML = khungGio[i].time;
                    timeGrid.appendChild(timeSlot);
                }
            }
        };
        // Chắc chắn rằng bạn đã sửa lại tên tham số thành "mangay"
        xhr.open("GET", "actions/get_khunggio.php?mangay=" + selectedNgay, true);
        xhr.send();
    }


    function selectTime(element, time, status) {
        // Bỏ chọn tất cả các khung giờ trước đó
        var timeSlots = document.getElementsByClassName("time-slot");
        for (var i = 0; i < timeSlots.length; i++) {
            timeSlots[i].classList.remove("selected");
        }

        // Nếu slot không phải đã đặt thì mới cho chọn
        if (status !== 'DaDat') {
            // Đặt giá trị thời gian được chọn vào input hidden
            document.getElementById("selected_time").value = time;

            // In ra mã giờ đã chọn để kiểm tra
            console.log("Mã giờ đã chọn: " + time);

            // Tô đen ô vuông thời gian được chọn
            element.classList.add("selected");
        }
    }
    </script>
</head>
<style>
body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}

h2 {
    text-align: center;
    margin-bottom: 30px;
}
</style>

<body>
    <div class="container mt-5">
        <a href="dichvu_cat_tia_long_cho_meo.php" class="btn btn-primary">&larr; Quay lại</a>

        <h2>Đặt lịch dịch vụ</h2>

        <form action="actions/process_booking.php" method="post">
            <div class="form-group">
                <label for="loai_dich_vu">Chọn loại dịch vụ:</label>
                <select class="form-control" name="loai_dich_vu" id="loai_dich_vu" onchange="loadDichVu()">
                    <!-- Load danh sách loại dịch vụ từ database và hiển thị -->
                    <?php
                    while ($row = $result_loai_dich_vu->fetch_assoc()) {
                        echo "<option value='" . $row['maldv'] . "'>" . $row['tenloaidv'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="dich_vu">Chọn dịch vụ:</label>
                <select class="form-control" name="dich_vu" id="dich_vu"></select>
            </div>

            <div class="form-group">
                <label for="mangay">Chọn ngày:</label>
                <select class="form-control" name="mangay" id="mangay" onchange="loadKhungGio()">
                    <?php
                    while ($row_ngay = $result_ngay->fetch_assoc()) {
                        echo "<option value='" . $row_ngay['mangay'] . "'>" . $row_ngay['ngay'] . "</option>";
                    }

                    ?>
                </select>
            </div>
            <style>
            .legend {
                display: flex;
                align-items: center;
            }

            .legend-box {
                width: 20px;
                /* Adjust width as needed */
                height: 20px;
                /* Adjust height as needed */
                margin-right: 5px;
                /* Adjust margin as needed */
            }

            .available {
                background-color: #fff;
                /* Màu trống */
                border-radius: 10px;
                border: 1px solid #000;
            }

            .booked {
                background-color: #ff0000;
                /* Màu đã đặt */
                border-radius: 10px;
                border: 1px solid #000;
            }

            .selected {
                background-color: #000;
                /* Màu đang chọn */
                border-radius: 10px;
                border: 1px solid #fff;
            }

            .legend-label {
                margin-right: 10px;
                /* Adjust margin as needed */
            }
            </style>

            <div class="form-group">
                <label for="thoi_gian">Chọn thời gian:</label>


                <div id="time-grid" class="time-grid">
                    <!-- Các ô vuông thời gian sẽ được cập nhật thông qua AJAX -->
                </div>

                <!-- Dùng input hidden để lưu giữ giá trị thời gian được chọn -->
                <input type="hidden" name="selected_time" id="selected_time">
            </div>

            <div class="legend" style="margin-bottom:20px;">
                <div style="margin-right:10px;font-weight:bold;color:#ff0000;">Ghi chú: </div>
                <div class="legend-box available"></div>
                <div class="legend-label">Giờ trống</div>
                <div class="legend-box booked"></div>
                <div class="legend-label">Đã đặt</div>
                <div class="legend-box selected"></div>
                <div class="legend-label">Đang chọn</div>
            </div>


            <div class="form-group">
                <!-- Thêm ô nhập tên -->
                <label for="ten_khach_hang">Tên khách hàng:</label>
                <input type="text" class="form-control" name="ten_khach_hang" id="ten_khach_hang">
            </div>

            <div class="form-group">
                <!-- Thêm ô nhập số điện thoại -->
                <label for="so_dien_thoai">Số điện thoại:</label>
                <input type="text" class="form-control" name="so_dien_thoai" id="so_dien_thoai">
            </div>

            <button type="submit" class="btn btn-primary">Đặt lịch</button>
        </form>
    </div>

    <?php
    // Đóng kết nối database
    $conn->close();
    ?>

    <!-- Thêm thư viện Bootstrap JS từ CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>