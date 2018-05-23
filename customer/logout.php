<?php 
session_start();
session_destroy(); 
echo "<script>window.open('../products.php','_self'); </script>";

?>
