<?php
// Kết nối đến database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "petshome";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối database thất bại: " . $conn->connect_error);
}

// Function to count bookings
function countBookings($conn, $ngay, $makg) {
    $query_count = "SELECT COUNT(*) as count FROM datlich1 WHERE ngay = '$ngay' AND makg = '$makg'";
    $result_count = $conn->query($query_count);

    if ($result_count) {
        $row = $result_count->fetch_assoc();
        return $row['count'];
    } else {
        return 0;
    }
}

// Xử lý dữ liệu được gửi từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị từ form
    $loai_dich_vu = $_POST["loai_dich_vu"];
    $dich_vu = $_POST["dich_vu"];
    $makg = $_POST["makg"];
    $ngay = $_POST["ngay"];
    $tenkh = $_POST["tenkh"];
    $sdt = $_POST["sdt"];
    $email = $_POST["email"];

    // Kiểm tra số lần đặt lịch cho ngày và khung giờ hiện tại

    // Fetch makg from khung_gio based on the selected time
    $get_magio_query = "SELECT makg FROM khung_gio WHERE makg = '$makg'";
    $result_magio = $conn->query($get_magio_query);

    if ($result_magio->num_rows > 0) {
        $row_magio = $result_magio->fetch_assoc();
        $makg = $row_magio['makg'];
        $current_datetime = date("Y-m-d");

        // Fetch tenloaidv from loaidichvu based on selected loai_dich_vu
        $get_loaidv_query = "SELECT tenloaidv FROM loaidichvu WHERE maldv = '$loai_dich_vu'";
        $result_loaidv = $conn->query($get_loaidv_query);
        $get_dv_query = "SELECT tendv FROM dichvu WHERE madv = '$dich_vu'";
        $result_dv = $conn->query($get_dv_query);
        $get_gio_query = "SELECT gio FROM khung_gio WHERE makg = '$makg'";
        $result_gio = $conn->query($get_gio_query);

        if ($result_loaidv->num_rows > 0 && $result_dv->num_rows > 0 && $result_gio->num_rows > 0) {
            $row_loaidv = $result_loaidv->fetch_assoc();
            $tenloaidv = $row_loaidv['tenloaidv'];

            $row_dv = $result_dv->fetch_assoc();
            $tendv = $row_dv['tendv'];

            $row_gio = $result_gio->fetch_assoc();
            $gio = $row_gio['gio'];

            $countBookings = countBookings($conn, $ngay, $makg);

            if ($countBookings >= 3) {
                session_start();
                $_SESSION['booking_error'] = "Khung giờ này của ngày này đã kín lịch. Vui lòng chọn ngày hoặc khung giờ khác.";
                header('Location: /qiyshop/dat_lich_spa.php');
                exit();
            } else {
                // Thêm đặt lịch vào CSDL
                $insert_query_datlich = "INSERT INTO datlich1 (madv, makg, tenkh, ngay, sdt, email, ngaytao, trangthai) VALUES ('$dich_vu', '$makg', '$tenkh', '$ngay', '$sdt', '$email', '$current_datetime', 'DaDat')";

                if ($conn->query($insert_query_datlich) === TRUE) {
                    // Nếu câu truy vấn chèn thành công, bạn có thể thực hiện các công việc khác ở đây
                    // Gọi hàm gửi email xác nhận
                    sendConfirmationEmail($email, $tenkh, $ngay, $gio, $tendv, $tenloaidv);

                    // Chuyển hướng với thông báo thành công
                    header('Location: /qiyshop/thank-you-dv.php');
                    exit();
                } else {
                    session_start();
                    $_SESSION['booking_error'] = "Lỗi chèn dữ liệu vào datlich1: " . $conn->error;
                    header('Location: /qiyshop/dat_lich_spa.php');
                    exit();
                }
            }
        } else {
            echo "Không tìm thấy thông tin loại dịch vụ tương ứng trong cơ sở dữ liệu.";
        }
    } else {
        echo "Không tìm thấy khung giờ tương ứng trong cơ sở dữ liệu.";
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Hàm gửi email xác nhận
function sendConfirmationEmail($email, $tenkh, $ngay, $gio, $tendv, $tenloaidv) {
    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Điền thông tin SMTP của bạn
        $mail->SMTPAuth = true;
        $mail->Username = 'pethomemart@gmail.com';  // Điền email của bạn
        $mail->Password = 'ijmhgemdmdadopxu';  // Điền mật khẩu email của bạn
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('pethomemart@gmail.com', 'QiyShop');
        $mail->addAddress($email, $tenkh);

        // Thiết lập nội dung email
        $mail->isHTML(true);
        $mail->Subject = 'Xác nhận đặt lịch dịch vụ thú cưng';
        $mail->Body    = "Chào bạn, $tenkh! <br><br>
                        Bạn đã đặt lịch dịch vụ thú cưng thành công với thông tin sau: <br><br>
                        - Dịch vụ: $tenloaidv - $tendv<br>
                        - Ngày: $ngay vào lúc $gio <br><br>
                        Cảm ơn bạn đã đặt lịch dịch vụ của chúng tôi!";

        $mail->send();
        echo 'Email xác nhận đã được gửi thành công!';
    } catch (Exception $e) {
        echo "Gửi email xác nhận thất bại. Chi tiết lỗi: {$mail->ErrorInfo}";
    }
}

// Đóng kết nối database
$conn->close();