<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once '../services/connect.php';

function isEmailExists($email) {
    global $conn;

    $stmt = $conn->prepare("SELECT COUNT(*) FROM khachhang WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    return $count > 0;
}

function registerUser($name, $email, $password) {
    global $conn;

    // Check if email already exists
    if (isEmailExists($email)) {
        // Email already exists, display an error message or handle it as needed
        $errorMessage = 'Email đã tồn tại';
        header("Location: ../register.php" );
        return false;
    }

    // Insert user data into the database
    $stmt = $conn->prepare("INSERT INTO khachhang (tenkh, email, matkhau) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);  // Pass the password directly

    if ($stmt->execute()) {
        // Registration successful
        sendConfirmationEmail($name, $email); // Send confirmation email
        return true;
    } else {
        // Registration failed
        return false;
    }
}

function sendConfirmationEmail($name, $email) {
    // Use PHPMailer to send a confirmation email
    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Replace with your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'pethomemart@gmail.com';  // Replace with your email
        $mail->Password = 'ijmhgemdmdadopxu';  // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('pethomemart@gmail.com', 'QiyShop');  // Replace with your name and email
        $mail->addAddress($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Xác nhận đăng ký tài khoản!';
        $mail->Body = "Hello $name,<br><br>Cảm ơn bạn đã đăng ký tại trang web của chúng tôi.<br><br> Tài khoản của bạn đã được tạo thành công. <br><br>Hãy đăng nhập và trải nghiệm.";

        $mail->send();
    } catch (Exception $e) {
        echo "Confirmation email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $confirmPassword = $_POST['cpass'];

    // Validate form data
    // Add your validation logic here (e.g., check if email is valid, passwords match, etc.)

    // Example: Check if passwords match
    if ($password !== $confirmPassword) {
        $passwordMatchError = "Mật khẩu không khớp";
    } else {
        // Call the registerUser function
        if (registerUser($name, $email, $password)) {
            // Registration successful, redirect to a success page
            header("Location: ../login.php");
            exit();
        } else {
            // Registration failed, display an error message
            echo 'mật khẩu không trùng khớp';
        }
    }
}
?>