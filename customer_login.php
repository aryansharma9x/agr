<?php 

include("admin/includes/db.php");

?>

<!doctype><html>
<head>
	<title></title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
	.login form {
		margin-top: 100px;
		padding-top: 100px;
		text-align: center;
		margin: 0px auto;
		width: 500px;
		height: 450px;
		background-color: #F8F8F8;
		border: 1px solid steelblue;
		border-radius: 5px;	}
	.login legend{
		text-align: center;
		font-size: 2em;
		margin-bottom: 50px;
		border: none;	}
	.login input {
		width: 300px;
		padding: 5px;
		border: 1px solid gray;
		border-radius: 5px;
		padding: 15px;	}
	.login button{
		background-color: steelblue;
		color: white;
		width: 120px;
		height: 40px;
		border: 1px solid white;
		border-radius: 5px;
		margin-bottom: 50px;	}
	hr{
		border: 1px solid #DCDCDC;
		margin-bottom: 50px;	}
	</style>
</head>
<body>
<header>
	<?php include('head.php'); ?>
</header>

<div class="login">
	<form action = "" method="POST">
		<legend><i class="fa fa-id-card" aria-hidden="true"></i> Sign in </legend> <hr>

		<i class="fa fa-user" aria-hidden="true"></i> 
		<input type="text" placeholder="user name" name="email" id="email" required> <br><br>
		
		<i class="fa fa-key" aria-hidden="true"></i>  
		<input type= "password" placeholder = "password" name="pass" id="password" required> <br><br>
		
		<input type="submit" name="login" value="login"> <br><br>	

		<a href="checkout.php?forgot_pass">Forgot Password !</a> <br><br>
	</form>

		<h3>	<a href="customer_register.php">New - Register here</a>  </h3>

</div>

	<footer>	<?php  include ('footer.php') ?>	</footer>
</body>
</html>

<?php 
if (isset($_POST['login'])){
	$c_email = $_POST['email'];
	$c_pass  = $_POST['pass'];
	$sel_c = " SELECT * FROM customers WHERE customer_email = '$c_email' AND customer_pass='$c_pass' ";
	$run_c = mysqli_query($con, $sel_c);

	//if Customer Exists
	$check_customer = mysqli_num_rows($run_c);
	if ($check_customer == 0){
		echo "<script> alert('Credentials Error') ;</script> ";
	// not exist - EXIT do not run further code.	
		exit();
	}
	
	$ip = getIp();
	$sel_cart = "SELECT * FROM cart where ip_add = '$ip'"	;
	$run_cart = mysqli_query($con, $sel_cart);
	//Count if there is any order 
	$check_cart = mysqli_num_rows($run_cart);

	//Check if customer is existed and have something in the cart - NAVIGATE TO ACCOUNT PAGE
	if ($check_customer > 0 AND $check_cart ==0){

		$_SESSION ['customer_email'] = $c_email;

		echo "<script> alert('Logged in Successfully, Thanks') </script>";

		echo "<script>window.open('customer/my_account.php', '_self') </script>";
	}
	else
	{
		$_SESSION ['customer_email'] = $c_email;

		echo "<script> alert('Logged in Successfully, Thanks') </script>";

		echo "<script>window.open('checkout.php', '_self') </script>";	
	}

}

?>


