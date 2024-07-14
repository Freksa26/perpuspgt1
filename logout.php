<?php
include("conn.php");
session_start();

$user_id = $_SESSION['user_id'] ?? $_SESSION['id'];

mysqli_query($conn, "UPDATE user_sessions SET login_status = 0 WHERE user_id = '$user_id'");

session_destroy();
header('location:login.html');
?>
