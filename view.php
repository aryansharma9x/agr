<doctype> 
<?php
include ('functions/functions.php')
?>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">


	<style type="text/css">
	.body{
		background-color: 	#F5FFFA;
	}
	.wrapper {
  margin: 0 auto;
  text-align: center;
}

.image-gallery {
	display: table;
}

.primary,
.thumbnails {
  display: table-cell;
}

.thumbnails {
  width: 130px;
}

.primary {
  width: 500px;
  height: 300px;
  background-color: #cccccc;
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
  border-radius: 5px;
}

.thumbnail:hover .thumbnail-image, .selected .thumbnail-image {
  border: 4px solid steelblue;
}

.thumbnail-image {
  width: 100px;
  height: 100px;
  margin: 10px auto;
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
  border: 4px solid transparent;
}
.thumbnail{
	border: none;
	margin-bottom: 0px;
	padding: 0;
}
      body{margin:40px;
            margin-top: 5px;
          }

      .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
      }
      .btn-circle.btn-lg {
        width: 50px;
        height: 50px;
        padding: 13px 13px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 25px;
      }
 select{
  width: 40%;
  height: 6%;
  border-radius: 5px;
  padding: 5px;
  font-size: 18px;

 }     
li{
  list-style: none;
  text-align: justify;
}

.space{
  padding-top:18px; 
}

	</style>
</head>
<body>

<div class="container-fluid"> 
  <div class="row">
    <div class="head navigation col-md-12">
      <ul><?php 
        if (!isset($_SESSION['customer_email'])){
          echo "<li> <a href='checkout.php'>Login</a> </li>"; }
        else{
          echo "<li> <a href='logout.php'>Logout</a> </li> "; 
          echo "<li> <a href='customer/my_account.php'>My Account </a>  </li>";
          }
        ?>
        <li> <a href="customer_register.php">Register</a> </li>
        <li> <a href="admin/admin.php">Admin</a> </li>
        <li> <a href=""> 
          <i class="fa fa-shopping-bag" aria-hidden="true"></i>
          <span> <?php total_items(); ?> </span> Cart
        <i class="fa fa-inr cart-space" aria-hidden="true"></i>
          <span> <?php total_price(); ?> </span>
          </a> </li>
      </ul>
    </div>
  </div>
</div>

<div class="wrapper">
<header>
  <h3>Product name</h3 >
</header>
<div class="row">
	<div class="col-sm-6">
		<div class="image-gallery">
		  <aside class="thumbnails">
		    <a href="#" class="selected thumbnail" data-big="images/slide1.jpg">
		      <div class="thumbnail-image " style="background-image: url(images/slide1.jpg)"></div>
		    </a>
		    <a href="#" class="thumbnail" data-big="images/shirt3.jpg">
		      <div class="thumbnail-image" style="background-image: url(images/shirt3.jpg)"></div>
		    </a>
		     <a href="#" class="thumbnail" data-big="images/shirt4.png">
		      <div class="thumbnail-image" style="background-image: url(images/shirt4.png)"></div>
		    </a>
		    <a href="#" class="thumbnail" data-big="images/slide1.jpg">
		      <div class="thumbnail-image" style="background-image: url(images/slide1.jpg)"></div>
		    </a>
		  </aside>
		<main class="primary" style="background-image: url('images/slide3.jpg');"></main>

		
	</div>
<br><br>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
<br><br>		
	<p>
    <ul>
      <li>Material: Cotton</li>
      <li>Color: Black</li>
      <li>Pattern: Plain</li>
      <li>Occasion Type: Casual</li>
    </ul>
Disclaimer: Product colour may slightly vary due to photographic lightling sources.</p>	
</div>

<div class="col-sm-4">

    <form class="form-horizontal col-xs-10 col-xs-offset-1" method="post" action="">
       <div class="form-group">
        <div data-toggle="buttons">
        <legend>SIZE</legend>      
          <label class="btn btn-default  btn-circle btn-lg">   <input type="radio" name="q2" value="0">XS</label>
          <label class="btn btn-default  btn-circle btn-lg ">  <input type="radio" name="q2" value="1">S</i></label>
          <label class="btn btn-default  btn-circle btn-lg">   <input type="radio" name="q2" value="2">M</label>
          <label class="btn btn-default  btn-circle btn-lg">   <input type="radio" name="q2" value="2">L</label>
          <label class="btn btn-default  btn-circle btn-lg">   <input type="radio" name="q2" value="2">XL</label>
        </div>
      </div>
<br>
      <div class="form-group">
        <div data-toggle="buttons">    
        <legend>Color</legend>  
          <label class="btn btn-primary  btn-circle btn-lg">   <input type="radio" name="q2" value="0">B</label>
          <label class="btn btn-default  btn-circle btn-lg ">  <input type="radio" name="q2" value="1">W</label>
          <label class="btn btn-info  btn-circle btn-lg">  	   <input type="radio" name="q2" value="2">S</label>
          <label class="btn btn-danger  btn-circle btn-lg">    <input type="radio" name="q2" value="2">R</label>
        </div>
      </div>
<br><br>   
      <div class="form-group">
        <legend>Quantity</legend>
        <select>
          <option>  01  </option>
          <option>  02  </option>
          <option>  03  </option>
          <option>  04  </option>
          <option>  05  </option>
        </select>
      </div>  

     
<br><br>     
      <button class="btn btn-success btn-lg">Add to Cart</button><br><br> 
    </form>


</div>

</div>
<h1>Star rating</h1>
<h1>Reviews</h1>   
<h1>Other Products</h1>

</div>


<script type="text/javascript">
$('.thumbnail').on('click', function() {
  var clicked = $(this);
  var newSelection = clicked.data('big');
  var $img = $('.primary').css("background-image","url(" + newSelection + ")");
  clicked.parent().find('.thumbnail').removeClass('selected');
  clicked.addClass('selected');
  $('.primary').empty().append($img.hide().fadeIn('slow'));
});
</script>
</body>
</html>