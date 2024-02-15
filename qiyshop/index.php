<?php
    include_once 'header.php';

?>



<!-- hero area -->
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <p class="subtitle">Đa Dạng & Chất Lượng</p>
                        <h1>The Best For Pets</h1>
                        <div class="hero-btns">
                            <a href="shop.php" class="boxed-btn">Bộ sưu tập Pets</a>
                            <a href="dat_lich_spa.php" class="bordered-btn">Đặt lịch Spa Pets</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->

<!-- features list section -->
<div class="list-section pt-80 pb-80">
    <div class="container">

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="content">
                        <h3>Miễn Phí Vận Chuyển</h3>
                        <p>Với hóa đơn 500.000 đ</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-phone-volume"></i>
                    </div>
                    <div class="content">
                        <h3>Hỗ Trợ 24/7</h3>
                        <p>Mọi lúc mọi nơi</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="list-box d-flex justify-content-start align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-sync"></i>
                    </div>
                    <div class="content">
                        <h3>Hoàn Trả Hàng</h3>
                        <p>Chính sách đổi trả trong vòng 48h!</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- end features list section -->




<!-- product section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Sản phẩm</span>Mới</h3>
                    <p>Hãy để chúng tôi chăm sóc người bạn đáng yêu của bạn với những sản phẩm chất lượng và yêu thương.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            
          
            $madm = isset($_GET['madm']) ? $_GET['madm'] : null;
            $madmchinh = isset($_GET['madmchinh']) ? $_GET['madmchinh'] : null;
            $madmphu = isset($_GET['madmphu']) ? $_GET['madmphu'] : null;
            $math = isset($_GET['math']) ? ($_GET['math']) : null;
            
            $sql = "SELECT sp.*, th.tenth, tk.soluong, tk.ngaynhap
            FROM sanpham sp
            JOIN thuonghieu th ON sp.math = th.math
            JOIN tonkho tk ON sp.masp = tk.masp";

            if (!empty($madm)) {
                $sql .= " JOIN dmphu mphu ON sp.madmphu = mphu.madmphu
                        JOIN dmchinh mchinh ON mphu.madmchinh = mchinh.madmchinh
                        JOIN danhmuc danhm ON mchinh.madm = danhm.madm
                        WHERE danhm.madm = ?";
                $param = $madm;
            } elseif (!empty($madmchinh)) {
                $sql .= " JOIN dmphu mphu ON sp.madmphu = mphu.madmphu
                        JOIN dmchinh mchinh ON mphu.madmchinh = mchinh.madmchinh
                        WHERE mchinh.madmchinh = ?";
                $param = $madmchinh;
            } elseif (!empty($madmphu)) {
                $sql .= " WHERE sp.madmphu = ?";
                $param = $madmphu;
            } elseif (!empty($math)) {
                $sql .= " WHERE sp.math = ?";
                $param = $math;
            } else {
                // Nếu không có tham số, trả về tất cả sản phẩm
                $param = null;
            }
           
            $sql .= " GROUP BY sp.masp ORDER BY tk.ngaynhap DESC LIMIT 9";


            $stmt = $conn->prepare($sql);

            if (!is_null($param)) {
                $stmt->bind_param("s", $param);
            }

            $stmt->execute();
            $result = $stmt->get_result();


            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $masp = $row["masp"];
                    $tensanpham = $row["tensp"];
                    $duongDanAnh = $row["anhsp"];
                    $math = $row["math"];
                    $tenth = $row["tenth"];
                    $giaban = $row["giaban"]; // Brand name from thuonghieu table
                    $imagePath = "../admin/assets/image/sanpham/" . $duongDanAnh;
                   
            ?>

            <div class="col-lg-4 col-md-6 text-center strawberry">
                <form action="../qiyshop/actions/add_to_card.php" method="post" id="cartForm">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.php?masp=<?php echo $row['masp']; ?>"><img
                                    src="<?php echo $imagePath; ?>" alt=""></a>
                        </div>

                        <a href="shop.php?math=<?php echo $math; ?>">
                            <p class="text-th"><?php echo $tenth; ?></p>
                        </a>
                        <h3><a style="color:#020C0E;"
                                href="single-product.php?masp=<?php echo $row['masp']; ?>"><?php echo $tensanpham; ?></a>
                        </h3>



                        <p class="product-price " style="color:chocolate;"><?php echo $giaban; ?> đ</p>

                        <!-- <button type="submit" class="cart-btn"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ
                            hàng</button> -->

                    </div>
                </form>
            </div>
            <?php  
                }
            } else {
                echo "Không có sản phẩm.";
            }
            ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <a href="shop.php" class="boxed-btn">Xem tất cả</a>
        </div>
    </div>
