<?php
    include_once 'header.php';

?>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg dichvu">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Read the Details</p>
                    <h1>Single Article</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- single article section -->
<div class="mt-150 mb-150">
    <div class="container">
        <div class="row">
            <?php
            $manews = $_GET['manews'];

            // Truy vấn SQL để lấy thông tin của bài viết và tác giả (news và tb_admin)
            $sql = "SELECT news.*, tb_admin.name as author_name FROM news 
                    INNER JOIN tb_admin ON news.id = tb_admin.id 
                    WHERE news.manews = '$manews'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $tieude = $row['tieude'];
                $tomtat = $row['tomtat'];
                $ngaydang = $row["ngaydang"];
                $loai = $row['loai'];
                $duongDanAnh = $row["image_news"];
                $image_news = "../admin/assets/image/image_news/" . $duongDanAnh;
                $author_name = $row["author_name"];
                $noidung = $row["noidung"];

                // Hiển thị nội dung cho bài viết
            ?>
            <div class="col-lg-12">
                <div class="single-article-section">
                    <div class="single-article-text">
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i>Admin</span>
                            <span class="date"><i class="fas fa-calendar"></i> <?php echo $ngaydang; ?></span>
                            <span class="date"><i class="fas fa-solid fa-heart"></i> <?php echo $loai; ?></span>
                        </p>
                        <h2 style="font-size:32px;"><?php echo $tieude; ?></h2>
                        <div class="single-artcile-bg" style="background-image: url('<?php echo $image_news; ?>'); ">
                        </div>


                        <p><?php echo $tomtat; ?></p>
                        <p><?php echo $noidung; ?></p>
                    </div>
                </div>
            </div>




            <!-- <div class="col-lg-4 sticky">
                <div class="sidebar-section">
                    <div class="recent-posts">
                        <h4>Recent Posts</h4>
                        <ul>
                            <li><a href="single-news.php">You will vainly look for fruit on it in autumn.</a></li>
                            <li><a href="single-news.php">A man's worth has its season, like tomato.</a></li>
                            <li><a href="single-news.php">Good thoughts bear good fresh juicy fruit.</a></li>
                            <li><a href="single-news.php">Fall in love with the fresh orange</a></li>
                            <li><a href="single-news.php">Why the berries always look delecious</a></li>
                        </ul>
                    </div>
                    <div class="archive-posts">
                        <h4>Archive Posts</h4>
                        <ul>
                            <li><a href="single-news.php">JAN 2019 (5)</a></li>
                            <li><a href="single-news.php">FEB 2019 (3)</a></li>
                            <li><a href="single-news.php">MAY 2019 (4)</a></li>
                            <li><a href="single-news.php">SEP 2019 (4)</a></li>
                            <li><a href="single-news.php">DEC 2019 (3)</a></li>
                        </ul>
                    </div>
                    <div class="tag-section">
                        <h4>Tags</h4>
                        <ul>
                            <li><a href="single-news.php">Apple</a></li>
                            <li><a href="single-news.php">Strawberry</a></li>
                            <li><a href="single-news.php">BErry</a></li>
                            <li><a href="single-news.php">Orange</a></li>
                            <li><a href="single-news.php">Lemon</a></li>
                            <li><a href="single-news.php">Banana</a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <?php
            } else {
                echo "Không tìm thấy bài viết.";
            }
            ?>
        </div>
    </div>
</div>
<!-- end single article section --><?php
    include_once 'footer.php';

    ?>