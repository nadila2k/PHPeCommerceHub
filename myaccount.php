<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body class="bg-info">


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">UI-MONK</a>

  <!-- Links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item mt-2">
      <a class="nav-link" href="#">Home</a>
    </li>
    <li class="nav-item mt-2">
      <a class="nav-link" href="#">Shop</a>
    </li>
    <li class="nav-item mt-2">
      <a class="nav-link" href="#">My Account</a>
    </li>
    <li class="nav-item mt-2">
      <a class="nav-link" href="#">Contact</a>
    </li>

    <!-- Dropdown -->

    <div class='text-right ml-5'>
    <li class="nav-item dropdown">
      
              <div class="dropdown">
				    <button type="button" class="btn btn-info" data-toggle="dropdown">
				     <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">3</span>
				    </button>
				    <div class="dropdown-menu">
				    	<div class="row total-header-section">
			      			<div class="col-lg-6 col-sm-6 col-6">
			      				<i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">3</span>
			      			</div>
			      			<div class="col-lg-6 col-sm-6 col-6 total-section text-right">
			      				<p>Total: <span class="text-info">$2,978.24</span></p>
			      			</div>
				    	</div>
				    	<div class="row cart-detail">
		    				<div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
		    					<img src="images/1.jpeg">
		    				</div>
		    				<div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
		    					<p>Sony DSC-RX100M..</p>
		    					<span class="price text-info"> $250.22</span> <span class="count"> Quantity:01</span>
		    				</div>
				    	</div>
				    	<div class="row cart-detail">
		    				<div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                            <img src="images/2.jpeg">
		    				</div>
		    				<div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
		    					<p>Vivo DSC-RX100M..</p>
		    					<span class="price text-info"> $500.40</span> <span class="count"> Quantity:01</span>
		    				</div>
				    	</div>
				    	<div class="row cart-detail">
		    				<div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                            <img src="images/3.jpeg">
		    				</div>
		    				<div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
		    					<p>Lenovo DSC-RX100M..</p>
		    					<span class="price text-info"> $445.78</span> <span class="count"> Quantity:01</span>
		    				</div>
				    	</div>
				    	<div class="row">
				    		<div class="col-lg-12 col-sm-12 col-12 text-center checkout">
				    			<button class="btn btn-primary btn-block">Checkout</button>
				    		</div>
				    	</div>
				    </div>
				</div> 
    </li>
    </div> 
  </ul>
</nav>

 
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
						<th>Total</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							900
						</td>
						<td>
							June 15, 2015
						</td>
						<td>
							Delivered			
						</td>
						<td>
							&pound;173 for 4 items				
						</td>
						<td>
							<a href="#">View</a>
						</td>
					</tr>
					<tr>
						<td>
							873
						</td>
						<td>
							June 02, 2015
						</td>
						<td>
							Delivered			
						</td>
						<td>
							&pound;55 for 2 items				
						</td>
						<td>
							<a href="#">View</a>
						</td>
					</tr>
					<tr>
						<td>
							629
						</td>
						<td>
							March 23, 2015
						</td>
						<td>
							Delivered			
						</td>
						<td>
							&pound;599 for 14 items				
						</td>
						<td>
							<a href="#">View</a>
						</td>
					</tr>
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







 
</body>
</html>