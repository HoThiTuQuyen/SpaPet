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
                    <p>Các Thương Hiệu Được Phân Phối Bởi </p>
                    <h1>QiyShop</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- latest news -->
<div class="latest-news mt-150 mb-150">
    <div class="container">
        <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">
                <h3><span class="orange-text">60+</span>Thương Hiệu</h3>

            </div>
        </div>
        <div class="row">
            <?php
            $sql = "SELECT * FROM thuonghieu";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $math = $row['math'];
                $tenThuongHieu = $row["tenth"];
                $duongDanAnh = $row["image_th"];
                $imagePath = "../admin/assets/image/thuonghieu/" . $duongDanAnh;
                ?>

            <div class="col-lg-3 col-md-6">
                <div class="single-latest-news text-th">
                    <a href="shop.php?math=<?php echo $math; ?>">
                        <div class="latest-news-bg"
                            style="background-image: url('<?php echo $imagePath; ?>'); max-height: 150px; background-color:#f5f5f5;">
                        </div>
                    </a>
                    <div class="news-text-box">
                        <h3><a href="shop.php?math=<?php echo $math; ?>"><?php echo $tenThuongHieu; ?></a></h3>
                    </div>
                </div>
            </div>

            <?php
                }
            } else {
                echo "Không có dữ liệu thương hiệu.";
            }
            ?>
        </div>

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