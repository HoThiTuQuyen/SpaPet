<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "petshome";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối database thất bại: " . $conn->connect_error);
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Gửi email
    $mail = new PHPMailer(true);

    try {
        // Cài đặt SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'pethomemart@gmail.com'; // Thay đổi thành địa chỉ email của bạn
        $mail->Password = 'ijmhgemdmdadopxu'; // Thay đổi thành mật khẩu email của bạn
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Người nhận
        $mail->setFrom($email, $name);
        $mail->addAddress('pethomemart@gmail.com', 'QiyShop');

        // Nội dung email
        $mail->isHTML(true);
        $mail->Subject = "Câu hỏi QiyShop: $subject";
        $mail->Body = "Cảm ơn bạn đã đặt câu hỏi. Chúng tôi sẽ trả lời sớm nhất có thể. Vui lòng đợi!<br><br>
            Nội dung: $message <br><br>
            Số điện thoại: $phone.";

        $mail->send();
        echo 'Email xác nhận đã được gửi thành công!';
    } catch (Exception $e) {
        echo "Gửi email xác nhận thất bại. Chi tiết lỗi: {$mail->ErrorInfo}";
    }
} else {
    echo "Yêu cầu không hợp lệ!";
}

?>