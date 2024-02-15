<?php
// Kết nối đến database
include_once("./services/connect.php");



?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thông Tin Ngày _ Giờ </h3>
                    </div>

                    <div class="card-body">
                        <div class="row" style="margin-bottom:20px;">
                            <div class="col-md-6">
                                <!-- Form Thêm mới Ngày -->
                                <form method="post" action="../admin/add/add_gio.php">
                                    <div class="form-group">
                                        <label for="gio">Giờ:</label>
                                        <input type="text" class="form-control" name="gio" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Thêm mới giờ</button>
                                </form>
                            </div>
                        </div>
                        <table id="summaryTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mã giờ</th>
                                    <th>Giờ</th>

                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                    $query = mysqli_query($conn,"SELECT * FROM khung_gio");
                                    while ($row = mysqli_fetch_array($query)){
                                            
                                ?>
                                <tr>

                                    <td><?php echo $row['makg']?></td>
                                    <td><?php echo $row['gio']?></td>


                                    <td><a onclick="hapus_data('<?php echo $row['makg'];?>')"
                                            class="btn btn-sm btn-danger">Xóa</a>

                                        <a href="index.php?page=edit_gio&&makg=<?php echo $row['makg'];?>"
                                            class="btn btn-sm btn-success">Sửa</a>

                                    </td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<script>
function hapus_data(makg) {
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
            window.location.href = "../admin/delete/delete_data_danhmuc.php?mangay=" + makg;
        }
    });
}
</script>
<!-- /.modal -->
<!-- model view data -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/fullcalendar/main.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
-->
<!-- 
<script>
$(document).ready(function() {
    $('#example1').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true,
        "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script> -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<!-- vid 11 -->