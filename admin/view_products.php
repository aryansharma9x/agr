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

<h1>All Products</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
<?php include("includes/db.php") ;
  	$get_pro = 'SELECT * FROM products';
  	$run_pro = mysqli_query($con, $get_pro);
  	$i = 0;
  	while ($row_pro = mysqli_fetch_array($run_pro) ) {
  		$pro_id = $row_pro['product_id'];
  		$pro_title = $row_pro['product_title'];
  		$pro_image = $row_pro['product_image'];
  		$pro_price = $row_pro['product_price'];
  		$pro_desc  = $row_pro['product_desc'];
  		$i++;
  	

  	?>
    <tr>
      <th scope="row"> <?php echo "$i"; ?> </th>
      <td> <?php echo "$pro_title"; ?></td>
      <td> <img src="images/<?php echo $pro_image; ?>" </td>
      <td> <?php echo "$pro_price"; ?></td>
      <td> <?php echo "$pro_desc"; ?></td>
      <td> <a href="index.php?edit_pro=<?php echo $pro_id ?> "> Edit </a>  </td>      
	  <td> <a href="delete_pro.php?delete_pro=<?php echo $pro_id ?> "> Delete </a>  </td>            
    </tr>

   <?php } ?>
  </tbody>
</table>

</body>
</html>

<?php  } ?>