
<?php
session_start();
include "../config/db.php";
if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {
    header('location:admin-login.php');
    exit; // Add exit to stop further execution
}
?>
<?php
if (isset($_POST['submit'])) {
    $productName =  $_POST['productname'];
    $description =  $_POST['productdescription'];
    $categoryid =  $_POST['productcategory'];
    $price =  $_POST['productprice'];
    $product_id = $_POST['id'];


    if (isset($_FILES) & !empty($_FILES)) {

        $name = $_FILES['productimage']['name'];
        $size = $_FILES['productimage']['size'];
        $type = $_FILES['productimage']['type'];
        $tmp_name = $_FILES['productimage']['tmp_name'];

        $max_size = 10000000;
        $extension = substr($name, strpos($name, '.') + 1);

        if (isset($name) & !empty($name)) {

            if ($extension == 'jpg' || $extension == 'jpeg' && $type == "image/jpeg" && $size <= $max_size) {
                $location = "uploads/";
                if (move_uploaded_file($tmp_name, $location . $name)) {

                    $sql = "UPDATE products 
                            SET product_name = '$productName', 
                            cat_id = '$categoryid', 
                            price = '$price', 
                            description = '$description', 
                            thumb = '$location$name' 
                            WHERE product_id = $product_id";

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
    } else {
    }

    $sql = "UPDATE products 
        SET product_name = '$productName', 
            cat_id = '$categoryid', 
            price = '$price', 
            description = '$description' 
        WHERE product_id = $product_id";

    if (mysqli_query($conn, $sql)) {
        header('location:products.php');
        exit; // Add exit to stop further execution
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>