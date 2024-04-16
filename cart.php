<?php include 'inc/header.php' ?>

<?php include "inc/nav.php";


$cart = $_SESSION['cart'];



?>



<div class="container">
    <h2 class='text-center text-white'>Cart</h2>

    <table class="table table-bordered bg-white">
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php
        $total = 0;
        foreach ($cart as $key => $value) {
            
        
            $sql = " Select * from products where product_id = '$key'";
            $res = mysqli_query($conn,$sql);

            $row = mysqli_fetch_assoc($res);

        ?>
        
            <tr>
                <td><img src="admin/<?php echo $row['thumb'];?> " alt="" ></td>
                <td><a href="single.php?id=<?php echo $row['product_id']?>"><?php echo $row['product_name']; ?></a></td> 
                <td>Rs <?php echo $row['price']; ?>.00</td>
                <td><?php echo $value['quantity'] ?></td>
                <td>Rs <?php echo $tot= $value['quantity'] *  $row['price']; ?>.00</td>
                <td><a href="deleteCart.php?id=<?php echo $key?>" class="btn btn-primary">Remove</a href="deleteCart.php"></td>
            </tr>

        <?php
            $total += $tot;
        }
        ?>


    </table>

    <div class="text-right">
        <button class="btn mr-3">Update Cart</button>
        <a href="checkout.php" class="btn btn-primary">Checkout</a>
    </div>
    <div class="card">
        <div class="card-header">Total</div>
        <div class="card-body">
        Total Amount = Rs <?php echo $total ?>.00
        </div>
    </div>
</div>








<?php include "inc/footer.php"; ?>