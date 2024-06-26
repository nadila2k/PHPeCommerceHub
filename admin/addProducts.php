<?php
session_start();
include "../config/db.php";
if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {

    header('location:admin-login.php');
}
?>
<?php include "inc/header.php"; ?>
<?php include "inc/nav.php"; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            Add Product
        </div>
        <div class="card-body">

            <section id="content ">
                <div class="content-blog mt-5">
                    <div class="container">
                        <form action="codeAddProduct.php" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label for="Productname"> Product Name</label>
                                <input type="text" class="form-control" name="productname" placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                <label for="productdescription">Product Description</label>
                                <input type="text" class="form-control" name="productdescription" placeholder="Product description">
                            </div>
                            <div class="form-group">
                                <label for="productcategory">Product Category</label>
                                <select name="productcategory" id="productcategory" class="form-control">
                                    <option value="" selected disabled>------SELECT CATEGORY------</option>
                                    <?php
                                    $sql = "SELECT * FROM Category";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) {

                                    ?>

                                            <option value="<?php echo $row["cat_id"] ?>"><?php echo $row["cat_name"] ?></option>


                                    <?php
                                        }
                                    }

                                    ?>


                                </select>
                            </div>
                            <div class="form-group">
                                <label for="productprice">product Price</label>
                                <input type="text" name="productprice" id="productprice" placeholder="peoduct price">
                            </div>
                            <div class="form-group">
                                <label for="productimage">Product image</label>
                                <input type="file" name="productimage" id="productimage">
                                <p class="help-block">Only jbg/png are allowed.</p>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>





<?php include "inc/footer.php"; ?>