<?php
// In your update_profile.php or wherever the form is submitted
if (isset($_POST['logout'])) {
    // Destroy the session
    session_start();
    session_destroy();

    // Redirect to the login page
    header("Location: ../login.php");
    exit();
}
if (isset($_POST['qldh'])) {
    // Destroy the session
  

    // Redirect to the login page
    header("Location: ../quanlydonhang.php");
    exit();
}
?>