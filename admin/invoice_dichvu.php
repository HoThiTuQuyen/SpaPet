<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>DISEE - Invoice HTML5 Template</title>
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
if(isset($_GET['madvspa'])) {
    $madvspa = $_GET['madvspa'];
    $stt = 1;
    // Thực hiện truy vấn để lấy thông tin từ cả bảng chitiet_donhang và donhang
    $query = mysqli_query($conn, "SELECT ddv.*, ldv.tenloaidv, dv.tendv FROM don_dv_spa ddv
                                JOIN loaidichvu ldv ON ddv.maldv = ldv.maldv
                                JOIN dichvu dv ON ddv.madv = dv.madv
                                WHERE ddv.madvspa = '$madvspa'");
$don_dich_vu = mysqli_fetch_assoc($query);
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
                                                <p class="mb-1">Mã hoá đơn: <span><?php echo $madvspa; ?></span></p>
                                                <?php
                                                $ngaytao = $don_dich_vu['ngaytao'];
                                                ?>
                                                <p class="mb-0">Ngày tạo: <span><?php echo $ngaytao; ?></span></p>

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
                                                Admin <br />
                                                pethomemart@gmail.com <br />
                                                Đại Học Tài Nguyên Và Môi Trường
                                                TP.HCM <br />
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="invoice-number mb-30">
                                            <div class="invoice-number-inner">
                                                <h4 class="inv-title-1">Khách Hàng</h4>

                                                <h2 class="name"><?php echo $don_dich_vu['tenkh']; ?></h2>
                                                <p class="invo-addr-1">

                                                    <?php echo $don_dich_vu['sdt']; ?> <br />

                                                </p>


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
                                                <th class="pl0 text-start">Loại dịch vụ</th>
                                                <th class="text-center">Dịch vụ</th>
                                                <th class="text-center">Đơn giá</th>

                                            </tr>
                                        </thead>
                                        <tbody>



                                            <tr class="tr">
                                                <td>
                                                    <div class="item-desc-1">
                                                        <span><?php echo $stt; ?></span>
                                                    </div>
                                                </td>
                                                <td class="pl0"><?php echo $don_dich_vu['tenloaidv']; ?></td>
                                                <td class="text-center"><?php echo $don_dich_vu['tendv']; ?></td>
                                                <td class="text-center"><?php echo $don_dich_vu['giadv']; ?></td>

                                            </tr>

                                            <tr class="tr">
                                                <td colspan="3" class="text-end">Thuế 8%:</td>
                                                <td class="text-center">

                                                    <?php echo number_format($don_dich_vu['thue'], 0, ',', '.') . '.000đ'; ?>

                                                </td>
                                            </tr>

                                            <tr class="tr">
                                                <td colspan="3" class="text-end"><strong>Thành tiền :</strong></td>
                                                <td class="text-center">
                                                    <strong>
                                                        <?php echo number_format($don_dich_vu['tongtien'], 0, ',', '.') . '.000đ'; ?>
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
                                                    class="fa fa-envelope"></i> pethomemart@gmail.com</a>
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
                          $stt++;                      } else {
                                                    // Xử lý trường hợp không có thông tin khách hàng
                                                    echo "Không có thông tin khách hàng.";
                                                }
                                                ?>
    <!-- Invoice 2 end -->

    <script src="../admin/assets1/js/jquery.min.js"></script>
    <script src="../admin/assets1/js/jspdf.min.js"></script>
    <script src="../admin/assets1/js/html2canvas.js"></script>
    <script src="../admin/assets1/js/app.js"></script>

</body>

</html>