</div>
</div>
<!-- end product section -->

<!-- cart banner section -->
<!-- <section class="cart-banner pt-100 pb-100">
    <div class="container">
        <div class="row clearfix">
            <div class="image-column col-lg-6">
                <div class="image">
                    <div class="price-box">
                        <div class="inner-price">
                            <span class="price">
                                <strong>30%</strong> <br>
                            </span>
                        </div>
                    </div>
                    <img src="assets/img/products/pate-lontuna-remove.png" alt="">
                </div>
            </div>
            <div class="content-column col-lg-6">
                <h3><span class="orange-text">Deal hời</span> cho Boss</h3>
                <h4>Pate lon cho mèo vị cá ngừ trắng tiêu búi lông MEOWOW Tuna Hairball</h4>
                <div class="text">Pate lon cho mèo vị cá ngừ trắng tiêu búi lông MEOWOW Tuna Hairball là món ăn nhẹ giàu
                    DHA và EPA cho mèo. Sản phẩm phù hợp cho mèo mọi lứa tuổi, mèo có hệ tiêu hóa yếu hoặc hay chán ăn.
                </div>
                <div class="time-counter">
                    <div class="time-countdown clearfix" data-countdown="2020/2/01">
                        <div class="counter-column">
                            <div class="inner"><span class="count">01</span>Ngày</div>
                        </div>
                        <div class="counter-column">
                            <div class="inner"><span class="count">08</span>Giờ</div>
                        </div>
                        <div class="counter-column">
                            <div class="inner"><span class="count">23</span>Phút</div>
                        </div>
                        <div class="counter-column">
                            <div class="inner"><span class="count">12</span>Giây</div>
                        </div>
                    </div>
                </div>

                <a href="cart.php" class="cart-btn mt-3">
                    <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng

                </a>
                <a href="shop.php" class="boxed-btn">Xem tất cả</a>

            </div>
        </div>
    </div>
</section> -->
<!-- end cart banner section -->

<!-- testimonail-section -->
<!-- <div class="testimonail-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="testimonial-sliders">
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="assets/img/avaters/avatar1.png" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Saira Hakim <span>Local shop owner</span></h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto
                                beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis
                                iste natus error sit voluptatem accusantium "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="assets/img/avaters/avatar2.png" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>David Niph <span>Local shop owner</span></h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto
                                beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis
                                iste natus error sit voluptatem accusantium "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="assets/img/avaters/avatar3.png" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Jacob Sikim <span>Local shop owner</span></h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto
                                beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis
                                iste natus error sit voluptatem accusantium "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- end testimonail-section -->

