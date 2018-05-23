<?php 
session_start();
include('functions/functions.php') ?>

<!doctype> <html>
<head>
	<title>AGR Styles</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		hr{	border: 1px solid red;		}
		li{	list-style: none; font-size: 18px;	}
		img{width: 230px; 	height: 290px; padding: 10px;}
		.upper-space{ margin-top: 10px;}
		
	</style>
</head>
<body>

<div class="container-fluid">
	<div class="row">
				<div class="head navigation col-md-12">
					<ul><?php 
						if (!isset($_SESSION['customer_email'])){
							echo "<li> <a href='checkout.php'>Login</a> </li>";	}
						else{
							echo "<li> <a href='logout.php'>Logout</a> </li> ";	
							echo "<li> <a href='customer/my_account.php'>My Account </a>  </li>";
						}
					?>
						<li> <a href="customer_register.php">Register</a> </li>
						<li> <a href=""> 
							<i class="fa fa-shopping-bag" aria-hidden="true"></i>
							<span> <?php total_items(); ?> </span> Cart
							<i class="fa fa-inr cart-space" aria-hidden="true"></i>
							<span> <?php total_price(); ?> </span>
						</a> </li>
					</ul>
				</div>
	</div>
</div>
<!-- ------------------------             HEADER END 				--------------------- -->

<div class="container">
	<div class="row">
		<div class="col-sm-1">
			<h4>Categories</h4>
			<ul>
				<?php getCats(); ?> 
			</ul>
		</div>

		<div  class="col-sm-11 upper-space" >
					<?php getPro();  ?> <!--  Get products from functions/functions.php -->
					<?php getCatPro(); ?>
					<?php cart(); ?>
			</div>			
	</div>
</div>

</body>
</html>