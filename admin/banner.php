<?php
    include_once("../admin/services/connect.php");
    $sql = mysqli_query($conn, "SELECT madh,
    (SELECT COUNT(madh) FROM donhang WHERE trangthai='Đang duyệt') AS tc,
    (SELECT COUNT(madh) FROM donhang WHERE trangthai='Đã hủy đơn') AS dh,
    (SELECT COUNT(madh) FROM donhang WHERE trangthai='Đã duyệt') AS dd_duyet,
    (SELECT COUNT(madh) FROM donhang WHERE trangthai='Đã thanh toán') AS dd_thanh_toan,
    (SELECT COUNT(madh) FROM donhang WHERE trangthai='Đã duyệt' OR trangthai='Đã thanh toán') AS dd_tong
    FROM donhang");
    $result = mysqli_fetch_array($sql);

    // -------
    $sql1 =mysqli_query($conn,"SELECT makh,
    (SELECT COUNT(makh) FROM khachhang ) AS kh
    FROM khachhang") ;
    $result1 = mysqli_fetch_array($sql1); 
//---------

    $sqlRevenue = mysqli_query($conn, "SELECT SUM(thanhtien) AS temporary_revenue FROM donhang");
    $resultRevenue = mysqli_fetch_array($sqlRevenue);
    $temporaryRevenue = $resultRevenue['temporary_revenue'];

//--------

    $sqlRevenue1 = mysqli_query($conn, "SELECT SUM(thanhtien) AS temporary_revenue1 FROM donhang WHERE trangthai = 'Đã thanh toán'");
    $resultRevenue1 = mysqli_fetch_array($sqlRevenue1);
    $temporaryRevenue1 = $resultRevenue1['temporary_revenue1'];
//----------
     
    $sqlProfit = mysqli_query($conn, "SELECT SUM(dh.tonggia - dh.tonggia_nhap) AS total_profit
    FROM chitiet_donhang dh");

    $resultProfit = mysqli_fetch_array($sqlProfit);
    $totalProfit = $resultProfit['total_profit'];

    


 
 
 

?>


<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?php echo $result['dd_tong'] ?></h3>
            <p>Số đơn đã thanh toán + đã duyệt</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
        <div class="inner">
            <h3><?php echo $result1['kh'] ?></h3>

            <p>Số lượng tài khoản</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ... (other small boxes) -->

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3><?php echo number_format($temporaryRevenue); ?>,000</h3>
            <p>Doanh thu tạm thời</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3><?php echo number_format($temporaryRevenue1); ?>,000</h3>
            <p>Doanh thu thực tế</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ... (other small boxes) -->
<div class="col-lg-3 col-6">
    <div class="small-box bg-primary">
        <div class="inner">
            <h3><?php echo number_format($totalProfit); ?>,000</h3>
            <p>Lợi nhuận tạm thời</p>
        </div>
        <div class="icon">
            <i class="ion ion-cash"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6">
    <div class="small-box bg-danger">
        <div class="inner">
            <h3><?php echo $result['dh'] ?></h3>
            <p>Đơn hàng hủy</p>
        </div>
        <div class="icon">
            <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->