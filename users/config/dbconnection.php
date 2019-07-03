<?php
	
	$host = "127.0.0.1";
	$dbname = "AMS";
	$username = "root";
	$password = "";

	$mysqli = mysqli_connect($host, $username, $password, $dbname);

	if ($mysqli) {
		//echo "Success";
	}
	else {
		//echo mysqli_error() or die();
		echo "Unable to Connect to DB";
	}

?>