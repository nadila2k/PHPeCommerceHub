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
        <div class="card-header"> All Products </div>
        <div class="card-body">
            <section id="content">
                <div class="content-blog mt-5 ">
                    <div class="container bg-white">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Category Name</th>
                                    <th>Thumbnail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $sql = "Select*from products";
                            $res = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($res)) {
                                while ($rows = mysqli_fetch_assoc($res)) {
                            ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $rows['product_name']; ?></td>

                                            <td><?php echo $rows["cat_id"]; ?></td>
                                           
                                            <td><?php if (isset($rows["thumb"])) {
                                               echo "Yes";
                                            } else {
                                                echo "No";
                                            }  ?></td>
                                            <td>
                                                <a href='editProduct.php?id=<?php echo $rows["product_id"]?>'>Edit</a>
                                                | <a href='dltProduct.php?id=<?php echo $rows["product_id"] ?>&img_name=<?php echo $rows["thumb"]; ?>'>Delete</a>
                                                
                                            </td>
                                        </tr>
                                <?php
                                }
                            } else {
                                # code...
                            }
                                ?>



                                    </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>



<?php include "inc/footer.php"; ?>