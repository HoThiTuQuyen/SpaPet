<?php
   
//    include_once 'header.php';
//     include_once("../qiyshop/services/connect.php");
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



    // Hàm gửi email
    function sendConfirmationEmail($name, $email) {
        // Use PHPMailer to send a confirmation email
        require '../PHPMailer/src/Exception.php';
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';
    
        $mail = new PHPMailer(true);
    $mail -> CharSet = 'UTF-8';
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
            $mail->setFrom('pethome@gmail.com', 'QiyShop');  // Replace with your name and email
            $mail->addAddress($email, $name);
    
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Xác nhận đăng ký tài khoản!';
            $mail->Body = "Hello $name,<br><br>Cảm ơn bạn đã đăng ký tại trang wweb của chúng tôi. Tài khoản của bạn đã được tạo thành công. Hãy đăng nhập và trải nghiệm.";
    
            $mail->send();
        } catch (Exception $e) {
            echo "Confirmation email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    
?>