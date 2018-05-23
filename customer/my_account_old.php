<?php 
session_start();
include('functions/functions.php') ?>

<!doctype> <html>
<head>
	<title>AGR Styles</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		hr{	border: 1px solid red;		}
		ul{	text-align: left;	padding-left: 3px;		}
		li{	list-style: none;	font-size: 1.5em; text-align: left;	}
		img{width: 200px; 	height: 200px;	border: 1px solid gray; box-shadow: 0 0 3px ;}
	</style>
</head>
<body>
	<span style="float:; font-size:17px; padding:5px; line-height:40px;">
		<?php 
	if(isset($_SESSION['customer_email'])){
	echo "<b>Welcome:</b>" . $_SESSION['customer_email'] ;
		}
	?>
<div class="container">

	<div class="row">
		<div class="col-sm-10">

		<li><a href="my_account.php?my_orders">My Orders</a></li>
				<li><a href="my_account.php?edit_account">Edit Account</a></li>
				<li><a href="my_account.php?change_pass">Change Password</a></li>
				<li><a href="my_account.php?delete_account">Delete Account</a></li>
				<li><a href="logout.php">Logout</a></li>
		
<div class="row">
	<div class="col-sm-4">

				<?php 
				$user = $_SESSION['customer_email'];
				
				$get_img = "SELECT * from customers where customer_email='$user'";
				
				$run_img = mysqli_query($con, $get_img); 
				
				$row_img = mysqli_fetch_array($run_img); 
				
				$c_image = $row_img['customer_image'];
				
				$c_name = $row_img['customer_name'];
				
				echo "<p style='text-align:center;'><img src='customer_images/$c_image' width='150' height='150'/></p>";
				
				?>
	</div>
</div>

<?php getCatPro(); ?>
<?php cart(); ?>

		</div>
		<div class="col-sm-2">
			<div> 

				<?php 
					if (!isset($_SESSION['customer_email'])){
						echo "<a href='checkout.php' style='color:orange;'>Login</a>";
					}
					else{
						echo "<a href='logout.php'>Logout</a>";
					}
				?>
				<p>Items <span><?php total_items(); ?> </span></p>
				<p>Amount <span><?php total_price(); ?></span></p>
			</div>
		</div>
	</div>
</div>

</body>
</html>