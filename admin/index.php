<?php
include_once('header.php');
include_once('services/connect.php');
session_start();

if (!isset($_SESSION["username"])) {
    header('Location:../admin/login.php');
    exit();
}

foreach ($_POST as $value) {
    // Xử lý từng giá trị trong $_POST
    // $value sẽ chứa giá trị hiện tại từ mảng $_POST
    // Bạn có thể thực hiện bất kỳ xử lý nào ở đây dựa trên yêu cầu của mình
    echo $value;
}
?>




<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <?php include_once('preloader.php')?>
        <!-- Navbar -->
        <?php include_once('navbar.php') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <?php include_once('logo.php')?>

            <!-- Sidebar -->
            <?php include_once('sidebar.php')?>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php include_once('content_header.php') ?>
            <!-- /.content-header -->

            <!-- Main content -->
            <?php 
            if(isset($_GET['page'])){
                if($_GET['page']=='dashboard'){
                    include_once('dashboard.php');
                }
                else if($_GET['page']=='thongke_ngay'){
                    include_once('thongke_ngay.php');
                }
                else if($_GET['page']=='thongke_thang'){
                    include_once('thongke_thang.php');
                }
                else if($_GET['page']=='chart'){
                    include_once('chartjs.php');
                }
                else if($_GET['page']=='admin'){
                    include_once('data_admin.php');
                }
                else if($_GET['page']=='khachhang'){
                    include_once('data_khachhang.php');
                }
                else if($_GET['page']=='edit_khachhang'){
                    include_once('../admin/update/edit_khachhang.php');
                }
                else if($_GET['page']=='donhang'){
                    include_once('data_donhang.php');
                }
                else if($_GET['page']=='edit_donhang'){
                    include_once('../admin/update/edit_donhang.php');
                }
                else if($_GET['page']=='ngay_gio'){
                    include_once('data_ngay_gio.php');
                }
                else if($_GET['page']=='edit_ngay'){
                    include_once('../admin/update/edit_ngay.php');
                }
                else if($_GET['page']=='edit_gio'){
                    include_once('../admin/update/edit_gio.php');
                }
                else if($_GET['page']=='lich_spa'){
                    include_once('data_lich_spa.php');
                }
                else if($_GET['page']=='edit_lich_spa'){
                    include_once('../admin/update/edit_lich_spa.php');
                }
                else if($_GET['page']=='danhmuc'){
                    include_once('data_danhmuc.php');
                }
                else if($_GET['page']=='edit_data'){
                    include_once('../admin/update/edit_data.php');
                }
                else if($_GET['page']=='edit_data_danhmuc'){
                    include_once('../admin/update/edit_data_danhmuc.php');
                }
                else if($_GET['page']=='danhmucchinh'){
                    include_once('data_danhmuc_chinh.php');
                }
                else if($_GET['page']=='thuonghieu'){
                    include_once('data_thuonghieu.php');
                }
                else if($_GET['page']=='sanpham'){
                    include_once('data_sanpham.php');
                }
                else if($_GET['page']=='edit_data_sanpham'){
                    include_once('../admin/update/edit_data_sanpham.php');
                }
                else if($_GET['page']=='mota_sanpham'){
                    include_once('data_mota_sanpham.php');
                }
                else if($_GET['page']=='edit_mota_sanpham'){
                    include_once('../admin/update/edit_mota_sanpham.php');
                }
                else if($_GET['page']=='edit_data_thuonghieu'){
                    include_once('../admin/update/edit_data_thuonghieu.php');
                }
                else if($_GET['page']=='edit_data_danhmuc_chinh'){
                    include_once('../admin/update/edit_data_danhmuc_chinh.php');
                }
                else if($_GET['page']=='danhmucphu'){
                    include_once('data_danhmuc_phu.php');
                }
                else if($_GET['page']=='edit_data_danhmuc_phu'){
                    include_once('../admin/update/edit_data_danhmuc_phu.php');
                }
                else if($_GET['page']=='hoadon'){
                    include_once('../admin/invoice.php');
                }
                else if($_GET['page']=='nha_cung_cap'){
                    include_once('../admin/nha_cung_cap.php');
                }
                else if($_GET['page']=='edit_nha_cung_cap'){
                    include_once('../admin/update/edit_nha_cung_cap.php');
                }
                else if($_GET['page']=='phieu_nhap_kho'){
                    include_once('../admin/phieu_nhap_kho.php');
                }
                else if($_GET['page']=='phieu_xuat_kho'){
                    include_once('../admin/phieu_xuat_kho.php');
                }
                else if($_GET['page']=='ton_kho'){
                    include_once('../admin/ton_kho.php');
                }
                else if($_GET['page']=='news'){
                    include_once('../admin/news.php');
                }
                else if($_GET['page']=='edit_news'){
                    include_once('../admin/update/edit_news.php');
                }
                else if($_GET['page']=='dichvu'){
                    include_once('../admin/data_dichvu.php');
                }   
                else if($_GET['page']=='edit_dichvu'){
                    include_once('../admin/update/edit_dichvu.php');
                }  
                else if($_GET['page']=='loaidichvu'){
                    include_once('../admin/data_loaidichvu.php');
                } 
                else if($_GET['page']=='edit_loaidichvu'){
                    include_once('../admin/update/edit_loaidichvu.php');
                }   
                else if($_GET['page']=='don_dv_spa'){
                    include_once('../admin/don_dv_spa.php');
                } 
                else if($_GET['page']=='phanloaisp'){
                    include_once('../admin/data_phanloaisp.php');
                }     
                else{
                    include_once('not_found.php');
                }
                
            }
            else{
                include_once('dashboard.php');
            }
            ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include_once('footer.php')?>

</body>


</html>