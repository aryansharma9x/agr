<?php 
session_start(); 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

?>

<!DOCTYPE>
<html>
<head>
	<title>ADMIN PANNEL | AGR STYLES</title>
	<link rel="stylesheet" type="text/css" 
		href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>

<div class="sidenav">

	<img class="img-radius center-block" alt="ERROR" src="images/user.png" align="middle">

	<h5><?php 
		if(isset($_SESSION['user_email'])){
		echo   $_SESSION['user_email'] ;
			}	?>
	</h5> 
	
	<hr>

	<div id="right">
		<h2 style="text-align:center; color:white;">Manage Content</h2>

			<a href="index.php?insert_product">	Insert New Products 	</a>
			<a href="index.php?view_products">	View All Products 		</a>
			<a href="index.php?insert_cat">		Insert New Category 	</a>
			<a href="index.php?view_cats">		View All Categories 	</a>
			<a href="index.php?view_customers">	View Customers 			</a>
			<a href="index.php?view_orders">	View Orders  			</a>
			<a href="index.php?view_payments">	View Payments  			</a>

			<a href="logout.php">Admin Logout</a>
		</div>

</div>

<div class="main">
	<div style="float:left">
		<h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
		<?php 
		if(isset($_GET['insert_product'])){ 	include("insert_product.php"); 	}
		if(isset($_GET['view_products'])) {		include("view_products.php") ; 	}
		if(isset($_GET['edit_pro'])) 	  {		include("edit_pro.php")      ;	}
		if(isset($_GET['insert_cat'])) 	  {		include("insert_cat.php")	 ;	}
		if(isset($_GET['view_cats'])) 	  {		include("view_cats.php")	 ;	}
		if(isset($_GET['edit_cat'])) 	  {		include("edit_cat.php")      ;	}
		if(isset($_GET['view_customers'])){		include("view_customers.php");	}
		
		?>
	</div>
</div>
     

</body>
</html>


<?php  } ?>