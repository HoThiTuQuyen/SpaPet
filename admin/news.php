<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Blog thú cưng</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                            Thêm
                        </button>
                        <br></br>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mã bài viết</th>
                                    <th>Ngày đăng</th>
                                    <th>Tài khoản đăng</th>
                                    <th>Loại bài viết</th>
                                    <th>Tên bài viết</th>
                                    <th>Ảnh</th>
                                    <th>Tóm tắt</th>

                                    <th>Nội dung</th>
                                    <th>Hành động</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                        $query = mysqli_query($conn,"SELECT * FROM news");
                                        while ($mhs = mysqli_fetch_array($query))
                                        {
                                            
                                ?>
                                <tr>

                                    <td><?php echo $mhs['manews']?></td>
                                    <td><?php echo $mhs['ngaydang']?></td>
                                    <td><?php echo gettk($mhs['id'], $conn)?></td>
                                    <td><?php echo $mhs['loai']?></td>
                                    <td><?php echo $mhs['tieude']?></td>
                                    <td><img src="assets/image/image_news/<?php echo $mhs['image_news'];?>"
                                            style="padding-left: 20px;" width="100" alt=""></td>
                                    <td><?php echo substr($mhs['tomtat'], 0, 30); ?>...</td>

                                    <td><?php echo substr($mhs['noidung'], 0, 40); ?>...</td>


                                    <td><a onclick="hapus_data('<?php echo $mhs['manews'];?>')"
                                            class="btn btn-sm btn-danger">Xóa</a>

                                        <a href="index.php?page=edit_news&&manews=<?php echo $mhs['manews'];?>"
                                            class="btn btn-sm btn-success">Sửa</a>

                                    </td>
                                </tr>
                                <?php 
                                }
                                ?>
                                <?php
                                
                                
                                // Hàm để lấy tên tài khoản
                                function gettk($accountId, $conn) {
                                    $query = mysqli_query($conn, "SELECT name FROM tb_admin WHERE id = '$accountId'");
                                    $result = mysqli_fetch_assoc($query);
                                    return $result['name'];
                                }
                                ?>
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
                <h4 class="modal-title">Blog</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- them data user -->
            <form method="post" action="../admin/add/add_news.php" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-row" style="margin-bottom: 20px;">
                        <div class="col">
                            <label>Ngày nhập:</label>

                            <input type="text" class="form-control" name="ngaydang"
                                value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
                        </div>
                        <div class="col">
                            <label>Tài khoản:</label>

                            <select name="maNguoiQuanLy" class="form-control">
                                <?php
                            // Truy vấn mã người quản lý từ bảng tb_admin
                            $sqlAdmin = "SELECT id, name FROM tb_admin";
                            $resultAdmin = $conn->query($sqlAdmin);

                            // Hiển thị danh sách mã người quản lý trong dropdown
                            if ($resultAdmin->num_rows > 0) {
                                while ($rowAdmin = $resultAdmin->fetch_assoc()) {
                                    echo "<option value='" . $rowAdmin['id'] . "'>" . $rowAdmin['name'] . "</option>";
                                }
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col">
                            <label>Loại bài viết:</label>
                            <select class="form-control" name="loai_bai_viet">
                                <option selected>Chọn loại bài viết</option>
                                <option value="Chó cảnh">Chó cảnh</option>
                                <option value="Mèo cảnh">Mèo cảnh</option>
                                <option value="Thú cưng khác">Thú cưng khác</option>
                            </select>
                        </div>

                        <div class="col">
                            <label>Tiêu đề</label>
                            <input type="text" class="form-control" placeholder="Tiêu đề" name="tieude">
                        </div>

                    </div>
                    <div class="form-row" style="margin-bottom: 20px;">
                        <div class="col">
                            <label>Tóm tắt:</label>
                            <input type="text" class="form-control" placeholder="Tóm tắt" name="tomtat">
                        </div>
                        <div class="col">
                            <label>Ảnh:</label>
                            <input type="file" name='photo' class="form-control " id="customFile">
                        </div>


                    </div>
                    <div class="form-row" style="margin-bottom: 20px;">
                        <div class="col" style="max-height: 300px; overflow-y: auto;">
                            <label>Nội dung:</label>
                            <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
                        </div>
                        <input type="hidden" name="noi_dung" id="hiddenEditorContent">
                    </div>

                    <script>
                    ClassicEditor
                        .create(document.querySelector('#editor1'))
                        .then(editor => {
                            editor.model.document.on('change:data', () => {
                                document.getElementById('hiddenEditorContent').value = editor.getData();
                            });
                        })
                        .catch(error => {
                            console.error(error);
                        });
                    </script>

                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Thêm bài viết</button>
                </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- model view data -->
<div class="modal fade" id="modal-view">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chi tiết</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="get" action="../admin/add/add_nha_cung_cap.php">
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col">
                            <b>Mã NCC:</b> <span id="mancc"></span>
                        </div>

                        <div class="col">
                            <b>Tên NCC:</b> <span id="tenncc"></span>
                        </div>
                        <div class="col">
                            <b>Địa chỉ:</b> <span id="diachi"></span>
                        </div>
                        <div class="col">
                            <b>Số điện thoại:</b> <span id="sdt"></span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
                    <!-- <button type="submit" class="btn btn-primary">Lưu</button> -->
                </div>
            </form>
        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<!-- vid 11 -->
<script>
function hapus_data(manews) {
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
            window.location.href = "../admin/delete/delete_news.php?manews=" + manews;
        }
    });
}
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
  