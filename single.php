<?php include 'inc/header.php'; ?>

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

    <div class="row text-white">
        <div class="col-md-6 ">
            <img src="admin/<?php echo $rows['thumb'] ?>" alt="" class='img-fluid' style='height:500px;width:500px;'>
        </div>
        <div class="col-md-6 pt-5">
            <h3><b><?php echo $rows['product_name'] ?></b></h3>
            <h2>Rs <?php echo $rows['price'] ?>.00</h2>
            <p><?php echo $rows['description'] ?></p>

            <div class="row">
                <div class="col-md-2">
                    Quantity:
                </div>
                <div class="col-md-2">
                    <form action="addtoCart.php">
                        <input type="hidden" name="id" value="<?php echo $rows['product_id']; ?>">
                        <input type="number" class='form-control' name="quantity">



                </div>

            </div>
            <div class="row ">
                <div class="col-md-12 category">
                    <?php
                    $id = $rows['cat_id'];
                    $sql = " Select * from category where cat_id = '$id'";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($res)
                    ?>
                    Categories - <a href="index.php?id=<?php echo $rows['cat_id'] ?>"><?php echo $row['cat_name'] ?></a>
                </div>

            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                <button type="submit" class="btn btn-default btn-xs pull-right" >
                    <i class="fa fa-cart-arrow-down"></i> Add To Cart
                </button>
                </div>
            </div>
            </form>

        </div>

    </div>
    <div class="tab mt-5">
        <button id='defaultOpen' class="tablinks" onclick="openCity(event,'London')">Details</button>
        <button class="tablinks" onclick="openCity(event,'Paris')">Review</button>
    </div>
    <div id="London" class="tabcontent bg-white">
        <h3><?php echo $rows['description'] ?></h3>
    </div>

    <div id="Paris" class="tabcontent bg-white">
        <h3></h3>
    </div>
</div>






<?php include "inc/footer.php"; ?>