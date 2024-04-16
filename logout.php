<?php 
session_start();
session_destroy();
unset($_SESSION['cart']);

header('location:login.php');
?>