<?php
session_start();
include "../config/db.php";
if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {

    header('location:admin-login.php');
}
$id = $_GET['id'];
echo $img_name = $_GET['img_name'];

$sql = "DELETE FROM products WHERE product_id = $id;";
if (mysqli_query($conn,$sql)) {
    unlink($img_name);
    header('location:products.php');
}
?>