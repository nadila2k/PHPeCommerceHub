
<?php include "inc/header.php"; ?>
<?php include "inc/nav.php";


if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {

	header('location:login.php');
}

echo $coustomerid = $_SESSION['coustomerid'];




?>



<div class="container text-white">
	<h2 class='text-center text-white'>My Account</h2>

	<section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">

					<div class="col-md-12">

						<h3>Recent Orders</h3>
						<br>
						<table class="cart-table account-table table table-bordered bg-white text-dark">
							<thead>
								<tr>
									<th>Order</th>
									<th>Date</th>
									<th>Status</th>
									<th>Paymentmode</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<?php 
							$sql =  "select * from orders where userid='$coustomerid'";

							$res = mysqli_query($conn, $sql);
							while ($rows = mysqli_fetch_assoc($res)) {
							
							?>
							<tr>
									<td>
										<?php echo $rows['id'] ?>
									</td>
									<td>
									<?php echo $rows['timestamp'] ?>
									</td>
									<td>
									<?php echo $rows['oderstatus'] ?>
									</td>
									<td>
									<?php echo $rows['paymentmode'] ?>
									</td>
									<td>
									<?php echo $rows['totalprice'] ?>
									</td>
									<td>
										<a href="View_order.php?id=<?php echo $rows['id'] ?>">Cancel</a>
									</td>
								</tr>

							<?php
							}
							?>
								
							</tbody>
						</table>



						<div class="ma-address">
							<h3>My Addresses</h3>
							<p>The following addresses will be used on the checkout page by default.</p>

							<div class="row  bg-white text-dark px-5 py-3">
								<div class="col-md-6">
									<h4>Billing Address <a href="#">Edit</a></h4>
									<p>
										Vishal Varghese<br>
										Dombivli<br>
										Kalyan East<br>
										Kalyan East<br>
										421201<br>

										Maharashtra
									</p>
								</div>

								<div class="col-md-6">
									<h4>Shipping Address <a href="#">Edit</a></h4>
									<p>
										Vishal Varghese<br>
										Dombivli<br>
										Kalyan East<br>
										Kalyan East<br>
										421201<br>

										Maharashtra
									</p>

								</div>
							</div>



						</div>

					</div>
				</div>
			</div>
		</div>
	</section>


</div>







<?php include "inc/footer.php"; ?>