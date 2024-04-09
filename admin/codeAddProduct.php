<?php
session_start();
include "../config/db.php";
if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {
    header('location:admin-login.php');
    exit; // Add exit to stop further execution
}


if (isset($_POST['submit'])) {
    $productName =  $_POST['productname'];
    $description =  $_POST['productdescription'];
    $categoryid =  $_POST['productcategory']; 
    $price =  $_POST['productprice'];

    if (isset($_FILES) & !empty($_FILES)) {

        $name = $_FILES['productimage']['name'];
        $size = $_FILES['productimage']['size'];
        $type = $_FILES['productimage']['type'];
        $tmp_name = $_FILES['productimage']['tmp_name'];

        $max_size = 10000000;
        $extension = substr($name,strpos($name,'.')+1);

        if (isset($name) & !empty($name)) {
            
            if ($extension == 'jpg' || $extension == 'jpeg' && $type == "image/jpeg" && $size <= $max_size) {
                $location = "uploads/";
                if (move_uploaded_file($tmp_name,$location.$name)) {

                    $sql = "INSERT INTO products (product_name, cat_id, price, description, thumb) 
                    VALUES ('$productName', '$categoryid', '$price', '$description', '$location$name')";
                    if (mysqli_query($conn, $sql)) {
                        header('location:products.php');
                        exit; // Add exit to stop further execution
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }

                } else {
                
                }
            } else {
            
            }
        } else {
            # code...
        }
        $sql = "INSERT INTO products (product_name, cat_id, price, description) 
        VALUES ('$productName', '$categoryid', '$price', '$description')";
        if (mysqli_query($conn, $sql)) {
            header('location:products.php');
            exit; // Add exit to stop further execution
        } else {
            echo "Error: " . mysqli_error($conn);
        }
         
    } else {
    
    }

   

    
}
?>
