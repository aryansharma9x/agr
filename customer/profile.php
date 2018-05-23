<?php
session_start();
include('../functions/functions.php') ?>
<!doctype><html>
<head>
	<title>AGR Clothings</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: "Lato", sans-serif;
}
ul, li { list-style: none; }
.sidenav {
    height: 100%;
    width: 240px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 20px;}
.sidenav a {
    padding: 6px 6px 6px 28px;
    text-decoration: none;
    font-size: 18px;
    color: #818181;
    display: block;}
.sidenav a:hover {   color: #f1f1f1;}
.sidenav h5{
	text-align: center;
	color: white;}
.main {    margin-left: 260px; /* Same as the width of the sidenav */}
.img-radius{
	margin: 0 auto;
	border: 2px solid yellow;
	border-radius: 50%;
	width: 55%;
	height: 20%;
	padding: 7px;}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}}
</style>
</head>
<body>

<div class="sidenav">
	<img class="img-radius center-block" src="customer_images/user.png" align="middle">
	<h5> <?php	
		$user = $_SESSION['customer_email'];				
		$get_img = "SELECT * from customers where customer_email='$user'";			
		$run_img = mysqli_query($con, $get_img); 			
		$row_img = mysqli_fetch_array($run_img); 		
		$c_name = $row_img['customer_name'];				
		echo "$c_name";
		?> 
	</h5>

	<h5><?php 
		if(isset($_SESSION['customer_email'])){
		echo   $_SESSION['customer_email'] ;
			}	?>
	</h5> 
	
	<hr>

<!-- SIDE MENU	 -->
	<ul>
		<li><a href="my_account?my_orders" >My Orders</a></li>
		<li><a href="my_account.php?edit_account">Edit Account</a></li>
		<li><a href="my_account.php?change_pass">Change Password</a></li>
		<li><a href="my_account.php?delete_account">Delete Account</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>	

</div>

<div class="main">
  <?php 
	if (isset($_GET['edit_account']))
		include 'edit_account.php';
	
	if (isset($_GET['change_pass'])) 
		include 'change_pass';
	
	if(isset($_GET['delete_account']))
		include 'delete_account.php';


?>
</div>
     
</body>
</html>