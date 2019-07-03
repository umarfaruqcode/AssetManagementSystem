<?php
include 'config/dbconnection.php';
ob_start();
session_start();
$username = $_SESSION['username'];
$sqli = mysqli_query($mysqli, "SELECT * FROM users WHERE username = '$username'") or die(mysqli_error($mysqli));
$rowx = mysqli_fetch_array($sqli);

	if(isset($_GET['id'])){
		$id = $_GET['id'];
    if(isset($_POST['update'])){
      $array = ["asset_type" => $_POST['asset_type'],
      "manufacturer" => $_POST['manufacturer'],
      "asset_name" => $_POST['asset_name'],
      "model" => $_POST['model'],
      "serial_no" => $_POST['serial_no'],
      "asset_no" => $_POST['asset_no'],
      "conditions" => $_POST['conditions'],
      "expected_asset_life" => $_POST['expected_asset_life'],
      "scrap_value" => $_POST['scrap_value'],
      "purchase_date" => $_POST['purchase_date'],
      "purchase_price" => $_POST['purchase_price']];
      foreach ($array as $key => $value) {
      $sql = mysqli_query($mysqli, "UPDATE asset SET $key='$value' WHERE id='$id'") or die(mysqli_error($mysqli));
      $msg = "Asset Updated Successfully!";
      }
    }
		$sql = mysqli_query($mysqli, "SELECT * FROM asset WHERE id='$id'") or die(mysqli_error($mysqli));
		$row = mysqli_fetch_assoc($sql);

		?>
		<!DOCTYPE html>
<html>
<head>
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <!-- <link type="text/css" rel="stylesheet" href="css/sweetalert.css"/> -->
  <link type="text/css" rel="stylesheet" href="css/materialize/css/icon.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css"  media="screen,projection"/>
  <title></title>
  <style type="text/css">
    header, main, footer {
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
    }
  </style>
  <script type="text/javascript">
    function logout() {
    var r = confirm('Are you sure you want to logout?');
    if (r) {
      window.location.href = 'logout.php'; 
    }
    else {
      window.location.href = 'edit.php';
    }
  }
  </script>
</head>
<header>
      <div class="navbar-fixed">
    <nav class="blue">
      <div class="nav-wrapper">
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <a href="#!" class="brand-logo" style="margin-left: 50px;">Edit Asset</a>
        <ul class="right hide-on-med-and-down" style="margin-right: 302px;">
          <li><a onclick="logout()" href="#">SIGN OUT <i class = "fa fa-sign-out"></i></a></li>
        </ul>
      </div>
    </nav>
  </div>
   <ul id="slide-out" class="sidenav sidenav-fixed">
      <li><div class="user-view">
      <a href="#user"><img class="circle" src="images/maleavatar.jpg"></a>
      <a href="#name"><span class="black-text name"><?php echo $rowx['username']; ?></span></a>
      <a href="#email"><span class="black-text email"><?php echo $rowx['email']; ?></span></a>
    </div></li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Assets</a>
            <div class="collapsible-body">
              <ul>
                <li><a href="add_asset.php"><i class="fa fa-pencil"></i> Add Assets</a></li>
                <li><a href="view_asset.php"><i class="fa fa-eye"></i> View Assets</a></li>
                <!-- <li><a href="repair_asset.php"><i class="fa fa-cog"></i>Repair</a></li>
                <li><a href="edit.php"><i class="fa fa-edit"></i> Edit</a></li> -->
              </ul>
            </div>
          </li>
        </ul>
    <!-- <li><a class="waves-effect" href="offices.php">offices</a></li> -->
    <li><a class="waves-effect" href="report.php">Write Reports</a></li>
    <li><a class="waves-effect" href="show_report.php">view Reports</a></li>

  </ul>
  <br>
  		<div class="row">
  			<div class="col s8 offset-s2">
        <?php if(isset($msg)){
            echo "<div class='green-text'>".$msg."</div>";
        }
        ?>
  				<form action="" method="POST">
  					<input type="hidden" name="id" value="<?php echo $id; ?>">
  					<div class="input-field">
  						<input type="text" name="asset_type" id='an' class="validate" value="<?php echo $row['asset_type']; ?>">
  						<label for="an">asset type</label>
  					</div>
  					<div class="input-field">
  						<input type="text" name="manufacturer" id='m' class="validate" value="<?php echo $row['manufacturer']; ?>">
  						<label for="m">manufacturer</label>
  					</div>
  					<div class="input-field">
  						<input type="text" name="model" id='mo' class="validate" value="<?php echo $row['model']; ?>">
  						<label for="mo">model</label>
  					</div>
  					<div class="input-field">
  						<input type="text" name="serial_no" id='sn' class="validate" value="<?php echo $row['serial_no']; ?>">
  						<label for="sn">Serial number</label>
  					</div>
  					<div class="input-field">
  						<input type="text" name="asset_no" id='at' class="validate" value="<?php echo $row['asset_no']; ?>">
  						<label for="at">Asset Number</label>
  					</div>
  					<div class="input-field">
  						<input type="text" name="asset_name" id='a' class="validate" value="<?php echo $row['asset_name']; ?>">
  						<label for="a">Asset Name</label>
  					</div>
  					<div class="input-field">
  						<input type="text" name="conditions" id='c' class="validate" value="<?php echo $row['conditions']; ?>">
  						<label for="c">conditions</label>
  					</div>
  					<div class="input-field">
  						<input type="text" name="purchase_price" id='pp' class="validate" value="<?php echo $row['purchase_price']; ?>">
  						<label for="pp">purchase price</label>
  					</div>
  					<div class="input-field">
  						<input type="text" name="expected_asset_life" id='eal' class="validate" value="<?php echo $row['expected_asset_life']; ?>">
  						<label for="eal">expected asset life</label>
  					</div>
  					<div class="input-field">
  						<input type="text" name="scrap_value" id='sv' class="validate" value="<?php echo $row['scrap_value']; ?>">
  						<label for="sv">scrap value</label>
  					</div>
  					<div class="input-field">
  						<input type="text" name="purchase_date" id='pd' class="validate" value="<?php echo $row['purchase_date']; ?>">
  						<label for="pd">purchase date</label>
  					</div>
  					<div class="container center">
        			<button class="btn waves-effect waves-light" type="update" value="update" id="update" name="update">Update<i class="fa fa-sign-in"></i>
     				</div>
  				</form>
  			</div>
  		</div>

<?php
	}else{
		header("Location: view_asset.php");
	}
 ?>
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>

  </header>

  <script type="text/javascript">
    $(document).ready(function(){
       M.AutoInit();
      $('.sidenav').sidenav();
      $('.collapsible').collapsible();
      $('select').formSelect();
      $('.datepicker').datepicker();
    });
  </script>

  <main></main>
<?php include 'footer.php'; ?>