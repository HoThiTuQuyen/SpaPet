<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Quản lý đơn hàng</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                            Thêm
                        </button> -->


                        <div class="mb-3">
                            <button class="btn btn-primary filter-btn" data-status="all">Tất cả</button>
                            <button class="btn btn-info filter-btn" data-status="Đang duyệt">Đang duyệt</button>
                            <button class="btn btn-success filter-btn" data-status="Đã duyệt">Đã duyệt</button>
                            <button class="btn btn-secondary filter-btn" data-status="Đã thanh toán">Đã thanh
                                toán</button>
                            <button class="btn btn-danger filter-btn" data-status="Đã hủy đơn">Đã hủy đơn</button>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Mã KH</th>
                                    <th>Ngày tạo đơn</th>
                                    <th>Tổng giá nhập</th>
                                    <th>Tổng giá bán</th>
                                    <th>Tổng đơn</th>
                                    <th>Sđt</th>
                                    <th>Địa chỉ</th>
                                    <th>Trạng thái</th>
                                    <th>Hình thức thanh toán</th>
                                    <!-- #region -->
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include_once("./services/connect.php");

                                    $query = mysqli_query($conn, "SELECT DISTINCT donhang.madh, donhang.makh, donhang.ngaytao, donhang.tonggia_nhap, donhang.tonggia, donhang.thanhtien, donhang.trangthai, donhang.hinhthuc, khachhang.tenkh, khachhang.sdt, khachhang.diachi
                                    FROM donhang 
                                    INNER JOIN chitiet_donhang ON donhang.madh = chitiet_donhang.madh
                                    INNER JOIN khachhang ON donhang.makh = khachhang.makh
                                    ORDER BY donhang.ngaytao DESC");



   
                                while ($mhs = mysqli_fetch_array($query)) {
                                ?>
                                <tr data-status="<?php echo $mhs['trangthai']; ?>"
                                    data-hinhthuc="<?php echo $mhs['hinhthuc']; ?>">
                                    <td><?php echo $mhs['madh']; ?></td>
                                    <td><?php echo $mhs['tenkh']; ?></td>
                                    <td><?php echo $mhs['ngaytao']; ?></td>
                                    <td><?php echo $mhs['tonggia_nhap']; ?></td>
                                    <td><?php echo $mhs['tonggia']; ?></td>
                                    <td><?php echo $mhs['thanhtien']; ?></td>
                                    <td><?php echo $mhs['sdt']; ?></td>
                                    <td><?php echo $mhs['diachi']; ?></td>
                                    <td><?php echo $mhs['trangthai']; ?></td>
                                    <td><?php echo $mhs['hinhthuc']; ?></td>
                                    <td>
                                        <a onclick="hapus_data('<?php echo $mhs['madh']; ?>')"
                                            class="btn btn-sm btn-danger">Xóa</a>

                                        <?php if ($mhs['trangthai'] != 'Đã hủy đơn') { ?>
                                        <button class="btn btn-sm btn-danger view-details-btn" data-toggle="modal"
                                            onclick="cancelOrder('<?php echo $mhs['madh']; ?>', '<?php echo $mhs['trangthai']; ?>')">Huỷ</button>
                                        <?php } ?>

                                        <!-- <a class="view-data-dh btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#orderDetailsModal" data-madh="<?php echo $row['madh']; ?>">Chi
                                            Tiết</a> -->
                                        <a class="btn btn-sm btn-info view-data-dh" data-toggle="modal"
                                            data-target="#orderDetailsModal" data-madh="<?php echo $mhs['madh']; ?>">Xem
                                            chi tiết
                                        </a>

                                        <!-- <a class="view-data-dh btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modal-view" data-madh="<?php echo $mhs['madh']?>"
                                            data-tensp="<?php echo $mhs['tensp']?>"
                                            data-soluong="<?php echo $mhs['soluong']?>"
                                            data-giaban="<?php echo $mhs['giaban']?>"
                                            data-tonggia="<?php echo $mhs['tonggia']?>">Chi
                                            Tiết
                                        </a> -->

                                        <?php if ($mhs['trangthai'] == 'Đang duyệt') { ?>
                                        <!-- Display the "Duyệt đơn hàng" button -->
                                        <button class="btn btn-sm btn-info"
                                            onclick="duyet_don_hang('<?php echo $mhs['madh']; ?>')">Duyệt đơn
                                            hàng</button>
                                        <?php } elseif ($mhs['trangthai'] == 'Đã duyệt' || $mhs['trangthai'] == 'Đã thanh toán' || $mhs['trangthai'] == 'Đã hủy đơn') { ?>
                                        <!-- Display the "Xuất hoá đơn" button for "Đã duyệt", "Đã thanh toán", and "Đã hủy đơn" statuses -->
                                        <a href="invoice.php?madh=<?php echo $mhs['madh']; ?>"
                                            class="btn btn-sm btn-success">In hoá đơn</a>
                                        <?php } ?>
                                    </td>

                                </tr>
                                <?php } ?>


                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>



                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- them data user -->
            <form method="post" action="../admin/add/add_data_sanpham.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-3" placeholder="Mã sản phẩm" name="masp">
                            <input type="text" class="form-control mb-3" placeholder="Tên sản phẩm" name="tensp">
                            <input type="file" name='photo' class="form-control mb-3" id="customFile">
                            <select class="custom-select mb-3" name="math">
                                <option selected>Chọn thương hiệu</option>
                                <?php  
                                $query = mysqli_query($conn, "SELECT * FROM thuonghieu");
                                while ($mhs = mysqli_fetch_array($query)) {
                                    echo '<option value="' . $mhs['math'] . '">' . $mhs['tenth'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="custom-select mb-3" name="madmphu">
                                <option selected>Chọn danh mục</option>
                                <?php  
                                $query = mysqli_query($conn, "SELECT * FROM dmphu");
                                while ($mhs = mysqli_fetch_array($query)) {
                                    echo '<option value="' . $mhs['madmphu'] . '">' . $mhs['tendmphu'] . '</option>';
                                }
                                ?>
                            </select>
                            <input type="text" class="form-control mb-3" placeholder="Phân loại" name="phanloai">
                            <input type="text" class="form-control mb-3" placeholder="Giá bán" name="giaban">

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<div class="modal fade" id="orderDetailsModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chi Tiết Đơn Hàng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Nội dung chi tiết đơn hàng sẽ được hiển thị ở đây -->
                <div id="orderDetailsContent"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<!-- vid 11 -->
<script>
$(document).ready(function() {
    // Handle the click event of "Chi Tiết" button
    $('.view-data-dh').on('click', function() {
        var madh = $(this).data('madh');

        // Make an AJAX request to fetch the order details
        $.ajax({
            type: 'POST',
            url: 'add/get_order_details.php',
            data: {
                madh: madh
            }, // Ensure 'madh' is sent correctly
            success: function(response) {
                // Hiển thị thông tin chi tiết đơn hàng trong modal
                $('#orderDetailsContent').html(response);
                // Hiển thị modal
                $('#orderDetailsModal').modal('show');
            }
        });
    });
});

function hapus_data(madh) {
    // Show a confirmation dialog using SweetAlert2
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa không?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "../admin/delete/delete_donhang.php?madh=" + madh;
        }
    });
}
</script>
<script>
function duyet_don_hang(madh) {
    // Show a confirmation dialog using SweetAlert2
    Swal.fire({
        title: 'Bạn có chắc chắn muốn duyệt đơn hàng?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Duyệt',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, send an AJAX request to update the order status
            $.ajax({
                type: 'POST',
                url: 'trangthai_donhang.php', // Replace with the actual server-side script
                data: {
                    madh: madh,
                    action: 'duyet_don_hang'
                },
                success: function(response) {
                    // Handle the response if needed
                    // For example, you can reload the page or update the UI
                    location.reload();
                }
            });
        }
    });
}

