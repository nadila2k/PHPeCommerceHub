<?php

use function PHPSTORM_META\map;

session_start();
include "../config/db.php";
if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {

    header('location:admin-login.php');
}
?>
<?php include "inc/header.php"; ?>
<?php include "inc/nav.php"; ?>


<?php
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "Select*from products where product_id = '$id'";
    $res = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($res);
}
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Edit Products
        </div>
        <div class="card-body">
            <section id="content ">
                <div class="content-blog mt-5">
                    <div class="container">
                        <form action="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="Productname"> Product Name</label>
                                <input type="text" class="form-control" name="productname" value="<?php echo $rows['product_name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="productdescription">Product Description</label>
                                <input type="text" class="form-control" name="productdescription" value="<?php echo $rows['description'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="productcategory">Product Category</label>
                                <select name="productcategory" id="productcategory" class="form-control">
                                    <option value="" selected disabled>------SELECT CATEGORY------</option>
                                    <?php
                                    $sql1 = "SELECT * FROM category";
                                    $res2 = mysqli_query($conn, $sql1);
                                    while ($row2 = mysqli_fetch_assoc($res2)) {
                                    ?>
                                        <option value="<?php echo $row2['cat_id'] ?>" <?php
                                       if ( $row2['cat_id'] == $rows['cat_id']) {
                                      echo 'selected';
                                        } ?>>
                                            <?php echo $row2['cat_name'] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>


                            </div>
                            <div class="form-group">
                                <label for="productprice">product Price</label>
                                <input type="text" name="productprice" id="productprice" value="<?php echo $rows['price'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="productimage">Product image</label>
                                <input type="file" name="productimage" id="productimage">
                                <p class="help-block">Only jbg/png are allowed.</p>
                            </div>
                            <button class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>

            </section>
        </div>

    </div>
</div>



<?php include "inc/footer.php"; ?>