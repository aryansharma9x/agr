<!doctype><html>
<head>
	<title>StyleFreak</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
<style type="text/css">
/* ============================================================================*/
/*                          CONTACT PAGE                  */
/* ============================================================================*/

.main-outer{
	width: 500px;
	margin: 30px auto;
	padding-top: 60px; 
	padding-bottom: 60px;
}
.contact-form{

	padding: 20px;

}
.form-frame{
	background-color: #F8F8F8;

}
.contact textarea,input,select{
	width: 80%;
	border: 1px solid gray;
	border-radius: 2px;
	box-shadow: 0px 0px 4px gray;
	margin-bottom: 10px;
	padding: 5px;
}

.contact-button{
	width: 370px;
	margin: 20px auto;
	height: 7%;
	border: 1px solid #F8F8F8;
	border-radius: 5px;
	background-color: #1ECD97;
	color: black;
	font-weight: bold;
	font-size: 20px;
}
.contact button,textarea,select{
	margin-left: 5%;
}
option{
	padding: 5px;
	background-color: #FFFFCC;
}
.icon{
	color: white;
	font-size: 34px;
}
.f-icons{
	width: 20px;
	height: 30px;
}
/*
@media only screen and (max-width: 350px) {
   .main{
   	width: 500px;
   }

	button{
	width: 50%;
	margin: 20px auto;
	height: 7%;
	border: 1px solid #F8F8F8;
	border-radius: 5px;
	background-color: #1ECD97;
	
	font-size: 14px;
	}
	button,textarea,select{
	margin-left: 11%;
	}
	.f-icons{
	width: 20px;
	height: 20px;
	}
	.icon{
	color: white;
	font-size: 24px;
	}
	.form-frame{
	background-color: #F8F8F8;
	width: 100%;
	margin: 2%;

}*/
}

</style>
</head>

<body>

<?php include('db_connect.php') ?>
<div class="container-fluid">

	<!-- ************************           HEADER          ********************************* -->
	<header>
		<?php include('head.php') ?>
	</header>

	<!-- ************************              Heading          ********************************* -->		

	<h1>Contact us</h1>

<?php
if (isset($_POST['submit']))
{
   $name 	=	$_POST['name'];
   $email 	= 	$_POST['email'];
   $mobile 	=	$_POST['mobile'];
   // $subject=$_POST['subject'];
   $message =	$_POST['message'];
   
   $sql="insert into contactus(name, email, mobile, message) values('$name','$email','$mobile','$message')";
   if(!mysql_query($sql,$con))
   {
	   die("error".mysql_error($con));
   }
   echo "Added";
}

?>
	<div class="form-frame contact">
		<div class="main-outer">
			<form class="contact-form" method="POST" action="#">
				<legend><i class="fa fa-pencil f-icons" aria-hidden="true"></i> &nbsp; Write us</legend>

				<i class="fa fa-user f-icons" aria-hidden="true"></i>
				<input type="text" name="name" id="name" placeholder="Name" required> <br>

				<i class="fa fa-envelope f-icons" aria-hidden="true"></i>
				<input type="email" name="email" id="email" placeholder="email"  required> <br>

				<i class="fa fa-phone f-icons" aria-hidden="true"></i>
				<input type="tel" name="mobile" id="mobile" placeholder="Mobile" required> <br>

				<select required >
					<option value="" disabled selected hidden>Please Choose Issue...</option>
					<option value="1">Issues with recieved product</option>
					<option value="2">Product not received yet</option>
					<option value="3">Enquiry regarding product</option>
					<option value="4">After Sale Support</option>
					<option value="5">Complaint</option>
					<option value="6">Suggestions</option>
					<option value="7">Feedback</option>
					<option value="8">Other Issues</option>
				</select>

				<textarea name="message" id="message" rows="4" cols="48" placeholder="Message goes here"></textarea> <br>
				<input type="submit" name="submit" id="submit" class="contact-button"><i class="fa fa-paper-plane icon" aria-hidden="true"> &nbsp; Send</i></button>
			</form>
		</div>
	</div>

<footer>
	<?php  include ('footer.php') ?>
</footer>


</div>
</body>
</html>


