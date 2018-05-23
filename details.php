<?php 
session_start();
include('functions/functions.php') ?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		hr{	border: 1px solid red;		}
		li{	list-style: none; font-size: 18px;	}
		img{width: 550px; 	height: 600px; padding: 20px;}
		.upper-space{ margin-top: 10px;}
		
	</style>

</head>
<body>
<!-- ------------------------             HEADER  				--------------------- -->
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

<div><p></p></div>
<?php cart(); ?>
</body>
</html>

<?php

$con = mysqli_connect("localhost","root","","ecommerce");
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$getDetails = "SELECT * FROM products where product_id = '$id' ";
	$run = mysqli_query ($con, $getDetails);

	while ($record = mysqli_fetch_array($run)) {
		$id 	=	$record['product_id'];
		$name	=	$record['product_title'];
		$img 	= 	$record['product_image'];
		$price	=	$record['product_price'];
		$desc 	= 	$record['product_desc'];

		echo "  
			<div class='row'> 
				<div class='col-sm-6'  > 
					<img  src='admin/images/$img'/>	  
				</div>			
				<div class='col-sm-6'> 
					<h1> $name </h1>			
					<p> $desc	</p>
					<h3> &#8377;: $price </h3>	
					<a style='text-align:right' href='products.php?add_cart=$id'> 
						<button class='btn btn-primary btn-lg'>Add to Cart </button> </a>	
				</div>
			</div>
			
			";
	}
}



?>