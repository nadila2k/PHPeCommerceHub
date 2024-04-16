<?php include 'inc/nav.php';
$id = $_GET['id'];
$sql = "UPDATE orders
SET oderstatus = 'Cancel'
WHERE id ='$id'";
if (mysqli_query($conn,$sql)) {
    header('location:myaccount.php');
}
?>