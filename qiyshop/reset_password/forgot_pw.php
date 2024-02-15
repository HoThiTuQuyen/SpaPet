<?php
// include_once('../services/connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    if (empty($email)) {
        // Handle case when email is not provided
        header("Location: ../forgot_pw.php?error=2");
        exit();
    }

    $resetToken = bin2hex(random_bytes(16));
    $resetTokenHash = hash("sha256", $resetToken);

    $resetExpiryTime = date("Y-m-d H:i:s", time() + 60 * 30); // Token expires in 30 minutes

    $mysqli = include __DIR__ . '/../services/connect.php';

    $sql = "UPDATE khachhang
            SET reset_mk = ?,
                time_reset = ?
            WHERE email = ?";

$stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss", $resetTokenHash, $resetExpiryTime, $email);

    $stmt->execute();

    if ($mysqli->affected_rows) {
        // Send email with the reset link
        $mail = include __DIR__ . "mail.php";

        $mail->setFrom("pethome@gmail.com");
        $mail->addAddress($email);
        $mail->Subject = "Password Reset";
        $mail->Body = <<<END
        Click <a href="http://qiyshop/reset-password.php?token=$resetTokenHash">here</a> 
        to reset your password.
        END;

        try {
            $mail->send();
            // Redirect to a success page
            header("Location: ../forgot_paw.php?success=1");
            exit();
        } catch (Exception $e) {
            // Handle error sending email
            header("Location: ../forgot_pw.php?error=3");
            exit();
        }
    } else {
        // Handle case when email is not found in the database
        header("Location: ../forgot_pw.php?error=4");
        exit();
    }
} else {
    // Handle case when the form is not submitted using POST method
    header("Location: ../reset_password.php");
    exit();
}
?>