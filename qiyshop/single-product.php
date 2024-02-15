<?php
    include_once 'header.php';



    $sql = "SELECT sp.*, th.tenth
            FROM sanpham sp
            JOIN thuonghieu th ON sp.math = th.math
            WHERE sp.masp = '".$_GET['masp']."'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $masp = $row["masp"];
    $tensanpham = $row["tensp"];
    $math = $row["math"];
    $tenth = $row["tenth"];
    $phanloai = $row["phanloai"];
    $donvitinh = $row["donvitinh"];
    $duongDanAnh = $row["anhsp"];
    $giaban = $row["giaban"];
    $motasp = $row["motasp"];
    $imagePath = "../admin/assets/image/sanpham/" . $duongDanAnh;

    
?>




<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg dichvu">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text dichvu">
                    <p>Chi Tiết Sản Phẩm</p>
                    <h1>
                    </h1>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- single product -->
<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="product-image">
                    <!-- Update the image source to use dynamic $imagePath -->
                    <img src="<?php echo $imagePath; ?>" alt="<?php echo $tensanpham; ?>">

                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <h3><?php echo $tensanpham; ?> (<?php echo $masp; ?>)</h3>
                    <span>Thương Hiệu: <a href="shop.php?math=<?php echo $math; ?>">
                            <?php echo $tenth ?></a></span>
                    <!-- Display the actual product price -->

                    <p class=" single-product-pricing"><?php echo $giaban ?> đ </p>



                    <div class="single-product-form">
                        <form action="../qiyshop/actions/add_to_card.php" method="post" id="cartForm">
                            <input type="hidden" name="masp" id="maspInput" value="<?php echo $masp; ?>">
                            <label for="soluong">Số lượng:</label>
                            <input type="number" name="soluong" id="soluongInput"
                                value="<?php echo isset($soluong) ? $soluong : ''; ?>" placeholder="0" min="1" max="10">
                            <label for=""> <?php echo $donvitinh ?> </label>
                            <p style="font-size: 18px;"><strong>Tổng tiền: </strong><span id="tongTien"
                                    style="font-weight:bold; color: brown;"><?php echo isset($soluong) ? $soluong * $giaban : '0'; ?></span>
                            </p>
                            <div id="thongBao" style="color: red; margin-bottom: 10px;"></div>
                            <button type="submit" class="cart-btn"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ
                                hàng</button>

                        </form>
                    </div>
                    <script>
                    document.getElementById('cartForm').addEventListener('submit', function(event) {
                        event.preventDefault();
                        var soluong = document.getElementById('soluongInput').value;
                        var masp = document.getElementById('maspInput').value;

                        $.ajax({
                            type: 'POST',
                            url: 'actions/check_inventory.php',
                            data: {
                                masp: masp,
                                soluong: soluong
                            },
                            success: function(response) {
                                if (response === 'success') {
                                    // Nếu số lượng hợp lệ, tiếp tục submit form
                                    document.getElementById('cartForm').submit();
                                } else {
                                    // Hiển thị thông báo và đặt nội dung thông báo
                                    var thongBaoDiv = document.getElementById('thongBao');
                                    thongBaoDiv.innerText =
                                        '' + response;
                                    // Cập nhật kiểu hiển thị của thông báo
                                    thongBaoDiv.style.display = 'block';
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                console.error('Status: ' + status);
                                console.error('Error: ' + error);
                            }
                        });
                    });

                    // Lắng nghe sự kiện thay đổi trong trường số lượng
                    document.getElementById('soluongInput').addEventListener('input', function() {
                        var soluong = document.getElementById('soluongInput').value;
                        var giaban = <?php echo $giaban; ?>;
                        var tongTien = soluong * giaban;
                        var formattedTongTien = new Intl.NumberFormat('vi-VN').format(tongTien);
                        document.getElementById('tongTien').innerText = formattedTongTien + '.000 đ';
                    });
                    </script>





                    <h4>Share:</h4>
                    <ul class="product-share">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:50px;">
            <div class="col-md-12">
                <p><?php echo $motasp ?></p>

            </div>
        </div>
    </div>
</div>


<?php
$sqlRelatedProducts = "SELECT sp.*, th.tenth
                      FROM sanpham sp
                      JOIN thuonghieu th ON sp.math = th.math
                      WHERE sp.phanloai = '$phanloai' AND sp.masp != '$masp'
                      ORDER BY RAND() LIMIT 3";

$stmtRelatedProducts = $conn->prepare($sqlRelatedProducts);
$stmtRelatedProducts->execute();
$resultRelatedProducts = $stmtRelatedProducts->get_result();

if ($resultRelatedProducts->num_rows > 0) {
    echo '<!-- more products -->';
    echo '<div class="more-products mb-150 dichvu">';
    echo '    <div class="container">';
    echo '        <div class="row">';
    echo '            <div class="col-lg-8 offset-lg-2 text-center">';
    echo '                <div class="section-title">';
    echo '                    <h3><span class="orange-text">Sản Phẩm</span> Liên Quan</h3>';
   
    echo '                </div>';
    echo '            </div>';
    echo '        </div>';
    echo '        <div class="row">';

    while ($rowRelated = $resultRelatedProducts->fetch_assoc()) {
        // Adjust the code below based on your needs
        echo '            <div class="col-lg-4 col-md-6 text-center">';
        echo '                <form action="../qiyshop/actions/add_to_card.php" method="post" id="cartForm">';
        echo '                    <div class="single-product-item">';
        echo '                        <div class="product-image">';
        echo '                            <a href="single-product.php?masp=' . $rowRelated['masp'] . '"><img src="../admin/assets/image/sanpham/' . $rowRelated['anhsp'] . '" alt=""></a>';
        echo '                        </div>';
        echo '                        <a href="shop.php?math=' . $rowRelated['math'] . '">';
        echo '                            <p class="text-th">' . $rowRelated['tenth'] . '</p>';
        echo '                        </a>';
        echo '                        <h3><a style="color:#020C0E;" href="single-product.php?masp=' . $rowRelated['masp'] . '">' . $rowRelated['tensp'] . '</a></h3>';
        echo '                        <p class="product-price " style="color:chocolate;">' . $rowRelated['giaban'] . ' đ</p>';
        echo '                    </div>';
        echo '                </form>';
        echo '            </div>';
    }

    echo '        </div>';
    echo '    </div>';
    echo '</div>';
}

$stmtRelatedProducts->close();
?>
<?php
 }
 $stmt->close();
    include_once 'footer.php';
?>