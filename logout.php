<?php 
	session_start();
	//session_destroy();
	unset($_SESSION['userData']);
	unset($_SESSION['adminData']);
	$_SESSION['msg'] = "Logout Successfully";
	header("location:index.php");
?>