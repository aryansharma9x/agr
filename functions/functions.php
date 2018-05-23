<?php

$con = mysqli_connect("localhost","root","","ecommerce");

// GET CATEGORIES
function getCats() {
	global $con;
	$get_cats = 'SELECT * FROM categories ';
	$run_cats =  mysqli_query($con,$get_cats);
	while ($row_cats = mysqli_fetch_array($run_cats)) {
		$cat_id		= $row_cats['cat_id'];
		$cat_title  = $row_cats['cat_title'];
		echo "<li> <a href='products.php?cats=$cat_id'> $cat_title </a>  </li>";
	}

	}

// DISPLAY ALL Products
function getPro(){
		if (!isset($_GET['cats'])){
		global $con;
		$get_pro = "SELECT * FROM products";
		$run_pro = mysqli_query($con, $get_pro);
		while ($row_pro= mysqli_fetch_array($run_pro)) {
			$pro_id 	= $row_pro['product_id'];
			$pro_title 	= $row_pro['product_title'];
			$pro_image 	= $row_pro['product_image'];
			$pro_price 	= $row_pro['product_price'];

			echo "
				<div class='row'  style='float:left; margin-left:10px; '> 
					<div class='col-sm-12 ' > 
						<img src='admin/images/$pro_image '/>
						<h4 style ='text-align:center'> $pro_title </h4>
						<h3 style ='text-align:center'> &#8377; : $pro_price </h3> 
						<a  href='details.php?id=$pro_id'> <button class='btn btn-info btn-block'>Details </button> </a>
						<p> </p>
						<a style='text-align:right' href='products.php?add_cart=$pro_id'> 
							<button class='btn btn-primary btn-block'>Add to Cart </button> </a>			
					</div>
				</div>
				";
			}
		}
	}
// SHOW AS PER CATEGORY SELECTED
function getcatPro(){
	if (isset($_GET['cats'])){
		$cat_id = $_GET['cats'];	
	global $con;
	$get_pro = "SELECT * FROM products where product_cat='$cat_id'";
	$run_pro = mysqli_query($con, $get_pro);

	$count = mysqli_num_rows($run_pro);
	if($count == 0){
		echo "<h1> Not Available </h1>";
	}
	else {
		while ($row_pro= mysqli_fetch_array($run_pro)) {
			$pro_id = $row_pro['product_id'];
			$pro_title = $row_pro['product_title'];
			$pro_image = $row_pro['product_image'];
				$pro_price = $row_pro['product_price'];
				echo "<h3> $pro_title </h3>
					<img src='admin/images/$pro_image '/>	 
					<h3> $pro_price </h3> 
					<a href='details.php?id=$pro_id'> DETAILS </a> &nbsp;&nbsp;&nbsp;
					<a href='products.php?add_cart=$pro_id'> <button>Add to Cart </button> </a>";				

			}}

		}
	}
//INSERT PRODUCTS IN TO CART
function cart(){
	if(isset($_GET['add_cart'])){
		global $con;
		$ip = getIp();
		$pro_id =  $_GET['add_cart'];
		$check_pro = "SELECT * FROM cart where ip_add = '$ip' AND p_id = '$pro_id' ";
		$run_check  =  mysqli_query($con, $check_pro);
		if(mysqli_num_rows ($run_check) > 0){
			echo "";
		}
		else{
			$insert_pro = " INSERT INTO cart (p_id, ip_add) VALUES ('$pro_id','$ip') ";
			$run_pro = mysqli_query($con, $insert_pro);
			echo "<script>window.open('products.php','_self') </script>";
		}
	}
	}

//TOTAL ITEMS
	function total_items(){
		if(isset($_GET['add_cart'])){
			global $con;
			$ip = getIp();
			$getItems = "SELECT * FROM cart WHERE ip_add='$ip'";
			$run_items = mysqli_query($con, $getItems);
			$count_items=mysqli_num_rows($run_items);
		}

		else{
			global $con;
			$ip = getIp();
			$getItems = "SELECT * FROM cart WHERE ip_add='$ip'";
			$run_items = mysqli_query($con, $getItems);
			$count_items=mysqli_num_rows($run_items);

		}
		echo $count_items;	
	}

//TOTAL PRICE
	function total_price(){
		global $con;
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
				$value = array_sum($product_price);
				$total += $value;
			}
		}
		echo "$total";
		echo "<a href='cart.php'>Go TO Cart</a>" ;

	}

	//GET IP ADDRESS
	function getIp(){
	        $ip = $_SERVER['REMOTE_ADDR'];     
	        if($ip){
	            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	                $ip = $_SERVER['HTTP_CLIENT_IP'];
	            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	            }
	            return $ip;
	        }
	        // There might not be any data
	        return false;
	    }


?>
