
<?php
session_start();
include "../config/db.php";
if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {
    header('location:admin-login.php');
    exit; // Add exit to stop further execution
}
?>
<?php 
$id = $_GET['id'];
$img_name = $_GET['image_name'];

$sql = "UPDATE products SET thumb = NULL WHERE product_id = $id";


if (mysqli_query($conn,$sql)) {
    unlink($img_name);
    header("location: editProduct.php?id={$id}");

}
?>
