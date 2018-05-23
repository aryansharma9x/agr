<?php 

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
	<style type="text/css">
	img{
		width: 100px;
		height: 100px;
	}

	</style>
</head>
<body>

<h1>All Customers</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Image</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
<?php include("includes/db.php") ;
  	$get_pro = 'SELECT * FROM customers';
  	$run_pro = mysqli_query($con, $get_pro);
  	$i = 0;
  	while ($row_pro = mysqli_fetch_array($run_pro) ) {
  		$c_id     =   $row_pro['customer_id'];
  		$c_name   =   $row_pro['customer_name'];
  		$c_email  =   $row_pro['customer_email'];
      $c_image  =   $row_pro['customer_image'];
  		$i++;
  	

  	?>
    <tr>
      <th scope="row"> <?php echo "$i"; ?> </th>
      <td> <?php echo "$c_name"; ?></td>
      <td> <?php echo "$c_email"; ?></td>
      <td> <img src="../customer/customer_images/<?php echo $c_image; ?>" </td>
	  <td> <a href="delete_c.php?delete_c=<?php echo $c_id ?> "> Delete </a>  </td>            
    </tr>

   <?php } ?>
  </tbody>
</table>

</body>
</html>

<?php  } ?>