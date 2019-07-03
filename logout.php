<?php 
	include 'config/dbconnection.php';
	session_start();

	if (isset($_SESSION['username'])) {
		unset($_SESSION['username']);
	}
	header("location:admin_login.php");
 ?>
