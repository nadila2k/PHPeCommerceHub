<?php include 'inc/header.php'; ?>

<?php include "inc/nav.php"; ?>
<?php include 'config/db.php'; ?>

<?php

?>


<div class="content mt-5">
    <ul class="rig columns-4">
        <?php
        $sql = "Select*from products";
        if (isset($_GET['id'])) {
            $cat_id = $_GET['id'];
            $sql .= " where cat_id = '$cat_id' ";
        }
        $res = mysqli_query($conn, $sql);

        while ($rows = mysqli_fetch_assoc($res)) {

        ?>
            <li>
                <a href=""><img class="product-image" src="admin/<?php echo $rows['thumb']; ?>"></a>
                <h4><?php echo $rows['product_name']; ?></h4>

                <p><?php echo $rows['description']; ?></p>
                <div class="price">RS <?php echo $rows['price']; ?>.00</div>

                <hr>
                <button class="btn btn-default btn-xs pull-right" type="button">
                    <i class="fa fa-cart-arrow-down"></i> Add To Cart
                </button>
                <a href="single.php?id=<?php echo $rows['product_id']; ?>"  class="btn btn-default btn-xs pull-left" >
                    <i class="fa fa-eye"></i> Details
                </a>

            </li>
        <?php
        }
        ?>
    </ul>
</div>








<?php include "inc/footer.php"; ?>