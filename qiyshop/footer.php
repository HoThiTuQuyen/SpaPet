<?php
 include_once("../qiyshop/services/connect.php");
 // Check if there is an existing cart in the session
$cartData = $_SESSION['cart'] ?? null;

// Fetch your thuonghieu data
$sql = "SELECT * FROM thuonghieu";
$result = $conn->query($sql);
?>


<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">60+</span>Thương Hiệu</h3>
                    <p>Mua sắm theo thương hiệu
                    </p>
                    <a href="thuonghieu.php">Xem tất cả</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">

                    <?php
                $sql = "SELECT * FROM thuonghieu";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { 
                        $tenThuongHieu = $row["tenth"];
                        $duongDanAnh = $row["image_th"];
                        $imagePath = "../admin/assets/image/thuonghieu/" . $duongDanAnh;
                ?>
                    <div class="single-logo-item">
                        <img src="<?php echo $imagePath; ?>" alt="">
                    </div>

                    <?php  
                }
                } else {
                    echo "Không có dữ liệu thương hiệu.";
                }
                ?>


                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- end logo carousel -->
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
                        <li>Email: pethomemart@gmail.com</li>
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
<script src="https://js.stripe.com/v3/"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
<!-- ... Your existing HTML/PHP code ... -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Handle the click event of "Xem chi tiết" button
    $('.view-details-btn').on('click', function() {
        var madh = $(this).data('madh');

        // Make an AJAX request to fetch the order details
        $.ajax({
            type: 'POST',
            url: 'get_order_details.php',
            data: {
                madh: madh
            },
            success: function(response) {
                $('#orderDetailsContent').html(response);
            }
        });
    });
});
$(document).ready(function() {
    $('.filter-btn').on('click', function() {
        var status = $(this).data('status');

        // Perform filtering
        $('tbody .table-body-row').hide();
        if (status === 'all') {
            $('tbody .table-body-row').show();
        } else {
            $('tbody .table-body-row[data-status="' + status + '"]').show();
        }
    });
});

function cancelOrder(orderId, orderStatus) {
    // Kiểm tra trạng thái đơn hàng
    if (orderStatus === 'Đã duyệt' || orderStatus === 'Đã thanh toán' || orderStatus === 'Đã huỷ đơn') {
        // Hiển thị thông báo
        showToast('Không thể huỷ đơn đã duyệt hoặc đã thanh toán hoặc đã huỷ.');
        return;
    }

    // Hiển thị hộp thoại xác nhận
    if (confirm("Bạn có chắc chắn muốn huỷ đơn hàng này không?")) {
        // Gửi yêu cầu AJAX để cập nhật trạng thái
        $.ajax({
            type: 'POST',
            url: 'cancel_order.php', // Đường dẫn đến tệp PHP xử lý yêu cầu
            data: {
                orderId: orderId
            },
            success: function(response) {
                // Xử lý phản hồi từ server nếu cần
                console.log(response);
                // Load lại trang sau khi hủy đơn thành công
                location.reload();
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }
}


function showToast(message) {
    // Hiển thị thông báo sử dụng thư viện toast hoặc implement your own toast
    // Ví dụ sử dụng thư viện toastify.js
    Toastify({
        text: message,
        duration: 3000, // 3 seconds
        gravity: 'bottom', // Display at the bottom
        position: 'center', // Center position
    }).showToast();
}
</script>
<script>
// Gọi hàm updateCartItem khi có sự kiện thay đổi số lượng sản phẩm

function handleCheckboxClick(checkboxId) {
    // Kiểm tra xem checkbox có được chọn hay không
    var isChecked = document.getElementById(checkboxId).checked;

    // Nếu checkbox được chọn, hủy chọn checkbox còn lại
    if (isChecked) {
        if (checkboxId === 'paymentOnDelivery') {
            document.getElementById('digitalWallet').checked = false;
        } else if (checkboxId === 'digitalWallet') {
            document.getElementById('paymentOnDelivery').checked = false;
        }
    }

    // Kiểm tra xem tất cả các checkbox có được chọn không
    var paymentOnDeliveryChecked = document.getElementById('paymentOnDelivery').checked;
    var digitalWalletChecked = document.getElementById('digitalWallet').checked;

    // Nếu tất cả đều được chọn, ẩn thông báo
    if (paymentOnDeliveryChecked || digitalWalletChecked) {
        document.getElementById('errorMessage').style.display = 'none';
    }
}

function redirectToCheckout() {
    // Kiểm tra trạng thái của checkbox
    var paymentOnDeliveryChecked = document.getElementById('paymentOnDelivery').checked;
    var digitalWalletChecked = document.getElementById('digitalWallet').checked;

    // Kiểm tra điều kiện và chuyển hướng hoặc hiển thị thông báo
    if (!paymentOnDeliveryChecked && !digitalWalletChecked) {
        document.getElementById('errorMessage').style.display = 'block';
    } else {
        // Ẩn thông báo nếu có ít nhất một checkbox được chọn
        document.getElementById('errorMessage').style.display = 'none';

        // Chuyển hướng theo điều kiện
        if (paymentOnDeliveryChecked) {
            // Thanh toán khi nhận hàng
            window.location.href = 'actions/checkout.php';
        } else if (digitalWalletChecked) {
            // Thanh toán qua ví điện tử
            window.location.href = 'checkout.php';
        }
        // Các trường hợp khác có thể được thêm vào tùy theo yêu cầu của bạn
    }
}

// Gọi hàm updateCartItem khi có sự kiện thay đổi số lượng sản phẩm
$('.quantityInput').on('input', function() {
    var masp = $(this).data('masp');
    var quantity = $(this).val();

    // Gọi hàm cập nhật giỏ hàng
    updateCartItem(masp, quantity);
});

function updateCartItem(masp, quantity) {
    $.ajax({
        type: "POST",
        url: "../qiyshop/actions/update_cart.php",
        data: {
            masp: masp,
            quantity: quantity
        },
        dataType: "json",
        success: function(response) {
            // Cập nhật giao diện với các giá trị mới từ server
            updateUI(response);
        },
        error: function(error) {
            console.error('Error updating cart:', error);
        }
    });
}

// Sample JavaScript code for updating UI after receiving the response from the server
function updateUI(cartData) {
    var totalPriceElement = document.getElementById('totalPrice');
    if (totalPriceElement) {
        totalPriceElement.innerHTML = +cartData.totalPrice;
    } else {
        console.error('Total price element not found');
    }


    // Update individual product prices
    response.products.forEach(product => {
        $(`#productTotal_${product.masp}`).html((product.giaban * product.quantity).toFixed(3) + ' đ');
    });

    // Update shipping fee
    document.getElementById('shippingFee').innerHTML = (response.shippingFee > 0) ? response.shippingFee.toFixed(3) +
        ' đ' : 'Miễn Phí';

    // Update tax
    document.getElementById('tax').innerHTML = response.tax.toFixed(3) + ' đ';

    // Update grand total
    document.getElementById('grandTotal').innerHTML = response.grandTotal.toFixed(3) + ' đ';
}
console.log('Response from server:', response);


// Sample code to handle the response received from the server
// Define formData
var formData = new FormData();

// Add data to formData if needed
formData.append('key', 'value');

// Sample code to handle the response received from the server
fetch('../qiyshop/actions/update_cart.php', {
        method: 'POST',
        body: formData, // Your form data here
    })
    .then(response => response.json())
    .then(data => {
        updateUI(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
// Trong JavaScript
</script>




<!-- ... Your existing HTML/PHP code ... -->

</body>

</html>