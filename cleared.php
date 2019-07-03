<?php 
include 'config/dbconnection.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	mysqli_query($mysqli, "UPDATE asset SET status='approved' WHERE id='$id'") or die(mysqli_error($mysqli));
	echo "<script>
		alert('Asset Successfully Approved!');
		window.location = 'view_asset.php';
	</script>";
}else{
	header("Location: view_asset.php");
}