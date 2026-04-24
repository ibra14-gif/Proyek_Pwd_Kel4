<?php
require_once 'koneksi.php';

define('ADMIN_USER', 'admin');
define('ADMIN_PASS', 'admin123');

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == ADMIN_USER && $password == ADMIN_PASS) {
    $_SESSION['login'] = true;
    header("Location: dashboard.php");
    exit;
} else {
    header("Location: login-admin.php?error=1");
    exit;
}

?>