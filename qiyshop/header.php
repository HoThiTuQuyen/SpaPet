<?php
include_once("../qiyshop/services/connect.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>QiyShop</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/icon-new.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="plugins/codemirror/theme/monokai.css">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="plugins/simplemde/simplemde.min.css">
    <!-- icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

</head>

<body>
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="index.php">
                                <img src="assets/img/logo-new2.png" alt="">
                            </a>
                        </div>
                        <!-- logo -->


                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item"><a href="index.php">Trang Chủ</a></li>

                                <li><a href="shop.php">Sản Phẩm</a>
                                    <?php
                                    // Truy vấn dữ liệu từ bảng danh mục
                                    $querydanhmuc = "select * from danhmuc";
                                    $danhmucresult = $conn->query($querydanhmuc);

                                    if ($danhmucresult->num_rows > 0) {
                                        // Hiển thị danh mục chính
                                        echo "<ul class='sub-menu row'>";
                                        $subcategoryCount = 0; // Biến đếm số lượng danh mục con
                                        while ($danhmucrow = $danhmucresult->fetch_assoc()) {
                                            $madm = $danhmucrow["madm"];
                                            $tendm = $danhmucrow["tendm"];
                                            echo "<li><a href='shop.php?madm=" . $madm . "' > " . $tendm . "</a>";

                                            $dmchinhquery = "SELECT * from dmchinh where madm = '$madm' ";
                                            $dmchinhresult = $conn->query($dmchinhquery);

                                            if ($dmchinhresult->num_rows > 0) {
                                                // Hiển thị danh mục con
                                                echo "<ul class='sub-menu-dmc'>";
                                                while ($dmchinhrow = $dmchinhresult->fetch_assoc()) {
                                                    $tendmchinh = $dmchinhrow["tendmchinh"];
                                                    $madmchinh = $dmchinhrow["madmchinh"];
                                                    echo "<li class='sub-menu-dmc' ><a href='shop.php?madmchinh=" . $madmchinh . "'  ><strong style=''>$tendmchinh</strong></a>";
                                                    // color:#1080b3
                                                    // Truy vấn danh mục con dựa trên madmphu
                                                    $subSubcategoryQuery = "SELECT * FROM dmphu WHERE madmchinh = '$madmchinh'";
                                                    $subSubcategoryResult = $conn->query($subSubcategoryQuery);

                                                    if ($subSubcategoryResult->num_rows > 0) {
                                                        echo "<ul class='sub-menu-dmp'>"; // Sử dụng class 'sub-subcategory-list'
                                                        while ($subSubcategoryRow = $subSubcategoryResult->fetch_assoc()) {
                                                            $tendmphu = $subSubcategoryRow["tendmphu"];
                                                            $madmphu = $subSubcategoryRow["madmphu"];
                                                            echo "<li class='sub-menu-dmp'><a href='shop.php?madmphu=" . $madmphu . "'><strong style='color:#555' >$tendmphu</strong></a></li>";
                                                        }
                                                        echo "</ul>";
                                                    }
                                                    echo "</li>"; // Kết thúc của danh mục chính hoặc danh mục con
                                                }
                                                echo "</ul>"; // Kết thúc danh sách danh mục chính
                                            }

                                            echo "</li>"; // Kết thúc của danh mục chính hoặc danh mục con
                                        }
                                        echo "</ul>"; // Kết thúc danh sách danh mục chính
                                    } else {
                                        echo "Không có danh mục nào trong CSDL.";
                                    }
                                    ?>
                                </li>
                                <li><a href="dichvu_cat_tia_long_cho_meo.php">Dịch Vụ</a>
                                    <ul class="sub-menu dmkhac">
                                        <li><a href="dichvu_cat_tia_long_cho_meo.php">Cắt tỉa lông chó mèo</a>
                                        </li>
                                        <li><a href="dichvu_spa_cho_meo.php">Tắm Spa cho chó mèo</a>
                                        </li>
                                        <!-- <li><a href="dichvu_khach_san_cho_meo.php">Khách sạn chó mèo</a> -->
                                </li>

                            </ul>
                            </li>
                            <li><a href="thuonghieu.php">Thương Hiệu</a></li>
                            <li><a href="about.php">Giới Thiệu</a>
                                <ul class="sub-menu dmkhac">
                                    <li><a href="freeship.php">Miễn phí vận chuyển</a>
                                    </li>
                                    <li><a href="doitra_hang.php">Chính sách đổi trả</a>
                                    </li>
                                    <li><a href="chinh_sach_bao_mat.php">Chính sách bảo mật</a>
                                    </li>

                                </ul>
                            </li>

                            <li><a href="news.php">NEWS</a>
                                <!-- <ul class="sub-menu dmkhac">
                                        <li><a href="news.php">News</a>
                                        </li>
                                        <li><a href="single-news.php">Single News</a>
                                        </li>
                                    </ul> -->
                            </li>

                            <!-- <li><a href="contact.php">Liên hệ</a></li> -->

                            <!-- <li><a href="shop.php">Shop</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop.php">Shop</a></li>
                                        <li><a href="checkout.php">Check Out</a></li>
                                        <li><a href="single-product.php">Single Product</a></li>
                                        <li><a href="cart.php">Cart</a></li>
                                    </ul>
                                </li> -->

                            <li>
                                <div class="header-icons">
                                    <?php if (!isset($_SESSION["name"])) : ?>
                                    <a class="shopping-cart" href="login.php">
                                        <i
                                            class="fas fas fa-user"><?php echo isset($_SESSION["name"]) ? $_SESSION["name"] : 'Khách Hàng'; ?></i>
                                    </a>
                                    <?php else : ?>

                                    <?php
                                            // Kiểm tra xem $_SESSION['makh'] có tồn tại không
                                            if (isset($_SESSION['makh'])) {
                                                $makh = $_SESSION['makh'];
                                                $query = mysqli_query($conn, "SELECT * FROM khachhang WHERE makh = '$makh'");
                                                $mhs = mysqli_fetch_array($query);
                                            }
                                            ?>
                                    <a
                                        href="profile.php<?php echo isset($mhs['makh']) ? '?makh=' . $mhs['makh'] : ''; ?>">
                                        <i
                                            class="fas fas fa-user"><?php echo isset($_SESSION["name"]) ?    $_SESSION["name"] : 'Khách Hàng'; ?></i>
                                    </a>


                                    <?php endif; ?>
                                    <a class="shopping-cart" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                                    <!-- <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a> -->
                                </div>
                            </li>

                            </ul>
                        </nav>



                        <!-- <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a> -->
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <!-- <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h4>Tìm Kiếm:</h4>
                            <input type="text" placeholder="Nhập từ khóa của bạn">
                            <button type="submit">Tìm kiếm <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end search area -->
    <script>
    function searchProduct() {
        const keyword = document.getElementById('searchInput').value.trim();
        if (keyword !== '') {
            // Chuyển hướng đến trang kết quả tìm kiếm, thay thế 'result.php' bằng trang của bạn
            window.location.href = 'shop.php?search=' + encodeURIComponent(keyword);
        }
    }
    </script>