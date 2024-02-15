<?php
   include_once 'header.php';
   include_once '../qiyshop/services/connect.php';
  
   function isEmailRegistered($email) {
    global $conn;

    $stmt = $conn->prepare("SELECT COUNT(*) FROM khachhang WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    return $count > 0;
}
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

        <!-- Dang Ky -->
        <div class="form signup_form">
            <form enctype="multipart/form-data" action="actions/action_register.php" method="post">

                <h3>Đăng ký</h3>
                <div class="input_box">
                    <input type="name" name="name" placeholder="Tên Người Dùng" required />
                    <i class="ri-user-line name"></i>

                </div>

                <div class="input_box">
                    <input type="email" name="email" placeholder="Email" required />
                    <i class="ri-mail-line email"></i>

                </div>
                <div class="input_box">
                    <input type="password" name="pass" placeholder="Mật khẩu" required />
                    <i class="ri-lock-2-line password" onclick="togglePasswordVisibility('pass', 'pw_hide')"></i>
                    <i class="ri-eye-off-line pw_hide"></i>

                </div>
                <div class="input_box">
                    <input type="password" name="cpass" placeholder="Nhập lại mật khẩu" required />
                    <i class="ri-lock-2-line password" onclick="togglePasswordVisibility('cpass', 'cpw_hide')"></i>
                    <i class="ri-eye-off-line cpw_hide"></i>
                </div>



                <button class="button_login" name="submit">Đăng ký</button>

                <div class="login_signup"> Bạn đã có tài khoản? <a href="login.php" id="signup">Đăng nhập</a>
                </div>


            </form>
        </div>


    </div>


</div>


<script>
document.addEventListener("DOMContentLoaded", function() {
    // Lấy các phần tử cần thiết
    var passwordInput = document.querySelector('input[name="pass"]');
    var confirmPasswordInput = document.querySelector('input[name="cpass"]');
    var passwordIcon = document.querySelector('.pw_hide');
    var confirmPasswordIcon = document.querySelector('.cpw_hide'); // Define confirmPasswordIcon

    // Sự kiện click cho biểu tượng mật khẩu
    passwordIcon.addEventListener('click', function() {
        // Thay đổi kiểu của trường input mật khẩu
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordIcon.classList.remove('ri-eye-off-line');
            passwordIcon.classList.add('ri-eye-line');
        } else {
            passwordInput.type = 'password';
            passwordIcon.classList.remove('ri-eye-line');
            passwordIcon.classList.add('ri-eye-off-line');
        }
    });

    // Sự kiện click cho biểu tượng mật khẩu xác nhận
    confirmPasswordIcon.addEventListener('click', function() {
        // Thay đổi kiểu của trường input mật khẩu xác nhận
        if (confirmPasswordInput.type === 'password') {
            confirmPasswordInput.type = 'text';
            confirmPasswordIcon.classList.remove('ri-eye-off-line');
            confirmPasswordIcon.classList.add('ri-eye-line');
        } else {
            confirmPasswordInput.type = 'password';
            confirmPasswordIcon.classList.remove('ri-eye-line');
            confirmPasswordIcon.classList.add('ri-eye-off-line');
        }
    });
});
</script>

</script>

<?php
    include_once 'footer.php';
?>