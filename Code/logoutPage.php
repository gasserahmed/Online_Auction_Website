<?php session_start();?>	
<?php  
header("location: http://localhost/homePage.php");
include'topBar.php'; 
$_SESSION['login_flag'] =0; 
?> 