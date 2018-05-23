<?php 
session_start();
include('functions/functions.php') ?>
<html>

<head>
	<title></title>
	<title>AGR Clothings</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

<style type="text/css">

footer{	margin-top: 1px!important;}
.input {margin-top: 0px; margin-bottom: 0px;}
select{	text-align: center;	margin: 0 auto; margin-bottom: 15px;}
.noformat { border: none;margin: 0 auto; width: 17%;}

</style>
<!-- JQUERY -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>

<header>
	<?php include('head.php') ?>
</header>

	<form action="customer_register.php" method="post" enctype="multipart/form-data">		
		<legend>Register</legend>
			<input class="input" placeholder= "name" type="text" name="c_name" required/>  <br>
			<input class="input" placeholder="Email" type="text" name="c_email" required/> <br>
			<input class="input" placeholder="password" type="password" name="c_pass" required/> <br>
			<input class="noformat" type="file" name="c_image" required/> <br>
				<select class="input" name="c_country">
					<option>Select a Country</option>
					<option>Afghanistan</option>
					<option>India</option>
					<option>Japan</option>
					<option>Pakistan</option>
					<option>Israel</option>
					<option>Nepal</option>
				</select>
			<input class="input" placeholder="city" type="text" name="c_city" required/> <br>
			<input class="input" placeholder="contact" type="text" name="c_contact" required/> <br>
			<input class="input" placeholder="address" type="text" name="c_address" required/> </br>
			<input class="input" type="submit" name="register" value="Create Account" />
	</form>

<footer>	<?php  include ('footer.php') ?> </footer>
</body>
</html>

<?php 
	$con = mysqli_connect("localhost","root","","ecommerce");
	if(isset($_POST['register'])){

		
		$ip = getIp();
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
	
		
		move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
		
		 $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
	
		$run_c = mysqli_query($con, $insert_c); 
		
		//Check if the order is in cart database
		$sel_cart = "SELECT * FROM cart where ip_add = '$ip'"	;
		$run_cart = mysqli_query($con, $sel_cart);

		//Count if there is any order 
		$check_cart = mysqli_num_rows($run_cart);

		if ($check_cart == 0){
			$_SESSION ['customer_email'] = $c_email;
			echo "<script> alert('Account Created') </script>";
			echo "<script>window.open('products.php', '_self') </script>";
		}
		else
		{
		$_SESSION ['customer_email'] = $c_email;
			echo "<script> alert('Account is Created-Enjoy Shopping') </script>";
			echo "<script>window.open('checkout.php', '_self') </script>";	
		}


}
?>		