<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê đơn hàng</title>

    <!-- Thêm Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Thêm thư viện Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="container mt-4">
                        <!-- Thống kê theo ngày -->
                        <form method="post" action="" class="col-md-3">
                            <div class="form-group">
                                <label for="selected_date">Chọn ngày:</label>
                                <input type="date" name="selected_date" id="selected_date" class="form-control"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Thống kê theo ngày</button>
                        </form>

                        <!-- Khung hiển thị ngày được chọn -->
                        <div class="mt-2">
                            <strong>Ngày được chọn:</strong>
                            <span id="selected_date_display"></span>
                        </div>

                        <?php
                        
                        include_once("./services/connect.php");

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            // Lấy ngày được chọn từ form
                            $selectedDate = $_POST['selected_date'];

                            // Validate và chuyển đổi định dạng ngày nếu cần
                            // ...

                            // Truy vấn đơn hàng cho ngày được chọn
                            $query = "SELECT * FROM donhang WHERE DATE(ngaytao) = '$selectedDate'";
                            $result = $conn->query($query);

                            // Tính toán tổng giá nhập, tổng giá bán và chênh lệch
                            $totalGiaNhap = 0;
                            $totalGiaBan = 0;
                            $totalChenhLechGia = 0;

                            // Tổng giá nhập, tổng giá bán, và chênh lệch cho đơn hàng "Đã duyệt" + "Đã thanh toán"
                            $totalGiaNhap_DaDuyet_ThanhToan = 0;
                            $totalGiaBan_DaDuyet_ThanhToan = 0;

                            // Tổng giá nhập, tổng giá bán, và chênh lệch cho đơn hàng "Đã hủy đơn"
                            $totalGiaNhap_DaHuyDon = 0;
                            $totalGiaBan_DaHuyDon = 0;

                            echo "<h4 class='mt-4' >Dữ liệu đơn hàng ngày $selectedDate:</h4>";
                            // echo "<table class='table table-bordered table-striped'>
                            //         <thead>
                            //             <tr>
                            //                 <th>Mã đơn hàng</th>
                            //                 <th>Ngày tạo</th>
                            //                 <th>Thành tiền</th>
                            //                 <th>Trạng thái</th>
                            //                 <th>Giá nhập tổng đơn</th>
                            //                 <th>Giá bán tổng đơn</th>
                            //                 <th>Lợi nhuận</th>
                            //             </tr>
                            //         </thead>
                            //         <tbody>";

                            while ($row = $result->fetch_assoc()) {
                                $tonggia_nhap = $row['tonggia_nhap'];
                                $tonggia = $row['tonggia'];
                                $chenhlechgia = $tonggia - $tonggia_nhap;

                                // Kiểm tra trạng thái của đơn hàng
                                if ($row['trangthai'] == 'Đã duyệt' || $row['trangthai'] == 'Đã thanh toán') {
                                    $totalGiaNhap_DaDuyet_ThanhToan += $tonggia_nhap;
                                    $totalGiaBan_DaDuyet_ThanhToan += $tonggia;
                                } elseif ($row['trangthai'] == 'Đã hủy đơn') {
                                    $totalGiaNhap_DaHuyDon += $tonggia_nhap;
                                    $totalGiaBan_DaHuyDon += $tonggia;
                                }

                                $totalGiaNhap += $tonggia_nhap;
                                $totalGiaBan += $tonggia;
                                $totalChenhLechGia += $chenhlechgia;

                                // echo "<tr>
                                //         <td>{$row['madh']}</td>
                                //         <td>{$row['ngaytao']}</td>
                                //         <td>{$row['thanhtien']}</td>
                                //         <td>{$row['trangthai']}</td>
                                //         <td>{$row['tonggia_nhap']}</td>
                                //         <td>{$row['tonggia']}</td>
                                //         <td>{$chenhlechgia}.000</td>
                                //     </tr>";
                            }

                            // echo "</tbody></table>";

                            // Biểu đồ 1
                            echo "<div class='row'>";
                            echo "<div class='col-md-6'>";
                            echo "<canvas id='myChart1' width='400' height='200'></canvas>";
                            echo "</div>";

                            // Biểu đồ 2
                            echo "<div class='col-md-6'>";
                            echo "<canvas id='myChart2' width='400' height='200'></canvas>";
                            echo "</div>";

                            echo "<br></br>";

                            echo "<script>
                                var max1 = Math.max($totalGiaNhap_DaDuyet_ThanhToan, $totalGiaBan_DaDuyet_ThanhToan, $totalGiaBan_DaDuyet_ThanhToan - $totalGiaNhap_DaDuyet_ThanhToan);
                                var max2 = Math.max($totalGiaNhap_DaDuyet_ThanhToan, $totalGiaBan_DaDuyet_ThanhToan, $totalGiaBan_DaDuyet_ThanhToan - $totalGiaNhap_DaDuyet_ThanhToan);
                                var maxValue = Math.max(max1, max2);

                                var ctx1 = document.getElementById('myChart1').getContext('2d');
                                var myChart1 = new Chart(ctx1, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Tổng giá nhập', 'Tổng giá bán', 'Lợi nhuận'],
                                        datasets: [{
                                            label: 'Dữ liệu đơn hàng (Đã duyệt + Đã thanh toán)',
                                            data: [$totalGiaNhap_DaDuyet_ThanhToan, $totalGiaBan_DaDuyet_ThanhToan, $totalGiaBan_DaDuyet_ThanhToan - $totalGiaNhap_DaDuyet_ThanhToan],
                                            backgroundColor: [
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 206, 86, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(255, 206, 86, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                max: maxValue
                                            }
                                        }
                                    }
                                });
                            </script>";

                        echo "<script>
                                var ctx2 = document.getElementById('myChart2').getContext('2d');
                                var myChart2 = new Chart(ctx2, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Tổng giá nhập', 'Tổng giá bán', 'Lợi nhuận'],
                                        datasets: [{
                                            label: 'Dữ liệu đơn hàng (Đã hủy đơn)',
                                            data: [$totalGiaNhap_DaHuyDon, $totalGiaBan_DaHuyDon, $totalGiaBan_DaHuyDon - $totalGiaNhap_DaHuyDon],
                                            backgroundColor: [
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 206, 86, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(255, 206, 86, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                max: maxValue
                                            }
                                        }
                                    }
                                });
                            </script>";

                            // Tổng hợp cho tất cả các đơn hàng
                            // echo "<h4 class='mt-4'>Tổng hợp:</h4>";
                            // echo "<div>Tổng giá nhập: $totalGiaNhap</div>";
                            // echo "<div>Tổng giá bán: $totalGiaBan</div>";
                            // echo "<div>Chênh lệch giá: $totalChenhLechGia</div>";

                            echo "</div>";
                            echo "<br></br>";

                        } else {
                            echo "<p class='mt-4'>Vui lòng chọn ngày để thống kê.</p>";
                        }
                        ?>

                        <!-- Thống kê theo tháng -->
                        <form method="post" action="" class="col-md-3 mt-4">
                            <div class="form-group">
                                <label for="selected_month">Chọn tháng:</label>
                                <input type="month" name="selected_month" id="selected_month" class="form-control"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Thống kê theo tháng</button>
                        </form>

                        <!-- Khung hiển thị tháng được chọn -->
                        <div class="mt-2">
                            <strong>Tháng được chọn:</strong>
                            <span id="selected_month_display"></span>
                        </div>

                        <?php
                        include_once("./services/connect.php");

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            // Lấy tháng được chọn từ form
                            $selectedMonth = $_POST['selected_month'];

                            // Trích xuất năm và tháng từ chuỗi YYYY-MM
                            list($year, $month) = explode("-", $selectedMonth);

                            // Truy vấn đơn hàng cho tháng được chọn
                            $query = "SELECT * FROM donhang WHERE YEAR(ngaytao) = '$year' AND MONTH(ngaytao) = '$month'";
                            $result = $conn->query($query);

                            // Tính toán tổng giá nhập, tổng giá bán và chênh lệch
                            $totalGiaNhap = 0;
                            $totalGiaBan = 0;
                            $totalChenhLechGia = 0;

                            // Tổng giá nhập, tổng giá bán, và chênh lệch cho đơn hàng "Đã duyệt" + "Đã thanh toán"
                            $totalGiaNhap_DaDuyet_ThanhToan = 0;
                            $totalGiaBan_DaDuyet_ThanhToan = 0;

                            // Tổng giá nhập, tổng giá bán, và chênh lệch cho đơn hàng "Đã hủy đơn"
                            $totalGiaNhap_DaHuyDon = 0;
                            $totalGiaBan_DaHuyDon = 0;

                            echo "<h4 class='mt-4' >Danh sách đơn hàng cho tháng $selectedMonth:</h4>";
                            echo "<table class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày tạo</th>
                                            <th>Thành tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Giá nhập tổng đơn</th>
                                            <th>Giá bán tổng đơn</th>
                                            <th>Lợi nhuận</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                            while ($row = $result->fetch_assoc()) {
                                $tonggia_nhapt = $row['tonggia_nhap'];
                                $tonggiat = $row['tonggia'];
                                $chenhlechgiat = $tonggiat - $tonggia_nhapt;

                                // Kiểm tra trạng thái của đơn hàng
                                if ($row['trangthai'] == 'Đã duyệt' || $row['trangthai'] == 'Đã thanh toán') {
                                    $totalGiaNhap_DaDuyet_ThanhToan += $tonggia_nhapt;
                                    $totalGiaBan_DaDuyet_ThanhToan += $tonggiat;
                                } elseif ($row['trangthai'] == 'Đã hủy đơn') {
                                    $totalGiaNhap_DaHuyDon += $tonggia_nhapt;
                                    $totalGiaBan_DaHuyDon += $tonggiat;
                                }

                                $totalGiaNhapt += $tonggia_nhapt;
                                $totalGiaBant += $tonggiat;
                                $totalChenhLechGiat += $chenhlechgiat;

                                echo "<tr>
                                        <td>{$row['madh']}</td>
                                        <td>{$row['ngaytao']}</td>
                                        <td>{$row['thanhtien']}</td>
                                        <td>{$row['trangthai']}</td>
                                        <td>{$row['tonggia_nhap']}</td>
                                        <td>{$row['tonggia']}</td>
                                        <td>{$chenhlechgiat}.000</td>
                                    </tr>";
                            }

                            echo "</tbody></table>";

                            // Biểu đồ 1
                            echo "<div class='row'>";
                            echo "<div class='col-md-6'>";
                            echo "<canvas id='myChart1' width='400' height='200'></canvas>";
                            echo "</div>";

                            // Biểu đồ 2
                            echo "<div class='col-md-6'>";
                            echo "<canvas id='myChart2' width='400' height='200'></canvas>";
                            echo "</div>";

                            echo "<br></br>";

                            echo "<script>
                                var max1 = Math.max($totalGiaNhap_DaDuyet_ThanhToant, $totalGiaBan_DaDuyet_ThanhToant, $totalGiaBan_DaDuyet_ThanhToant - $totalGiaNhap_DaDuyet_ThanhToant);
                                var max2 = Math.max($totalGiaNhap_DaHuyDont, $totalGiaBan_DaHuyDont, $totalGiaBan_DaHuyDont - $totalGiaNhap_DaHuyDont);
                                var maxValue = Math.max(max1, max2);

                                var ctx1 = document.getElementById('myChart1').getContext('2d');
                                var myChart1 = new Chart(ctx1, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Tổng giá nhập', 'Tổng giá bán', 'Lợi nhuận'],
                                        datasets: [{
                                            label: 'Dữ liệu đơn hàng (Đã duyệt + Đã thanh toán)',
                                            data: [$totalGiaNhap_DaDuyet_ThanhToant, $totalGiaBan_DaDuyet_ThanhToant, $totalGiaBan_DaDuyet_ThanhToant - $totalGiaNhap_DaDuyet_ThanhToant],
                                            backgroundColor: [
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 206, 86, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(255, 206, 86, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                max: maxValue
                                            }
                                        }
                                    }
                                });
                            </script>";

                            echo "<script>
                                var ctx2 = document.getElementById('myChart2').getContext('2d');
                                var myChart2 = new Chart(ctx2, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Tổng giá nhập', 'Tổng giá bán', 'Lợi nhuận'],
                                        datasets: [{
                                            label: 'Dữ liệu đơn hàng (Đã hủy đơn)',
                                            data: [$totalGiaNhap_DaHuyDon, $totalGiaBan_DaHuyDon, $totalGiaBan_DaHuyDon - $totalGiaNhap_DaHuyDon],
                                            backgroundColor: [
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 206, 86, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(255, 206, 86, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                max: maxValue
                                            }
                                        }
                                    }
                                });
                            </script>";

                            echo "</div>";
                            echo "<br></br>";

                        } else {
                            echo "<p class='mt-4'>Vui lòng chọn tháng để thống kê.</p>";
                        }
                        ?>

                        <!-- Include your daily and monthly statistics code here -->

                    </div>

                    <!-- Thêm Bootstrap JavaScript và jQuery (nếu chưa có) -->
                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

                    <script>
                    // Lắng nghe sự kiện thay đổi giá trị của ngày
                    document.getElementById('selected_date').addEventListener('change', function() {
                        // Lấy giá trị ngày
                        var selectedDate = this.value;

                        // Hiển thị ngày được chọn
                        document.getElementById('selected_date_display').innerHTML = "Ngày được chọn: " +
                            selectedDate;
                    });

                    // Lắng nghe sự kiện thay đổi giá trị của tháng
                    document.getElementById('selected_month').addEventListener('change', function() {
                        // Lấy giá trị tháng
                        var selectedMonth = this.value;

                        // Hiển thị tháng được chọn
                        document.getElementById('selected_month_display').innerHTML = "Tháng được chọn: " +
                            selectedMonth;
                    });
                    </script>

                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </section>
</body>

</html>