<?php
include_once 'header.php';
include_once '../qiyshop/services/connect.php';

// Assuming you have a user ID stored in the session
// Assuming you have a user ID stored in the session
$userId = $_SESSION['makh'];

// Fetch order items from the database
$stmt = $conn->prepare("SELECT * FROM donhang WHERE makh = ? ORDER BY ngaytao DESC");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg dichvu">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text dichvu">
                    <p>Đơn Hàng</p>
                    <h1></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cart-table-wrap">
                    <div class="mb-3">
                        <button class="btn btn-primary filter-btn" data-status="all">Tất cả</button>
                        <button class="btn btn-info filter-btn" data-status="Đang duyệt">Đang duyệt</button>
                        <button class="btn btn-success filter-btn" data-status="Đã duyệt">Đã duyệt</button>
                        <button class="btn btn-secondary filter-btn" data-status="Đã thanh toán"
                            data-hinhthuc="Chuyển khoản">Đã thanh toán</button>

                        <button class="btn btn-danger filter-btn" data-status="Đã hủy đơn">Đã hủy đơn</button>
                    </div>
                    <div class="table-responsive" style="max-height: 400px;overflow-y: auto;">
                        <table class="cart-table">
                            <thead class="cart-table-head"
                                style="position: sticky;top: 0;background-color: #f8f9fa; z-index: 1;">
                                <tr class="table-head-row">
                                    <th class="product-image">Mã đơn hàng</th>
                                    <!-- <th class="product-name">Mã khách hàng</th> -->
                                    <th class="product-price">Ngày tạo</th>
                                    <th class="product-quantity">Tổng Giá</th>
                                    <th class="product-quantity">Thuế</th>
                                    <th class="product-quantity">Phí giao hàng</th>
                                    <th class="product-quantity">Thành tiền</th>
                                    <th class="product-quantity">Trạng Thái</th>
                                    <th class="product-quantity">Hình thức</th>
                                    <th class="product-remove">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            while ($row = $result->fetch_assoc()) {
                                // Output order items dynamically
                            ?>
                                <tr class="table-body-row" data-status="<?php echo $row['trangthai']; ?>"
                                    data-hinhthuc="<?php echo $row['hinhthuc']; ?>">
                                    <td class="product-name"><?php echo $row['madh']; ?></td>
                                    <!-- <td class="product-price"><?php echo $row['makh']; ?> </td> -->
                                    <td class="product-name"><?php echo $row['ngaytao']; ?></td>
                                    <td class="product-total">
                                        <?php echo $row['tonggia']; ?> đ


                                    </td>
                                    <td class="product-name"><?php echo $row['thue']; ?></td>
                                    <td class="product-name"><?php echo $row['phigiaohang']; ?></td>
                                    <td class="product-name"><?php echo $row['thanhtien']; ?></td>
                                    <td class="product-name"><?php echo $row['trangthai']; ?></td>
                                    <td class="product-name"><?php echo $row['hinhthuc']; ?></td>

                                    <td class="product-remove">
                                        <button class="btn btn-sm btn-info view-details-btn" data-toggle="modal"
                                            data-target="#orderDetailsModal" data-madh="<?php echo $row['madh']; ?>">Xem
                                            chi tiết
                                        </button>

                                        <?php
                                        // Check the order status before displaying the "Huỷ" button
                                        $excludedStatuses = array('Đã duyệt', 'Đã thanh toán', 'Đã huỷ đơn');
                                        if (!in_array($row['trangthai'], $excludedStatuses)) {
                                        ?>
                                        <button class="btn btn-sm btn-danger view-details-btn" data-toggle="modal"
                                            onclick="cancelOrder(<?php echo $row['madh']; ?>, '<?php echo $row['trangthai']; ?>')">Huỷ
                                        </button>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end cart -->

<!-- Modal for Order Details -->
<!-- Modal for Order Details -->
<div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="orderDetailsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderDetailsModalLabel">Chi tiết đơn hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="orderDetailsContent">
                <!-- Order details will be displayed here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<!-- Add the following JavaScript code for handling the modal -->
<script>
$(document).ready(function() {
    $('.filter-btn').on('click', function() {
        var status = $(this).data('status');
        var paymentMethodFilter = $(this).data('hinhthuc'); // Đã sửa tên thuộc tính

        // Thực hiện bộ lọc
        $('#cart-table tbody tr').hide();

        if (status === 'all') {
            $('#cart-table tbody tr').show();
        } else {
            if (status !== 'Đã hủy đơn') { // Loại trừ trạng thái 'Đã hủy đơn'
                $('#cart-table tbody tr[data-status="' + status + '"]').show();
            }

            if (status === 'Đã thanh toán' && paymentMethodFilter) {
                // Lọc theo cả trạng thái "Đã thanh toán" và phương thức thanh toán
                $('#cart-table tbody tr[data-status="' + status + '"][data-hinhthuc="' +
                    paymentMethodFilter + '"]').show();
            }
        }
    });
});
</script>

<?php
include_once 'footer.php';
?>