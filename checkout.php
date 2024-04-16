<?php include 'inc/header.php'; ?>
<?php
if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {

	header('location: login.php');
}
?>

<?php include "inc/nav.php";

?>
<?php
if (isset($_SESSION['coustomerid'])) {
	$id = $_SESSION['coustomerid'];
	$sql = "SELECT * FROM user_data WHERE userid = '$id'";
	$res = mysqli_query($conn, $sql);
	$rows = mysqli_fetch_assoc($res);
}
if (isset($_POST['submit'])) {

	if ($_POST['agree'] == 'true') {
		$country = $_POST['country'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$company = $_POST['company'];
		$address = $_POST['address'];
		$address2 = $_POST['address2'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$postcode = $_POST['postcode'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$payment = $_POST['payment'];
		$agree = $_POST['agree'];
		$coustomerid = $_SESSION['coustomerid'];

		$sql = "SELECT * FROM user_data WHERE userid = '$coustomerid'";
		$res = mysqli_query($conn, $sql);

		if (mysqli_num_rows($res) == 1) {
			$sql = "UPDATE user_data 
			SET firstname = '$fname',
				lastname = '$lname',
				company = '$company',
				address1 = '$address',
				address2 = '$address2',
				city = '$city',
				county = '$state',
				zip = '$postcode',
				mobile = '$phone'
			WHERE userid = '$coustomerid'";

			$res = mysqli_query($conn, $sql);
			if ($res) {
				$sql = "INSERT INTO orders (userid, totalprice, oderstatus, paymentmode) VALUES ('$coustomerid', '$total', 'oder placed', '$payment')";
				
				if ($res = mysqli_query($conn, $sql)) {
					$id = mysqli_insert_id($conn); 
					$id = $rows['id'];

					foreach ($cart as $key => $value) {


						$sql = " Select * from products where product_id = '$key'";
						$res = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($res);
						$price = $row['price'];

						$sql = "INSERT INTO orderitem (orderid, productid, productprice, quantity) VALUES ('$id', '$key', '$price', '{$value['quantity']}')";
						
						if (mysqli_query($conn, $sql)) {
								unset($_SESSION['cart']);
								header('location:myaccount.php');
						}
						
					}

					

				
				}
			}
		} else {
			$sql = "INSERT INTO user_data (userid, firstname, lastname, company, address1, address2, city, county, zip, mobile)
					VALUES ('$coustomerid', '$fname', '$lname', '$company', '$address', '$address2', '$city', '$state', '$postcode', '$phone')";
			$res = mysqli_query($conn, $sql);
			if (!$res) {
				// Error handling for INSERT query
				echo "Error: " . mysqli_error($conn);
			}
		}
	}
} else {
	// Handle if submit button is not set
}


?>


<div class="container text-white">

	<?php

	if (isset($_SESSION['cart'])) {
		$total = 0;
		foreach ($cart as $key => $value) {


			$sql = " Select * from products where product_id = '$key'";
			$res = mysqli_query($conn, $sql);

			$row = mysqli_fetch_assoc($res);
			$total = $total+( $value['quantity'] *  $row['price']);
			
		}
	}

	?>

	<section id="content">
		<div class="content-blog">
			<div class="page_header text-center  py-5">
				<h2>Shop - Checkout</h2>
				<p>Get the best kit for smooth shave</p>
			</div>
			<form action="" method="post">
				<div class="container ">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<div class="billing-details">
								<h3 class="uppercase">Billing Details</h3>
								<div class="space30"></div>

								<label class="">Country </label>
								<select class="form-control" name="country">
									<option value="">Select Country</option>
									<option value="AX">Aland Islands</option>
									<option value="AF">Afghanistan</option>
									<option value="AL">Albania</option>
									<option value="DZ">Algeria</option>
									<option value="AD">Andorra</option>
									<option value="AO">Angola</option>
									<option value="AI">Anguilla</option>
									<option value="AQ">Antarctica</option>
									<option value="AG">Antigua and Barbuda</option>
									<option value="AR">Argentina</option>
									<option value="AM">Armenia</option>
									<option value="AW">Aruba</option>
									<option value="AU">Australia</option>
									<option value="AT">Austria</option>
									<option value="AZ">Azerbaijan</option>
									<option value="BS">Bahamas</option>
									<option value="BH">Bahrain</option>
									<option value="BD">Bangladesh</option>
									<option value="BB">Barbados</option>
								</select>
								<div class="clearfix space20"></div>
								<div class="row">
									<div class="col-md-6">
										<label>First Name </label>
										<input class="form-control" value="<?php if (isset($rows['firstname'])) {
																				echo $rows['firstname'];
																			}  ?>" type="text" name="fname">
									</div>
									<div class="col-md-6">
										<label>Last Name </label>
										<input class="form-control" value="<?php if (isset($rows['lastname'])) {
																				echo $rows['lastname'];
																			}  ?>" type="text" name="lname">
									</div>
								</div>
								<div class="clearfix space20"></div>
								<label>Company Name</label>
								<input class="form-control" value="<?php if (isset($rows['company'])) {
																		echo $rows['company'];
																	} ?>" type="text" name="company">
								<div class="clearfix space20"></div>
								<label>Address </label>
								<input class="form-control" placeholder="Street address" value="<?php if (isset($rows['address1'])) {
																									echo $rows['address1'];
																								}  ?>" type="text" name="address">
								<div class="clearfix space20"></div>
								<input class="form-control" placeholder="Apartment, suite, unit etc. (optional)" value="<?php if (isset($rows['address2'])) {
																															echo $rows['address2'];
																														} ?>" type="text" name="address2">
								<div class="clearfix space20"></div>
								<div class="row">
									<div class="col-md-4">
										<label>Town / City </label>
										<input class="form-control" placeholder="Town / City" value="<?php if (isset($rows['city'])) {
																											echo $rows['city'];
																										} ?>" type="text" name="city">
									</div>
									<div class="col-md-4">
										<label>County</label>
										<input class="form-control" value="<?php if (isset($rows['county'])) {
																				echo $rows['county'];
																			}  ?>" placeholder="State / County" type="text" name="state">
									</div>
									<div class="col-md-4">
										<label>Postcode </label>
										<input class="form-control" placeholder="Postcode / Zip" value="<?php if (isset($rows['zip'])) {
																											echo $rows['zip'];
																										} ?>" type="text" name="postcode">
									</div>
								</div>
								<div class="clearfix space20"></div>
								<label>Email Address </label>
								<input class="form-control" value="" type="text" name="email">
								<div class="clearfix space20"></div>
								<label>Phone </label>
								<input class="form-control" id="billing_phone" value="<?php if (isset($rows['mobile'])) {
																							echo $rows['mobile'];
																						}  ?>" type="text" name="phone">
								< </div>
							</div>


						</div>

						<div class="space30"></div>
						<h4 class="heading">Your order</h4>

						<table class="table table-bordered extra-padding bg-white text-dark">
							<tbody>
								<tr>
									<th>Cart Subtotal</th>
									<td><span class="amount">RS.<?php  echo $total ?>.00</span></td>
								</tr>
								<tr>
									<th>Shipping and Handling</th>
									<td>
										Free Shipping
									</td>
								</tr>
								<tr>
									<th>Order Total</th>
									<td><strong><span class="amount">RS.<?php  echo $total ?>.00</span></strong> </td>
								</tr>
							</tbody>
						</table>

						<div class="clearfix space30"></div>
						<h4 class="heading">Payment Method</h4>
						<div class="clearfix space20"></div>

						<div class="payment-method mt-5">

							<div class="row d-flex">

								<div class="col-md-4">
									<input name="payment" id="radio1" class="mr-2 css-checkbox" type="radio" value="Direct_Bank_Transfer"><span>Direct Bank Transfer</span>
									<div class="space20"></div>
									<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
								</div>
								<div class="col-md-4">
									<input name="payment" id="radio2" class="mr-2 css-checkbox" type="radio" value="Cheque_Payment"><span>Cheque Payment</span>
									<div class="space20"></div>
									<p>Please send your cheque to BLVCK Fashion House, Oatland Rood, UK, LS71JR</p>
								</div>
								<div class="col-md-4">
									<input name="payment" id="radio3" class="mr-2 css-checkbox" type="radio" value="Paypal"><span>Paypal</span>
									<div class="space20"></div>
									<p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account</p>
								</div>

							</div>

							<div class="space30"></div>

							<input value="true" name="agree" id="agree" class="mr-2 css-checkbox" type="checkbox">


							<div class="space30"></div>
							<a href="#" class="button btn-lg">Pay Now</a>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 text-center">
							<input type="submit" value="Pay Now" name="submit" class="btn btn-danger ">
						</div>
					</div>

				</div>
	</section>
</div>
</form>








<?php include "inc/footer.php"; ?>