<?php
session_start();

?>
<html>
<head>
	<title>AGR | Payment Successful !</title>
</head>
<body>

<?php
include ("db_connect.php");
include ("functions/functions.php");
//GET Amount form cart table
		$total = 0;
		$ip = getIp();
		$sell_price = "SELECT * FROM cart WHERE ip_add = '$ip' ";
		$run_price = mysqli_query($con, $sell_price);
		while ($p_price = mysqli_fetch_array($run_price)) {
			$pro_id = $p_price ['p_id'];
			$pro_price="SELECT * FROM products WHERE product_id='$pro_id' ";
			$run_pro_price= mysqli_query($con, $pro_price);
			while ($pp_price = mysqli_fetch_array($run_pro_price)){
				$product_price= array($pp_price['product_price']);
				$product_id = $pp_price['product_id'];
				$value = array_sum($product_price);
				$total += $value;
			}
		}

//GET QUANTITY OF THE PRODUCT from cart table	
		$get_qty = "SELECT * FROM cart where p_id='$pro_id'";
		$run_qty = mysqli_query($con, $get_qty);
		$row_qty = mysqli_fetch_array ($run_qty);
		$qty = $row_qty['qty'];
		if ($qty == 0){
			$qty=1;
		}
		else{
			$qty = $qty;
		}

//GET customer ID from customers table

		$user 	  = $_SESSION['customer_email'];				
		$get_c 	  = "SELECT * from customers where customer_email='$user'";			
		$run_c 	  = mysqli_query($con, $get_c); 			
		$row_c 	  = mysqli_fetch_array($run_c); 
		$c_id 	  = $row_c['cusotmer_id'];

//PAYMENT DETAILS FROM PAYPAL
		$amount   = $_GET['amt'];
		$currency = $_GET['cc'];
		$trx_id   = $_GET['tx'];

		$insert_payments = "INSERT INTO payments (amomunt, cusotmer_id, product_id,currency) VALUES ('$c_id','$pro_id','$trx_id','$currency')";
		$run_payments = myqli_query ($con, $insert_payments);

//INSERTING INTO orders table		
		$insert_order = "INSERT INTO orders (p_id, c_id, qty) VALUES ('$pro_id','$c_id','$qty')" ;
		$run_order = mysqli_query($con, $insert_order);

//EMPTY THE CART or reset cart after purchace complete
		$empty_cart = " DELETE FROM cart ";
		$run_cart = mysqli_query($con, $empty_cart);

		if($amount == $total){
			echo "<h2> welcome: </h2> " . $_SESSION ['cusotmer_email'] . "<br>" ."Your Payment was sucessful</h2> " ;
		echo "<a href='http://agrstyles.com> Go To Account  </a>";
		}
		else{
			echo "<h2> welcome guest </h2><br>";
			echo "<a href='http://agrstyles.com> Go back to shop  </a>";

		}

?>


</body>
</html>