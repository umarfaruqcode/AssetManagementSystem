<?php 
include 'config/dbconnection.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	mysqli_query($mysqli, "DELETE FROM asset WHERE id='$id'") or die(mysqli_error($mysqli));
	echo "<script>
		alert('Asset Deleted Successfully!');
		window.location = 'view_asset.php';
	</script>";
}else{
	header("Location: view_asset.php");
}