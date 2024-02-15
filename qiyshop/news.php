<?php
    include_once 'header.php';
    include_once("../qiyshop/services/connect.php");
?>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg dichvu">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>News</p>
                    <h1>Tạp chí thú cưng</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- latest news -->
<div class="latest-news mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="padding:0px">
                <div class="product-filters">
                    <ul>
                        <li class="active" data-filter="*">Tất cả</li>
                        <li class="active" data-filter="Chó cảnh">Chó cảnh</li>
                        <li class="active" data-filter="Mèo cảnh">Mèo cảnh</li>
                        <li class="active" data-filter="Thú cưng khác">Thú cưng khác</li>
                    </ul>
                </div>
            </div>
            <?php
    function limitWords($text, $limit) {
        $words = explode(' ', $text);
        $limitedWords = array_slice($words, 0, $limit);
        return implode(' ', $limitedWords);
    }

   
    
    $sql = "SELECT * FROM news";
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


            <div class="col-lg-4 col-md-6 loai-filter" data-loai="<?php echo $loai; ?>">
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
                        <p class="excerpt"></p>
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

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
        $(document).ready(function() {
            $(".product-filters li").on("click", function() {
                var filterValue = $(this).attr("data-filter");

                // Ẩn tất cả các bài viết
                $(".loai-filter").hide();

                if (filterValue === "*") {
                    // Hiển thị tất cả các bài viết nếu lựa chọn là "*"
                    $(".loai-filter").show();
                } else {
                    // Hiển thị bài viết dựa trên loại
                    $(".loai-filter[data-loai='" + filterValue + "']").show();
                }
            });
        });
        </script>
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="pagination-wrap">
                            <ul>
                                <li><a href="#">Prev</a></li>
                                <li><a href="#">1</a></li>
                                <li><a class="active" href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include_once 'footer.php';

?>