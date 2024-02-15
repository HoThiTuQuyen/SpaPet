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
                        <form method="post" action="" class="col-md-6">
                            <div class="form-group">
                                <label for="start_date">Từ ngày:</label>
                                <input type="date" name="start_date" id="start_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="end_date">Đến ngày:</label>
                                <input type="date" name="end_date" id="end_date" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Thống kê</button>
                        </form>

                        <?php
                        include_once("./services/connect.php");

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            // Lấy ngày bắt đầu và kết thúc từ form
                            $startDate = $_POST['start_date'];
                            $endDate = $_POST['end_date'];

                            // Validate và chuyển đổi định dạng ngày nếu cần
                            // ...

                            // Truy vấn đơn hàng cho ngày được chọn
                            $query = "SELECT * FROM donhang WHERE DATE(ngaytao) BETWEEN '$startDate' AND '$endDate'";
                            $result = $conn->query($query);


                            
                            $totalGiaNhap = 0;
                            $totalGiaBan = 0;
                            $totalChenhLechGia = 0;

                            $totalGiaNhap_DaDuyet_ThanhToan = 0;
                            $totalGiaBan_DaDuyet_ThanhToan = 0;

                            $totalGiaNhap_DaHuyDon = 0;
                            $totalGiaBan_DaHuyDon = 0;

                            echo "<h4 class='mt-4' >Dữ liệu đơn hàng ngày $startDate đến $endDate:</h4>";
                            
                            while ($row = $result->fetch_assoc()) {
                                $tonggia_nhap = $row['tonggia_nhap'];
                                $tonggia = $row['tonggia'];
                                $chenhlechgia = $tonggia - $tonggia_nhap;

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

                               
                            }

                         
                            echo "<div class='row'>";
                            echo "<div class='col-md-6'>";
                            echo "<canvas id='myChart1' width='400' height='200'></canvas>";
                            echo "</div>";

                            
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

                       
                            echo "</div>";
                            echo "<br></br>";


                            $queryDichVu = "SELECT * FROM don_dv_spa WHERE DATE(ngaytao) BETWEEN '$startDate' AND '$endDate'";
                            $resultDichVu = $conn->query($queryDichVu);



                            

                        } else {
                            echo "<p class='mt-4'>Vui lòng chọn ngày để thống kê.</p>";
                        }
                        ?>
                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <canvas id="myChart3" width="800" height="200"></canvas>
                        </div>

                        <!-- ... (existing charts) -->
                    </div>

                    <!-- Thêm Bootstrap JavaScript và jQuery (nếu chưa có) -->
                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


                    <script>
                    // Lắng nghe sự kiện thay đổi giá trị của ngày
                    document.getElementById('start_date').addEventListener('change', function() {
                        // Lấy giá trị ngày
                        var selectedStartDate = this.value;

                        // Hiển thị ngày được chọn
                        document.getElementById('selected_start_date_display').innerHTML = "Từ ngày: " +
                            selectedStartDate;
                    });

                    document.getElementById('end_date').addEventListener('change', function() {
                        // Lấy giá trị ngày
                        var selectedEndDate = this.value;

                        // Hiển thị ngày được chọn
                        document.getElementById('selected_end_date_display').innerHTML = "Đến ngày: " +
                            selectedEndDate;
                    });


                    var labelsDichVu = [];
                    var dataDichVu = [];

                    <?php
                    while ($rowDichVu = $resultDichVu->fetch_assoc()) {
                        // Assuming you have a column named 'tongtien' for service total
                        $tongtienDichVu = $rowDichVu['tongtien'];
                        $ngayTaoDichVu = $rowDichVu['ngaytao'];
                    ?>

                    labelsDichVu.push('<?php echo $ngayTaoDichVu; ?>');
                    dataDichVu.push(<?php echo $tongtienDichVu; ?>);

                    <?php
                    }
                    ?>

                    var ctx3 = document.getElementById('myChart3').getContext('2d');
                    var myChart3 = new Chart(ctx3, {
                        type: 'line',
                        data: {
                            labels: labelsDichVu,
                            datasets: [{
                                label: 'Doanh thu dịch vụ',
                                data: dataDichVu,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                    </script>
                </div>

                <!-- /.container-fluid -->
            </div>
        </div>
    </section>





</body>

</html>