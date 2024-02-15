<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Đơn hàng của bạn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="../admin/assets1/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../admin/assets1/fonts/font-awesome/css/font-awesome.min.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../admin/assets1/img/favicon.ico" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="../admin/assets1/css/style.css">
</head>

<body>

    <?php
    include_once'../admin/services/connect.php';
// Kiểm tra xem có tham số madh được truyền hay không
if(isset($_GET['madh'])) {
    $madh = $_GET['madh'];

    // Thực hiện truy vấn để lấy thông tin từ cả bảng chitiet_donhang và donhang
    $query = mysqli_query($conn, "SELECT * FROM donhang WHERE madh = '$madh'");
    $donhang = mysqli_fetch_assoc($query);

    $query_chitiet = mysqli_query($conn, "SELECT * FROM chitiet_donhang WHERE madh = '$madh'");
    // Nếu có nhiều sản phẩm trong đơn hàng, bạn có thể sử dụng vòng lặp để lấy thông tin chi tiết.

    // Tiếp theo, điền thông tin vào template của trang invoice
    ?>
    <!-- Invoice 2 start -->
    <div class="invoice-2 invoice-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner clearfix">
                        <div class="invoice-info clearfix" id="invoice_wrapper">
                            <div class="invoice-headar">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="invoice-logo">
                                            <!-- logo started -->
                                            <div class="logo d-flex justify-content-center align-items-center">
                                                <img src="../admin/assets/image/logo-new2.png" alt="logo"
                                                    style="height: 100px;">
                                            </div>
                                            <!-- logo ended -->
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="invoice-id">
                                            <div class="info">
                                                <h1 class="inv-header-1">Hoá Đơn</h1>
                                                <p class="mb-1">Mã hoá đơn: <span><?php echo $madh; ?></span></p>
                                                <?php
                                                $ngaytao = $donhang['ngaytao'];
                                                ?>
                                                <p class="mb-0">Ngày đặt đơn: <span><?php echo $ngaytao; ?></span>
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-top">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="invoice-number mb-30">
                                            <h4 class="inv-title-1">Cửa Hàng</h4>
                                            <h2 class="name">QiyShop</h2>
                                            <p class="invo-addr-1">
                                                Tú Quyên <br />
                                                pethome@gmail.com <br />
                                                Đại Học Tài Nguyên Và Môi Trường
                                                TP.HCM <br />
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="invoice-number mb-30">
                                            <div class="invoice-number-inner">
                                                <h4 class="inv-title-1">Khách Hàng</h4>
                                                <?php
            // Kiểm tra xem có thông tin khách hàng hay không
                                                if(isset($donhang['makh'])) {
                                                    $makh = $donhang['makh'];
                                                    // Thực hiện truy vấn để lấy thông tin khách hàng từ bảng khachhang
                                                    $query_khachhang = mysqli_query($conn, "SELECT * FROM khachhang WHERE makh = '$makh'");
                                                    $khachhang = mysqli_fetch_assoc($query_khachhang);

                                                    // Hiển thị thông tin khách hàng
                                                    ?>
                                                <h2 class="name"><?php echo $khachhang['tenkh']; ?></h2>
                                                <p class="invo-addr-1">
                                                    <!-- <?php echo $khachhang['email']; ?> <br /> -->
                                                    <?php echo $khachhang['sdt']; ?> <br />
                                                    <?php echo $khachhang['diachi']; ?> <br />
                                                </p>

                                                <?php
                                                } else {
                                                    // Xử lý trường hợp không có thông tin khách hàng
                                                    echo "Không có thông tin khách hàng.";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-striped invoice-table">
                                        <thead class="bg-active">
                                            <tr class="tr">
                                                <th>STT.</th>
                                                <th class="pl0 text-start">Tên Sản Phẩm</th>
                                                <th class="text-center">Đơn Giá</th>
                                                <th class="text-center">Số Lượng</th>
                                                <th class="text-end">Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                $stt = 1;
                                while ($chitiet = mysqli_fetch_assoc($query_chitiet)) {
                                    // Lấy thông tin chi tiết sản phẩm từ bảng chitiet_donhang
                                    $masp = $chitiet['masp'];
                                    $query_sanpham = mysqli_query($conn, "SELECT * FROM sanpham WHERE masp = '$masp'");
                                    $sanpham = mysqli_fetch_assoc($query_sanpham);
                                ?>

                                            <tr class="tr">
                                                <td>
                                                    <div class="item-desc-1">
                                                        <span><?php echo $stt; ?></span>
                                                    </div>
                                                </td>
                                                <td class="pl0"><?php echo $sanpham['tensp']; ?></td>
                                                <td class="text-center"><?php echo $sanpham['giaban']; ?></td>
                                                <td class="text-center"><?php echo $chitiet['soluong']; ?></td>
                                                <td class="text-end">
                                                    <?php echo $chitiet['soluong'] * $sanpham['giaban'];?>.000đ</td>
                                            </tr>
                                            <?php
                                    $stt++;
                                }
                                ?>
                                            <tr class="tr">
                                                <td colspan="4" class="text-end">Phí giao hàng:</td>
                                                <td class="text-end">

                                                    <?php echo number_format($donhang['phigiaohang'], 0, ',', '.') . '.000đ'; ?>

                                                </td>
                                            </tr>
                                            <tr class="tr">
                                                <td colspan="4" class="text-end">Thuế 8%:</td>
                                                <td class="text-end">

                                                    <?php echo number_format($donhang['thue'], 0, ',', '.') . '.000đ'; ?>

                                                </td>
                                            </tr>

                                            <tr class="tr">
                                                <td colspan="4" class="text-end"><strong>Tổng Đơn Hàng:</strong></td>
                                                <td class="text-end">
                                                    <strong>
                                                        <?php echo number_format($donhang['thanhtien'], 0, ',', '.') . '.000đ'; ?>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-bottom">
                                <div class="row">
                                    <div class="col-lg-6 col-md-5 col-sm-5">
                                        <div class="payment-method mb-30">
                                            <!-- <h3 class="inv-title-1">Payment Method</h3>
                                            <ul class="payment-method-list-1 text-14">
                                                <li><strong>Account No:</strong> 00 123 647 840</li>
                                                <li><strong>Account Name:</strong> Jhon Doe</li>
                                                <li><strong>Branch Name:</strong> xyz</li>
                                            </ul> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-7">
                                        <div class="terms-conditions mb-30">
                                            <!-- <h3 class="inv-title-1">Terms & Conditions</h3>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy has</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-contact clearfix">
                                <div class="row g-0">
                                    <div class="col-sm-12">
                                        <div class="contact-info clearfix">
                                            <a href="tel:+55-4XX-634-7071" class="d-flex"><i class="fa fa-phone"></i>
                                                +0987 457 151</a>
                                            <a href="tel:info@themevessel.com" class="d-flex"><i
                                                    class="fa fa-envelope"></i> pethome@gmail.com</a>
                                            <a href="tel:info@themevessel.com" class="mr-0 d-flex d-none-580"><i
                                                    class="fa fa-map-marker"></i> Đại Học Tài Nguyên Và Môi Trường
                                                TP.HCM</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-btn-section clearfix d-print-none">
                            <a href="javascript:window.print()" class="btn btn-lg btn-print">
                                <i class="fa fa-print"></i> Print Invoice
                            </a>
                            <a id="invoice_download_btn" class="btn btn-lg btn-download btn-theme">
                                <i class="fa fa-download"></i> Download Invoice
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    // Xử lý trường hợp không có tham số madh
    echo "Không có mã đơn hàng được cung cấp.";
}
?>
    <!-- Invoice 2 end -->

    <script src="../admin/assets1/js/jquery.min.js"></script>
    <script src="../admin/assets1/js/jspdf.min.js"></script>
    <script src="../admin/assets1/js/html2canvas.js"></script>
    <script src="../admin/assets1/js/app.js"></script>

</body>

</html>