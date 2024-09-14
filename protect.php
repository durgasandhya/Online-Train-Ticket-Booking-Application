<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['redirect_to'] = basename($_SERVER['PHP_SELF']);
    echo "user is not logged in.";
    header("Location: login_page.php");
    exit;
}
?>