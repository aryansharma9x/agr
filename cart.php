<?php 
SESSION_start();
include('functions/functions.php');
include("admin/includes/db.php");
 ?>
<!doctype> <html>
<head>
	<title>AGR Styles</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
*{text-align: center;}
	h3{ padding-top: 25px;	}
	hr{	border: 1px solid red;		}
	ul{	text-align: left;	padding-left: 3px;		}
	li{	list-style: none;	font-size: 1.5em; text-align: left;	}
	.image{	width: 100px; height: 100px; padding: 5px; border: 1px solid gray;border-radius: 10%;margin: 10px;}
	select{margin-top: 20%; width: 25%; padding: 5px; border-radius: 10%;}
	</style>
</head>
<body>
<div class="container">
				<div class="head navigation col-md-12">
					<ul><?php 
						if (!isset($_SESSION['customer_email'])){
							echo "<li> <a href='checkout.php'>Login</a> </li>";	}
						else{
							echo "<li> <a href='logout.php'>Logout</a> </li> ";	}
					?>
						<li> <i class="fa fa-shopping-bag" aria-hidden="true"></i>
							<span> <?php total_items(); ?> </span> Cart
							<i class="fa fa-inr cart-space" aria-hidden="true"></i>
							<span> <?php total_price(); ?> </span>
						</li>
					</ul>
				</div>
<span style="padding:5px; line-height:40px;">
					
					<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>" . $_SESSION['customer_email'];
					}
					else {
					echo "<b>Welcome Guest:</b>";
					}
					?>
				</span>
		<div class='row'>
			<?php
			$total=0;
			global $con;
			$ip = getIp();
			$sell_price = "SELECT * FROM cart WHERE ip_add = '$ip' ";
			$run_price = mysqli_query($con, $sell_price);
			while ($p_price = mysqli_fetch_array($run_price)) {
				$pro_id = $p_price ['p_id'];
				$pro_price="SELECT * FROM products WHERE product_id='$pro_id' ";
				$run_pro_price= mysqli_query($con, $pro_price);
					while ($pp_price = mysqli_fetch_array($run_pro_price)){
					$product_price= array($pp_price['product_price']);
			
					$product_title= $pp_price['product_title'];
					$product_image= $pp_price['product_image'];
					$single_price= $pp_price['product_price'];
					
					$values = array_sum($product_price);
					$total += $values;			

			?>

			<div class="col-sm-1">
				<form method="POST">
<!-- REMOVE -->					
				Remove:	
				<input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/>				
			</div>		
			<div class="col-sm-3">
				<?php echo "<h4> $product_title </h4> ";  ?>
			</div>		
	
			<div class="col-sm-3">			
			<input type="text" name="qty" value="<?php echo $_SESSION['qty'];?>"/>	
						<?php 
						if(isset($_POST['update_cart'])){						
							$qty = $_POST['qty'];							
							$update_qty = "UPDATE cart set qty='$qty'";							
							$run_qty = mysqli_query($con, $update_qty); 							
							$_SESSION['qty'] = $qty;							
							$total = $total*$qty;				
						}											
						?>		
			</div>	
			
			<div class="col-sm-3">
				<?php echo "<h4> $single_price </h4>";  ?>
			</div>					
			<div class="col-sm-2">
				<?php echo "<img class='image' src='admin/images/$product_image '/>" ?>
			</div>	
				<?php 	}} ?>		
	
			</div>	
		</div>

		<?php echo "Sub-Total: $total"; ?> 
	</div>

	<div class="row">
		<div class="col-sm-3">	<input type="submit" name="update_cart" value="Update Cart"/>		</div>
		<div class="col-sm-3">	<input type="submit" name="continue" value="Continue Shopping" />	</div>
		<div class="col-sm-3">	<button><a href="checkout.php">Checkout</a></button>				</div>
	</form>
	<?php 
	function updatecart(){
		global $con;
	$ip = getIp();
	if (isset($_POST['update_cart'])){
		foreach ($_POST['remove'] as $remove_id){
			$delete_product = " DELETE from cart WHERE p_id = '$remove_id' AND ip_add = '$ip' ";
			$run_delete = mysqli_query($con, $delete_product);
			if ($run_delete){
				echo "<script> window.open('cart.php','_self') </script>";
			}

		}
		}
	if (isset($_POST['continue'])) {
		echo "<script> window.open('products.php','_self') </script>";
	}
	}
		echo @$up_cart = updatecart();


	?>	
	</div>
</div>

</body>
</html>

