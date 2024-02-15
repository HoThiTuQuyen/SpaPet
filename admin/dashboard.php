    <section class="content">
        <div class="container-fluid">

            <!-- Small boxes (Stat box) -->
            <div class="row" id="">


                <?php
                    include_once("../admin/services/connect.php");
                    $sql = mysqli_query($conn, "SELECT madh,
                    (SELECT COUNT(madh) FROM donhang WHERE trangthai='Đang duyệt') AS tc,
                    (SELECT COUNT(madh) FROM donhang WHERE trangthai='Đã hủy đơn') AS dh,
                    (SELECT COUNT(madh) FROM donhang WHERE trangthai='Đã duyệt') AS dd_duyet,
                    (SELECT COUNT(madh) FROM donhang WHERE trangthai='Đã thanh toán') AS dd_thanh_toan,
                    (SELECT COUNT(madh) FROM donhang WHERE trangthai='Đã duyệt' OR trangthai='Đã thanh toán') AS dd_tong
                    FROM donhang");
                    $result = mysqli_fetch_array($sql);

                    // -------
                    $sql1 =mysqli_query($conn,"SELECT makh,
                    (SELECT COUNT(makh) FROM khachhang ) AS kh
                    FROM khachhang") ;
                    $result1 = mysqli_fetch_array($sql1); 
                //---------

                    $sqlRevenue = mysqli_query($conn, "SELECT SUM(thanhtien) AS temporary_revenue FROM donhang");
                    $resultRevenue = mysqli_fetch_array($sqlRevenue);
                    $temporaryRevenue = $resultRevenue['temporary_revenue'];

                //--------

                    $sqlRevenue1 = mysqli_query($conn, "SELECT SUM(thanhtien) AS temporary_revenue1 FROM donhang WHERE trangthai = 'Đã thanh toán'");
                    $resultRevenue1 = mysqli_fetch_array($sqlRevenue1);
                    $temporaryRevenue1 = $resultRevenue1['temporary_revenue1'];
                //----------
                    
                    $sqlProfit = mysqli_query($conn, "SELECT SUM(dh.tonggia - dh.tonggia_nhap) AS total_profit
                    FROM chitiet_donhang dh");

                    $resultProfit = mysqli_fetch_array($sqlProfit);
                    $totalProfit = $resultProfit['total_profit'];

                    


                    //------dich vụ
                    $sqlServiceRevenue = mysqli_query($conn, "SELECT SUM(ds.giadv) AS temporary_service_revenue
                    FROM don_dv_spa ds
                    WHERE ds.trangthai = 'Đã thanh toán'");
                    $resultServiceRevenue = mysqli_fetch_array($sqlServiceRevenue);
                    $temporaryServiceRevenue = $resultServiceRevenue['temporary_service_revenue'];
                                    
                    

                ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $result['tc'] ?></h3>
                            <p>Số đơn hàng mới</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $result['dd_tong'] ?></h3>
                            <p>Số đơn đã thanh toán + đã duyệt</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $result1['kh'] ?></h3>

                            <p>Số tài khoản đã đăng ký</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ... (other small boxes) -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo number_format($temporaryRevenue); ?>,000</h3>
                            <p>Doanh thu đơn hàng tạm tính</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo number_format($temporaryServiceRevenue); ?>,000</h3>
                            <p>Doanh thu dịch vụ tạm tính</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo number_format($temporaryRevenue1); ?>,000</h3>
                            <p>Doanh thu chuyển khoản</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ... (other small boxes) -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?php echo number_format($totalProfit); ?>,000</h3>
                            <p>Lợi nhuận tạm tính</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $result['dh'] ?></h3>
                            <p>Đơn hàng hủy</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>



        </div><!-- /.container-fluid -->
    </section>
    <!-- Content Wrapper. Contains page content -->




    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="container mt-4">
                        <form method="post" action="" class="form-inline">
                            <div class="form-group mr-2">
                                <label for="start_date" class="mr-2">Từ ngày:</label>
                                <input type="date" name="start_date" id="start_date" class="form-control" required>
                            </div>
                            <div class="form-group mr-2">
                                <label for="end_date" class="mr-2">Đến ngày:</label>
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

                            echo "<h4 class='mt-4' >Doanh thu đơn hàng tạm tính không bao gồm thuế, phí giao hàng: đơn hàng ngày $startDate đến $endDate:</h4>";
                            echo "<div class='table-container'>";
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
                                $tonggia_nhap = $row['tonggia_nhap'];
                                $tonggia = $row['tonggia'];
                                $chenhlechgia = $tonggia - $tonggia_nhap;

                                // Kiểm tra trạng thái của đơn hàng
                                if ($row['trangthai'] == 'Đã duyệt' || $row['trangthai'] == 'Đã thanh toán') {
                                    $totalGiaNhap_DaDuyet_ThanhToan += $tonggia_nhap;
                                    $totalGiaBan_DaDuyet_ThanhToan += $tonggia;
                                    $tonggia3 = $tonggia;
                                } elseif ($row['trangthai'] == 'Đã hủy đơn') {
                                    $totalGiaNhap_DaHuyDon += $tonggia_nhap;
                                    $totalGiaBan_DaHuyDon += $tonggia;
                                }

                                $totalGiaNhap += $tonggia_nhap;
                                $totalGiaBan += $tonggia;
                                $totalChenhLechGia += $chenhlechgia;
                                $totalcl = $totalGiaBan_DaDuyet_ThanhToan - $totalGiaNhap_DaDuyet_ThanhToan;
                                echo "<tr>
                                        <td>{$row['madh']}</td>
                                        <td>{$row['ngaytao']}</td>
                                        <td>{$row['thanhtien']}</td>
                                        <td>{$row['trangthai']}</td>
                                        <td>{$row['tonggia_nhap']}</td>
                                        <td>{$row['tonggia']}</td>
                                        <td>{$chenhlechgia}.000</td>
                                    </tr>";
                            }

                            echo "</tbody></table>";
                            echo "</div>";  // Close the table container
                            
                            // Move the style declaration to the head section
                            echo "<style>
                                .table-container {
                                    max-height: 300px;  /* Set the maximum height for the table container */
                                    overflow-y: auto;  /* Enable vertical scrollbar if needed */
                                }
                            </style>";

                            echo "<h4 class='mt-4'>Doanh thu đơn hàng tạm tính không bao gồm thuế, phí giao hàng:</h4>";
                            echo "<div>Tổng giá nhập: $totalGiaNhap_DaDuyet_ThanhToan</div>";
                            echo "<div>Tổng giá bán: $totalGiaBan_DaDuyet_ThanhToan</div>";
                            echo "<div>Lợi nhuận: $totalcl</div>";
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
                                var max1 = Math.max( $totalGiaBan_DaDuyet_ThanhToan, $totalGiaBan_DaDuyet_ThanhToan - $totalGiaNhap_DaDuyet_ThanhToan);
                                var max2 = Math.max($totalGiaBan_DaDuyet_ThanhToan, $totalGiaBan_DaDuyet_ThanhToan - $totalGiaNhap_DaDuyet_ThanhToan);
                                var max3 = ($tonggia);
                                var maxValue = Math.max(max1, max2);

                                var ctx1 = document.getElementById('myChart1').getContext('2d');
                                var myChart1 = new Chart(ctx1, {
                                    type: 'bar',
                                    data: {
                                        labels: [ 'Tổng doanh thu', 'Lợi nhuận'],
                                        datasets: [{
                                            label: 'Dữ liệu đơn hàng (Đã duyệt + Đã thanh toán)',
                                            data: [ $totalGiaBan_DaDuyet_ThanhToan, $totalGiaBan_DaDuyet_ThanhToan - $totalGiaNhap_DaDuyet_ThanhToan],
                                            backgroundColor: [
                                                
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 206, 86, 0.2)'
                                            ],
                                            borderColor: [
                                             
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
                                        labels: [ 'Tổng doanh thu', 'Lợi nhuận'],
                                        datasets: [{
                                            label: 'Dữ liệu đơn hàng (Đã hủy đơn)',
                                            data: [ $totalGiaBan_DaHuyDon, $totalGiaBan_DaHuyDon - $totalGiaNhap_DaHuyDon],
                                            backgroundColor: [
                                                
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 206, 86, 0.2)'
                                            ],
                                            borderColor: [
                                               
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

                            echo "<br></br>";

                        //     echo "<script>
                        //     // ...
                        
                        //     // Biểu đồ 3
                        //     var ctx3 = document.getElementById('myChart3').getContext('2d');
                        //     var myChart3 = new Chart(ctx3, {
                        //         type: 'bar',
                        //         data: {
                        //             labels: [";
                        
                        // // Fetch distinct dates from the query result for up to 15 days
                        // $queryDistinctDates = "SELECT DISTINCT DATE(ngaytao) as distinct_date FROM donhang WHERE DATE(ngaytao) BETWEEN '$startDate' AND '$endDate' LIMIT 15";
                        // $resultDistinctDates = $conn->query($queryDistinctDates);
                        
                        // while ($rowDate = $resultDistinctDates->fetch_assoc()) {
                        //     echo "'" . $rowDate['distinct_date'] . "', ";
                        // }
                        
                        // echo "],
                        //             datasets: [{
                        //                 label: 'Doanh thu theo ngày',
                        //                 data: [";
                        
                        // // Fetch data for each date and combined order statuses "Đã duyệt" or "Đã thanh toán"
                        // $query = "SELECT DATE(ngaytao) as order_date, SUM(tonggia) as totalRevenue
                        //             FROM donhang
                        //             WHERE DATE(ngaytao) BETWEEN '$startDate' AND '$endDate' AND (trangthai = 'Đã duyệt' OR trangthai = 'Đã thanh toán')
                        //             GROUP BY DATE(ngaytao)";
                        // $result = $conn->query($query);
                        
                        // while ($row = $result->fetch_assoc()) {
                        //     echo $row['totalRevenue'] . ", ";
                        // }
                        
                        // echo "],
                        //                 backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        //                 borderColor: 'rgba(75, 192, 192, 1)',
                        //                 borderWidth: 1
                        //             },  
                        //             {
                        //                 label: 'Lợi nhuận theo ngày',
                        //                 data: [";
                        
                        // // Fetch data for each date and combined order statuses "Đã duyệt" or "Đã thanh toán" for totalChenhLechGia
                        // $queryProfit = "SELECT DATE(ngaytao) as order_date, SUM(tonggia - tonggia_nhap) as totalProfit
                        //                 FROM donhang
                        //                 WHERE DATE(ngaytao) BETWEEN '$startDate' AND '$endDate' AND (trangthai = 'Đã duyệt' OR trangthai = 'Đã thanh toán')
                        //                 GROUP BY DATE(ngaytao)";
                        // $resultProfit = $conn->query($queryProfit);
                        
                        // while ($rowProfit = $resultProfit->fetch_assoc()) {
                        //     echo $rowProfit['totalProfit'] . ", ";
                        // }
                        
                        // echo "],
                        //             backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        //             borderColor: 'rgba(255, 99, 132, 1)',
                        //             borderWidth: 1
                        //         }]
                        //     },
                        //     options: {
                        //         scales: {
                        //             y: {
                        //                 beginAtZero: true,
                        //                 max: max3
                        //             }
                        //         }
                        //     }
                        // });
                        // </script>";
                            //Tổng hợp cho tất cả các đơn hàng
                            

                            // echo "</div>";
                            

                        
                        } else {
                            echo "<p class='mt-4'>Vui lòng chọn ngày để thống kê.</p>";
                        }
                        ?>
                    </div>



                    <!-- Thêm Bootstrap JavaScript và jQuery (nếu chưa có) -->
                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

                    <script>
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
                    </script>

                </div>

                <!-- /.container-fluid -->
            </div>
        </div>
    </section>



    </body>

    </html>