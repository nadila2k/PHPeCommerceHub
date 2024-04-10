<?php include 'config/db.php'; ?>
<?php include 'inc/header.php' ?>

<?php 


if (isset($_GET['id'])) {

    if (isset($_GET['quantity'])) {
        $quantity = $_GET['quantity'];
    } else {
        $quantity = 1;
    }

    $id =  $_GET['id']; 

    // session_unset();

    $_SESSION['cart'][$id] = array('quantity' => $quantity);

    header('location:index.php');

    
}


?>