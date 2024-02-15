<?php
    include_once 'header.php';
    include_once("../qiyshop/services/connect.php");

    $makh = $_GET['makh'];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM khachhang WHERE makh = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $makh);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
?>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg dichvu">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">

            </div>
        </div>
    </div>
</div>

<div class="cart-section mt-150 mb-150 profile">
    <div class="container">
        <?php foreach( $result as $value ){?>
        <form method="post" action="actions/logout.php">

            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <form method="post" action="actions/logout.php">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <img src="https://scontent.fsgn5-2.fna.fbcdn.net/v/t39.30808-6/364171204_1706191206490454_7050834345381794973_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=efb6e6&_nc_ohc=ZTtP479Jz1IAX9rH_ew&_nc_ht=scontent.fsgn5-2.fna&oh=00_AfDVLbQqJIC1cWOs4Hkezy3-aTu67x7k4cvMF56DOgLbkA&oe=659D0DA7"
                                                alt="Ảnh">
                                        </div>
                                        <h5 class="user-name"><?php echo $value['tenkh'] ?></h5>
                                        <h6 class="user-email"><?php echo $value['email'] ?> </h6>
                                        <button type="submit" class="btn btn-primary" name="qldh"
                                            style="margin-top:30px">Đơn hàng</button>
                                        <button type="submit" class="btn btn-danger" name="logout"
                                            style="margin-top:30px">Đăng
                                            Xuất</button>
                                    </div>
                                    <!-- <div class="about">
                                    <h5>About</h5>
                                    <p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human
                                        experiences.</p>
                                </div> -->
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <form method="post" action="./actions/update_kh.php">
                            <div class="card-body">
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-2 text-primary">Thông tin cá nhân</h6>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="fullName">Tên</label>
                                            <input type="text" class="form-control"
                                                value="<?php echo $value['tenkh'] ?> " id="tenkh"
                                                placeholder="Enter full name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="eMail">Email</label>
                                            <input type="email" class="form-control"
                                                value="<?php echo $value['email'] ?> " id="email"
                                                placeholder="Enter email ID">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="phone">Số điện thoại</label>
                                            <input type="text" class="form-control" value="<?php echo $value['sdt'] ?> "
                                                id="sdt" placeholder="Enter phone number">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="website">Ngày sinh</label>
                                            <input type="url" class="form-control" id="website"
                                                placeholder="Website url">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="website">Mật khẩu</label>
                                            <input type="text" class="form-control"
                                                value="<?php echo $value['matkhau'] ?> " id="matkhau"
                                                placeholder="Website url">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="Street">Địa chỉ</label>
                                            <input type="name" class="form-control" id="diachi"
                                                value="<?php echo $value['diachi'] ?> " placeholder="Enter Street">
                                        </div>
                                    </div>
                                </div>

                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">

                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <?php } ?>
    </div>
</div>



<!-- footer -->
<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-box about-widget">
                    <h2 class="widget-title">QiyShop</h2>
                    <p>Tận hưởng hạnh phúc và sức khỏe cho thú cưng của bạn tại QiyShop! <br>Đừng ngần ngại liên hệ với
                        chúng tôi để biết thêm thông tin hoặc để đặt lịch hẹn ngay hôm nay.<br>Cảm ơn bạn đã tin tưởng
                        !

                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box get-in-touch">
                    <h2 class="widget-title">Liên hệ</h2>
                    <ul>
                        <li>Trường Đại Học Tài Nguyên Và Môi Trường Thành phố Hồ Chí Minh </li>
                        <li>236 Đ. Lê Văn Sỹ, Phường 1, Tân Bình, Thành phố Hồ Chí Minh</li>
                        <li>Email: pethome@gmail.com</li>
                        <li>Hotline: 0987457151</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box pages">
                    <h2 class="widget-title">Hỗ trợ khách hàng</h2>
                    <ul>
                        <li><a href="freeship.php">Miễn phí vận chuyển</a></li>
                        <li><a href="doitra_hang.php">Chính sách đổi - trả hàng</a></li>
                        <li><a href="chinh_sach_bao_mat.php">Chính sách bảo mật</a></li>
                        <li><a href="">Phương thức thanh toán</a></li>
                        <li><a href="">Chính sách hoàn tiền</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box subscribe">
                    <h2 class="widget-title">Thành viên QiyShop</h2>
                    <p>Đăng ký thành viên ngay hôm nay để nhận email về sản phẩm mới và chương trình khuyến mãi của
                        Qiy

                    </p>
                    <form action="index.php">
                        <input type="email" placeholder="Email">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->

<!-- copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <p>Copyrights &copy; 2023 - <a href="https://imransdesign.com/">QuiyShop</a>, All Rights
                    Reserved.<br>
                    Distributed By - <a href="https://themewagon.com/">QuiyShop.vn</a><br>Nội dung sản phẩm tham
                    khảo từ
                    PetMart.vn

                </p>
            </div>
            <div class="col-lg-6 text-right col-md-12">
                <div class="social-icons">
                    <ul>
                        <li class="fb"><a href="https://www.facebook.com/Tu.Quyen.1412" target="_blank"
                                title="Follow on Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="tw"><a href="index.php" target="_blank" title="Follow on Twitter"><i
                                    class="fab fa-twitter"></i></a></li>
                        <li class="ins"><a href="https://www.instagram.com/?hl=en" target="_blank"
                                title="Follow on Instagram"><i class="fab fa-instagram"></i></a></li>
                        <li class="link"><a href="index.php" target="_blank" title="Follow on Linkedin"><i
                                    class="fab fa-linkedin"></i></a></li>
                        <li class="drib"><a href="index.php" target="_blank" title="Follow on Dribbble"><i
                                    class="fab fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end copyright -->

<!-- jquery -->
<script src="assets/js/jquery-1.11.3.min.js"></script>
<!-- bootstrap -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- count down -->
<script src="assets/js/jquery.countdown.js"></script>
<!-- isotope -->
<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
<!-- waypoints -->
<script src="assets/js/waypoints.js"></script>
<!-- owl carousel -->
<script src="assets/js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!-- mean menu -->
<script src="assets/js/jquery.meanmenu.min.js"></script>
<!-- sticker js -->
<script src="assets/js/sticker.js"></script>
<!-- main js -->
<script src="assets/js/main.js"></script>

</body>

</html>