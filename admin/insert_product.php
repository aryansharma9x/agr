<?php 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

?>

<!doctype> <html>
<?php include("includes/db.php") ; ?>
<head>
	<title>ADMIN | Insert Products</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
 <!-- TEXT AREA --> 	
  	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<script>tinymce.init({selector:'textarea'});</script>

  <style type="text/css">
  .resize{width: 700px; font-size: 1.5em;}
  </style>
</head>
<body>
	<div class="container resize">
	<form action="#" method="POST" enctype="multipart/form-data">
    	<h1>Insert New Product</h1> <hr>
	  <div class="form-group">
	  	<!-- TITLE -->
	  	<label for="product_title">Product Title:</label>	    
	    <input type="text" class="form-control" name="product_title" id="product_title" placeholder="title">
	  </div>

	  <!-- CATEGORY -->
	  <div class="form-group">
		<label for="product_category">Category</label>
	    <select name="product_cat" class="form-control" id="product_category">
	       <?php 
			$get_cats = 'SELECT * FROM categories ';
			$run_cats =  mysqli_query($con,$get_cats);
			while ($row_cats = mysqli_fetch_array($run_cats)) {
				$cat_id		= $row_cats['cat_id'];
				$cat_title  = $row_cats['cat_title'];
				echo "<option value='$cat_id'> $cat_title  </option>";
			}
	      ?>
	    </select>
	  </div>
	  <!-- PRICE -->
	  <div class="form-group">
	    <label for="product_price">Price</label>
	    <input type="text" class="form-control" name="product_price" id="product_price">
	  </div>
	  <!-- Description -->
	  <div class="form-group">
	    <label for="product_desc">Description</label>
	    <textarea name="product_desc" class="form-control" id="product_desc" rows="3"></textarea>
	  </div>

	  <!-- IMAGE -->
	  <div class="form-group">
	    <label for="product_image">Product Image</label>
	    <input type="file" class="form-control" id="product_image" name="image" >
	  </div>

	   <!-- KEYWORDS -->
	  <div class="form-group">
	    <label for="product_keywords">Keywords</label>
	    <input type="text" class="form-control" name="product_keywords" id="product_keywords">
	  </div>

	  <!-- SUBMIT -->
	  <input type="submit" name="submit">
	    <button name="submit" class="btn btn-primary">Submit</button>
	    
	</form>

</div>
</body>
</html>

<?php
if(isset($_POST['submit'])){
		if ($_POST['product_title'] && $_POST['product_price']){
			$title = $_POST['product_title'];
			$cat = $_POST['product_cat'];
			$price = $_POST['product_price'];
			$desc = $_POST['product_desc'];	
			$keywords = $_POST['product_keywords'];

			$image= $_FILES['image']['name'];
			$image_temp= $_FILES['image']['tmp_name'];
			move_uploaded_file($image_temp, "images/$image");
			echo "<script> alert('Received') </script>";
		}
		else {echo "<script> alert('Not Received') </script>";	}
	
	$sql = "INSERT INTO products (product_cat,product_title,product_price,product_desc,product_image,product_keywords) VALUES ('$cat','$title','$price','$desc','$image','$keywords')";
	$query  =	mysqli_query($con, $sql);
	
	if ($query) {	echo "<script> alert('Added') </script>";	}
}
?>
<?php  } ?>