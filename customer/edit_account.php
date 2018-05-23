

<!-- GET USER DATA FROM TABLE CUSTOMERS To DISPLAY IN FORM -->
<?php
$con = mysqli_connect('localhost','root','','ecommerce');				
	$user 	= 	$_SESSION['customer_email'];
	$get 	= 	"SELECT * FROM customers WHERE customer_email = '$user' ";
	$run 	= 	mysqli_query($con, $get);
	$data 	= 	mysqli_fetch_array($run);

	$c_id 	= 	$data['customer_id'];
	$name 	= 	$data['customer_name'];
	$email 	=	$data['customer_email'];
	$pass 	=	$data['customer_pass'];
	$country=	$data['customer_country'];
	$city 	=	$data['customer_city'];
	$contact=	$data['customer_contact'];
	$address=	$data['customer_address'];
	$image = 	$data['customer_image'];


?>

<!-- SHOW ALL THE DATA -->
<form action="" method="post" enctype="multipart/form-data">		
	<legend>Update Details</legend>
	
		<input 	class="input" 	 type="text" 	 name="c_name" 		value= '<?php echo "$name"; ?>'/> <br>
	
		<input 	class="input"  	 type="text" 	 name="c_email"		value= '<?php echo "$email";?>'/> <br>
	
		<input 	class="input"  	 type="password" name="c_pass" 		value= '<?php echo "$pass"; ?>'/> <br>
	<!-- COUNTRY CAN NOT BE CHANGED - DISABLED		 -->
	
		<select class="input" 	 disabled name="c_country">
				<option> 	<?php echo "$country" ?> </option>	
			</select> <br>
	
		<input class="input" 	type="text" 	name="c_city" 		value='<?php echo "$city"; ?>'  /><br>
	
		<input class="input" 	type="text" 	name="c_contact"	value='<?php echo "$contact";?>'/><br>
	
		<input class="input" 	type="text" 	name="c_address"	value='<?php echo "$address";?>'/><br>
	
		<input 	class="noformat" type="file" 	name="c_image" /> 	<img style='width: 100px; head100px;' src="customer_images/<?php echo $image; ?>"><br>

		<input class="input" 	type="submit" 	name="update" 	value="Update Details" />
	</form>

<?php  
	if(isset($_POST['update'])){
					$ip 		= 	getIp();
					$u_id = $c_id;
					$u_name 		=	$_POST['c_name'];
					$u_email 		=	$_POST['c_email'];
					$u_pass 		=	$_POST['c_pass'];
					$u_city 		=	$_POST['c_city'];
					$u_contact 		=	$_POST['c_contact'];
					$u_address 		=	$_POST['c_address'];
					$u_image 		=	$_FILES['c_image']['name'];
					$u_image_tmp	=	$_FILES['c_image']['tmp_name'] ;
	
	move_uploaded_file($u_image_tmp, "customer_images/$u_image");

	$update_details = "UPDATE customers SET 
					customer_name 	= '$u_name'	,
					customer_email 	= '$u_email',
					customer_pass	= '$u_pass' ,
					customer_city 	= '$u_city',
					customer_contact= '$u_contact',
					customer_address= '$u_address',
					customer_image  = '$u_image' WHERE 
					customer_id 	= '$u_id' ";

	$run = mysqli_query ($con, $update_details);				

	if ($run)
		echo "<script> alert('Details Updated'); </script>";
		echo "<script> window.open ('my_account.php','_self') </script>";
	}

?>