function cancelOrder(orderId, orderStatus) {
    //Kiểm tra trạng thái đơn hàng
    if (orderStatus === 'Đã thanh toán') {
        // Hiển thị thông báo
        showToast('Không thể huỷ đơn đã thanh toán.');
        return;
    }

    // Hiển thị hộp thoại xác nhận
    if (confirm("Bạn có chắc chắn muốn huỷ đơn hàng này không?")) {
        // Gửi yêu cầu AJAX để cập nhật trạng thái
        $.ajax({
            type: 'POST',
            url: 'trangthai_donhang.php', // Đường dẫn đến tệp PHP xử lý yêu cầu
            data: {
                madh: orderId,
                action: 'huy_don_hang' // Thêm một hành động mới để xác định là huỷ đơn hàng
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

$(document).ready(function() {
    $('.filter-btn').on('click', function() {
        var status = $(this).data('status');

        // Perform filtering
        $('#example1 tbody tr').hide();
        if (status === 'all') {
            $('#example1 tbody tr').show();
        } else {
            $('#example1 tbody tr[data-status="' + status + '"]').show();
        }
    });
});
</script>



<?php
  if(isset ($_GET['error'])){
    $x =($_GET['error']);
    if($x==1){
      echo "
      <script>
      var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 2000
      });
      Toast.fire({
        icon: 'warning',
        title: 'Danh mục đã có'
      })</script>";
      
    }
    else if($x==2){
      echo "
      <script>
      var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 2000
      });
      Toast.fire({
        icon: 'warning',
        title: 'Hãy nhập đầy đủ thông tin'
      })</script>";
      
    }else{
      echo "";
    }
  }
  