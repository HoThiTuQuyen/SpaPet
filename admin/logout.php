<?php

session_start();
// unset($_SESSION['name']);
// unset($_SESSION['level']);
session_destroy();
header('Location:../admin/login.php')





?>