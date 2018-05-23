<?php
include ("db_connect.php");
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
				$product_name = $pp_price['product_title'];
				$value = array_sum($product_price);
				$total += $value;
			}
		}
?>
<html>
<head>
	<title>Payment AGR </title>
</head>
<body>
<h1>Pay by PayPal</h1>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="business@agr.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value="<?php echo "$product_name"; ?>">
  <input type="hidden" name="amount" value="<?php echo "$total"; ?>">
  <input type="hidden" name="currency_code" value="INR">

<input type="hidden" name="return" value="http://www.agrstyles.com/myshop/paypal_seccess.php">
<input type="hidden" name = "cancel_return" value="http://www.agrstyles.com/myshop/paypal_cancel.php">
  <!-- Display the payment button. -->
  <input type="image" name="submit" border="0"
  src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
  alt="Buy Now">
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>
</body>
</html>