<!-- advertisement section -->
<div class="abt-section mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="abt-bg">
                    <a href="https://www.youtube.com/watch?v=tkzwXX53qQ8" class="video-play-btn popup-youtube"><i
                            class="fas fa-play"></i></a>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="abt-text">
                    <p style="color: #E74C3C; font-weight: bold;">Since Year 2023</p>
                    <h2>Chào mừng bạn đến với <span class="orange-text">QuiyShop</span></h2>
                    <p>Nơi đáng tin cậy để tìm kiếm những người bạn đồng hành! Chúng
                        tôi là cửa hàng thú cưng trực tuyến hàng đầu, cam kết cung cấp cho bạn những sản phẩm và dịch vụ
                        chất lượng nhất để chăm sóc và nuôi dưỡng thú cưng của bạn.</p>
                    <p>Hãy đến QuiyShop và trải nghiệm sự thuận tiện và hạnh phúc khi mua sắm cho Pets của
                        bạn! Đồng hành với chúng tôi, bạn sẽ tìm thấy mọi thứ bạn cần để chăm sóc thú cưng của
                        mình.</p>
                    <a href="about.php" class="boxed-btn mt-4">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end advertisement section -->

<!-- shop banner -->
<section class="shop-banner">
    <div class="container">
        <h3>Hãy để chúng tôi <br> <span class="orange-text">chăm sóc thú cưng của bạn</span></h3>
        <!-- <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div> -->
        <a href="dat_lich_spa.php" class="cart-btn btn-lg" style="margin-top:80px;">Đặt Lịch Ngay</a>
    </div>
</section>
<!-- end shop banner -->

<!-- latest news -->
<div class="latest-news pt-150 pb-150">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Pets</span> News</h3>
                    <p>Hãy cùng chúng tôi khám phá và chia sẻ thông tin, kiến thức, các câu chuyện thú vị, niềm đam mê
                        về thế giới của thú cưng!</p>
                </div>
            </div>
        </div>

        <div class="row">

            <?php
    function limitWords($text, $limit) {
        $words = explode(' ', $text);
        $limitedWords = array_slice($words, 0, $limit);
        return implode(' ', $limitedWords);
    }

   
    
    $sql = "SELECT * FROM news LIMIT 6";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $manews = $row['manews'];
            $tieude = $row['tieude'];
            $id = $row['id'];
            $loai = $row['loai'];
            $tomtat = $row['tomtat'];
            $ngaydang = $row["ngaydang"];
            $duongDanAnh = $row["image_news"];
            $imagenews = "../admin/assets/image/image_news/" . $duongDanAnh;

            $soTuToiDa = 25;
            $tomtatGioiHan = limitWords($tomtat, $soTuToiDa);

            $sqlAdmin = "SELECT name FROM tb_admin WHERE id = '$id'";
            $resultAdmin = $conn->query($sqlAdmin);

            // Fetch dữ liệu từ kết quả truy vấn
            if ($resultAdmin->num_rows > 0) {
                $rowAdmin = $resultAdmin->fetch_assoc();
                $name = $rowAdmin['name'];
            } else {
                $name = "Unknown"; // Giả sử nếu không tìm thấy name
            }

            ?>


            <div class="col-lg-4 col-md-6">
                <div class="single-latest-news">
                    <a href="single-news.php?manews=<?php echo $manews; ?>">
                        <div class="latest-news-bg" style="background-image: url('<?php echo $imagenews; ?>');background-size: cover;
                        background-position: center center;
                        width: 100%;
                        height: 250px;">
                        </div>
                    </a>
                    <div class="news-text-box">
                        <h3 style="padding-bottom:10px; height: 60px"><a
                                href="single-news.php?manews=<?php echo $manews; ?>"><?php echo $tieude; ?></a></h3>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i>Admin</span>
                            <span class="date"><i class="fas fa-calendar"></i> <?php echo $ngaydang; ?></span>
                            <span class="date"><i class="fas fa-solid fa-heart"></i> <?php echo $loai; ?></span>
                        </p>
                        <p class="excerpt"><?php echo $tomtatGioiHan; ?>...</p>
                        <a href="single-news.php?manews=<?php echo $manews; ?>" class="read-more-btn">Xem thêm <i
                                class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
        </div>


        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="news.php" class="boxed-btn">More News</a>
            </div>
        </div>
    </div>
</div>
<!-- end latest news -->




<?php
    include_once 'footer.php';

?>