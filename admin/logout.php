<?php 
	session_start();
	session_destroy();

	echo "<script>window.open('login.php?logged_out=You are logged out.','_self')  </script>";

?>