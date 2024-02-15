<?php
    include_once 'header.php';
    include_once("../qiyshop/services/connect.php");


?>


<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg dichvu">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">

            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- login -->

<div class="login">
    <div class="from_container">
        <!-- <i class="ri-close-line form_close"></i> -->
        <!-- login form -->

        <div class="form login_form">

            <form action="../qiyshop/reset_password/forgot_pw.php" method="post">
                <h3>Quên mật khẩu</h3>

                <div class="input_box">
                    <input type="email" name="email" placeholder="Email" />
                    <i class="ri-mail-line email"></i>
                </div>
                <!-- <div class="input_box">
                    <input type="password" name="matkhau" placeholder="Mật khẩu" />
                    <i class="ri-lock-2-line password"></i>
                    <i class="ri-eye-off-line pw_hide"></i>
                </div> -->

                <div class="option_field">
                    <!-- <span class="checkbox">
                        <input type="checkbox" id="check">
                        <label for="check">Nhớ mật khẩu</label>
                    </span> -->
                    <p href="#" class="">Nhập mail để lấy mật khẩu</p>
                </div>

                <button type="submit" class="button_login" name="login">Gửi</button>

                <div class="login_signup"> Bạn chưa có tài khoản? <a href="register.php" id="signup">Đăng ký</a> </div>

            </form>

        </div>

    </div>


</div>

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
        title: 'Sai tài khoản hoặc mật khẩu'
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
        title: 'Chưa nhập tài khoản hoặc mật khẩu'
      })</script>";
      
    }else{
      echo "";
    }
  }
  

?>









<?php
    include_once 'footer.php';
?>