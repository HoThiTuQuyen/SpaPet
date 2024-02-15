<?php
include_once 'header.php';
include_once '../qiyshop/services/connect.php';

// Assuming you have a user ID stored in the session
$userId = $_SESSION['makh'];

// Fetch cart items from the database
$stmt = $conn->prepare("SELECT giohang.*, sanpham.anhsp FROM giohang JOIN sanpham ON giohang.masp = sanpham.masp WHERE giohang.makh = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

?>
<script>
$(document).ready(function() {
    // Check if there is cart data in session
    var cartData = JSON.parse(sessionStorage.getItem('cartData'));

    // Use cart data to update the UI
    if (cartData) {
        updateUI(cartData);
    }


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

    // Function to update the UI with cart data
    function updateUI(cartData) {
        // Implement the logic to update the UI with cart data
        // For example, you can loop through the cart items and display them
        // You may need to adjust this part based on your specific UI structure
        console.log('Cart data:', cartData);
    }

    // ... (rest of your existing JavaScript code)
});
</script>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg dichvu">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text dichvu">
                    <p>Giỏ Hàng</p>
                    <h1></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<?php
// Use prepared statements to prevent SQL injection
$sqlUser = "SELECT * FROM khachhang WHERE makh = ?";
$stmtUser = $conn->prepare($sqlUser);
$stmtUser->bind_param("s", $userId);
$stmtUser->execute();
$resultUser = $stmtUser->get_result();
$user = $resultUser->fetch_assoc();
$stmtUser->close();
?>

<div class="cart-section profile">
    <div class="container">
        <?php foreach ($resultUser as $value) { ?>
        <form method="post" action="actions/logout.php">
            <?php
                    // session_start();

                    // Kiểm tra xem có thông báo lỗi không
                    if (isset($_SESSION['error_message'])) {
                        echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';

                        // Xóa thông báo lỗi sau khi đã hiển thị
                        unset($_SESSION['error_message']);
                    }
                    ?>
            <div class="col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">

                        <div class="row gutters">
                            <div class=" col-12">
                                <h6 class="mb-2 text-primary">Thông tin cá nhân</h6>
                            </div>
                            <div class="col-12">
                                <label for="fullName">Tên:<?php echo $value['tenkh'] ?></label>
                            </div>
                            <div class=" col-12">
                                <label for="eMail">Email:<?php echo $value['email'] ?></label>
                            </div>
                            <div class=" col-12">
                                <label for="phone">Số điện thoại :<?php echo $value['sdt'] ?></label>
                            </div>
                            <div class=" col-12">
                                <label for="Street">Địa chỉ:<?php echo $value['diachi'] ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-12">
                <div class="text-left">
                    <a href="profile.php<?php echo isset($mhs['makh']) ? '?makh=' . $mhs['makh'] : ''; ?>"
                        class="btn btn-primary">Chỉnh sửa</a>
                    <a href="quanlydonhang.php" class="btn btn-primary">Đơn hàng</a>
                </div>

            </div>
            <?php } ?>
        </form>
    </div>
</div>

<!-- cart -->
<div class="cart-section  dichvu" style="padding: 20px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove">Hành Động</th>
                                <th class="product-image">Ảnh</th>
                                <th class="product-name">Tên sản phẩm</th>
                                <th class="product-price">Giá tiền</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-total">Tổng tiền/sp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $totalPrice = 0;

                            while ($row = $result->fetch_assoc()) {
                                // Output cart items dynamically
                                ?>
                            <tr class="table-body-row">
                                <!-- Display cart item details -->
                                <td class="product-remove">
                                    <a href="actions/action_remove_prcart.php?masp=<?php echo $row['masp']; ?>">
                                        <i class="far fa-window-close"></i>
                                    </a>
                                </td>
                                <td class="product-image">
                                    <img src="<?php echo 'assets/sanpham/' . $row['anhsp']; ?>" alt="">
                                </td>
                                <td class="product-name"><?php echo $row['tensp']; ?></td>
                                <td class="product-price"><?php echo $row['giaban']; ?> đ</td>
                                <td class="product-quantity">
                                    <?php echo $row['soluong']; ?>
                                </td>
                                <!-- <td class="product-quantity">
                                    <input type="number" class="quantityInput" data-masp="<?php echo $row['masp']; ?>"
                                        placeholder="0" min="1" max="15" value="<?php echo $row['soluong']; ?>">
                                </td> -->

                                <td class="product-total" id="totalPrice"><?php echo $row['tonggia_sp']; ?> đ</td>
                            </tr>
                            <?php $totalPrice += $row['tonggia_sp'];
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="total-data">
                                <td><strong>Tổng tiền sp: </strong></td>
                                <td><?php echo number_format($totalPrice, 3); ?> đ</td>
                            </tr>
                            <?php
                            // Tính phí giao hàng
                            $shippingFee = ($totalPrice < 500) ? 35 : 0;
                            ?>
                            <tr class="total-data">
                                <td><strong>Phí giao hàng:</strong></td>
                                <td><?php echo ($shippingFee > 0) ? number_format($shippingFee, 3) . ' đ' : 'Miễn Phí'; ?>
                                </td>
                            </tr>
                            <?php
                            // Tính thuế 10%
                            $taxRate = 0.08;
                            $tax = $totalPrice * $taxRate;
                            ?>
                            <tr class="total-data">
                                <td><strong>Thuế 8%:</strong></td>
                                <td><?php echo number_format($tax, 3); ?> đ</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Thành tiền:</strong></td>
                                <td><?php echo number_format($totalPrice + $tax + $shippingFee, 3); ?> đ</td>
                            </tr>
                        </tbody>
                    </table>
                    <form method="post" action="actions/checkout.php" style="margin-top: 30px;">
                        <p style="color:darkorange;">*Lưu ý: Không thể huỷ đơn nếu đơn đã duyệt hoặc đã thanh toán.</p>

                        <label>
                            <input type="checkbox" id="paymentOnDelivery" name="paymentMethod" value="paymentOnDelivery"
                                onclick="handleCheckboxClick('paymentOnDelivery')">
                            Thanh toán khi nhận hàng
                        </label>

                        <label>
                            <input type="checkbox" id="digitalWallet" name="paymentMethod" value="digitalWallet"
                                onclick="handleCheckboxClick('digitalWallet')">
                            Thanh toán thẻ
                        </label>
                        <!-- Thêm các trường và nút submit khác nếu cần -->
                    </form>

                    <div id="errorMessage" class="error-message" style="display: none; color: red; margin-top: 10px;">
                        Vui lòng chọn phương thức thanh toán.
                    </div>
                    <div class="cart-buttons">

                        <a href="shop.php" class="boxed-btn">Tiếp tục mua sắm</a>
                        <a id="checkoutButton" class="boxed-btn" onclick="redirectToCheckout()">Đặt hàng</a>
                    </div>
                </div>
                <!-- Display errors returned by checkout session -->
                <!-- <form metho="post" action="checkout.php"></form> -->
                <!-- Product details -->

                <!-- <div class="coupon-section">
                    <h3>Apply Coupon</h3>
                    <div class="coupon-form-wrap">
                        <form action="index.php">
                            <p><input type="text" placeholder="Coupon"></p>
                            <p><input type="submit" value="Apply"></p>
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- end cart -->
<?php
include_once 'footer.php';
?>