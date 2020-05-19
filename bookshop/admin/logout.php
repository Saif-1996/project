<?php   session_start();
include ('includes/connection.php');

unset($_SESSION['admin_id']);
header("Location:login.php");
?>
