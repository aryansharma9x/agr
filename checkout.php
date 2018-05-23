<!doctype> <html>
<?php 
session_start();
include('functions/functions.php');
 ?>
<head>
	<title>AGR Styles</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css">
		hr{	border: 1px solid red;		}
		ul{	text-align: left;	padding-left: 3px;		}
		li{	list-style: none;	font-size: 1.5em; text-align: left;	}
		img{width: 200px; 	height: 200px;	border: 1px solid gray; box-shadow: 0 0 3px ;}
	</style>
</head>
<body>
<div class="container-fluid">

<?php cart(); ?>

<div id="shopping_cart"> 					
	<span style="float:right; font-size:18px; padding:5px; line-height:40px;">					
	<?php 
	if(isset($_SESSION['customer_email'])){
	echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:yellow;'>Your</b>" ;
	}
	else {
	echo "<b>Welcome Guest:</b>";
	}
	?>				
<b>Shopping Cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_price(); ?> 		
	</span>
</div>			

<?php
if (!isset($_SESSION['customer_email'])){
	include ("customer_login.php");
}
else
{
	include ("payment.php");
}
?>

	</div>
</div>

</body>
</html>