<link type="text/css" rel="stylesheet" href="css/sweetalert.css"/>
 <?php
  include 'config/dbconnection.php';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {

        $asset_type = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['asset_type'])))));
        $manufacturer = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['manufacturer'])))));
        $model = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['model'])))));
        $serial_no = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['serial_no'])))));
        $asset_no = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['asset_no'])))));
        $asset_name = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['asset_name'])))));
        $conditions = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['conditions'])))));
        $purchase_price = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['purchase_price'])))));
        $expected_asset_life = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['expected_asset_life'])))));
        $scrap_value = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['scrap_value'])))));
        $purchase_date = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['purchase_date'])))));
        $sql = "SELECT * FROM asset WHERE asset_name='$asset_name'";
        $query_run = mysqli_query($mysqli, $sql);
        $num_row = mysqli_num_rows($query_run);

          if ($num_row === 0) {
          $sql = "
           INSERT INTO asset(asset_type, manufacturer, model, serial_no, asset_no, asset_name, conditions, purchase_price, expected_asset_life, scrap_value, purchase_date)
           VALUES('$asset_type', '$manufacturer', '$model', '$serial_no', '$asset_no', '$asset_name', '$conditions', '$purchase_price',  '$expected_asset_life', '$scrap_value', '$purchase_date' )";
           $query_run = mysqli_query($mysqli, $sql);

          if ($query_run === true) {
            echo "<script>
          alert('Added');
          window.location = 'dashboardA.php';
        </script>";
          }else {
         echo "<script>
          alert('Asset already exist');
          window.location = 'dashboardA.php';
        </script>";
        }
  }

}

}
?>
<!DOCTYPE html>
<html>
<head>
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <!-- <link type="text/css" rel="stylesheet" href="css/sweetalert.css"/> -->
  <link type="text/css" rel="stylesheet" href="css/materialize/css/icon.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/sweetalert.css"/>
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
      window.location.href = 'add_asset.php';
    }
  }
  </script>
</head>
<header>
      <div class="navbar-fixed">
    <nav class="blue">
      <div class="nav-wrapper">
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <a href="#!" class="brand-logo" style="margin-left: 50px;">Add Assets</a>
        <ul class="right hide-on-med-and-down" style="margin-right: 302px;">
          <!-- <li><a href="setting.php"><i class="material-icons">settings</i></a></li> -->
          <li><a onclick="logout()" href="#">SIGN OUT <i class = "fa fa-sign-out"></i></a></li>
        </ul>
      </div>
    </nav>
  </div>
    <ul id="slide-out" class="sidenav sidenav-fixed">
      <li><div class="user-view">
      <a href="#user"><img class="circle" src="images/maleavatar.jpg"></a>
      <a href="#name"><span class="black-text name">John Doe</span></a>
      <a href="#email"><span class="black-text email">jdandturk@gmail.com</span></a>
    </div></li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Assets</a>
            <div class="collapsible-body">
              <ul>
                <li><a href="add_asset.php"><i class="fa fa-pencil"></i> Add Assets</a></li>
                <li><a href="view_asset.php"><i class="fa fa-eye"></i> View Assets</a></li>
                <li><a href="repair_asset.php"><i class="fa fa-cog"></i>Repair</a></li>
                <li><a href="edit.php"><i class="fa fa-edit"></i> Edit</a></li>
              </ul>
            </div>
          </li>
        </ul>
    <!-- <li><a class="waves-effect" href="offices.php">Offices</a></li> -->
    <li><a class="waves-effect" href="report.php">Write Reports</a></li>
    <li><a class="waves-effect" href="show_report.php">View Reports</a></li>
    <!-- <li><a class="waves-effect" href="message.php">Write Message</a></li> -->
    <li><a class="waves-effect" href="approve.php">Approve Users</a></li>
    <li><a class="waves-effect" href="user_report.php">User Report</a></li>

  </ul>

  <h6 style="text-align: center;">General Information</h6>
    <div class="row container">
      <form class="col s12" method="post" action="add_asset.php">
        <div class="row ">
          <div class="input-field col s6">
            <input id="asset_type" type="text" name="asset_type" required="required" class="validate">
            <label for="asset_type">Asset Type</label>
          </div>
          <div class="input-field col s6">
            <input id="manufacturer" type="text" name="manufacturer" required="required" class="validate">
            <label for="manufacturer">Manufacturer</label>
          </div>
          <div class="input-field col s6" style="margin-left: 200px;">
            <input id="model" type="text" name="model" required="required" class="validate">
            <label for="model">Model</label>
          </div>
      </div>
       <h6 style="text-align: center;">Asset Informations</h6>
    <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s6">
            <input id="serial_no" type="text" name="serial_no" required="required" class="validate">
            <label for="serial_no">Serial Number</label>
          </div>
          <div class="input-field col s6">
            <input id="asset_no" type="text" name="asset_no" required="required"  class="validate">
            <label for="asset_no">Asset Number</label>
          </div>
        </div>
        <div class="row">
           <div class="input-field col s6">
            <input id="asset_name" type="text" name="asset_name" required="required" class="validate">
            <label for="asset_name">Asset Name</label>
          </div>
          <div class="input-field col s6">
            <input id="conditions" type="text" name="conditions" required="required" class="validate">
            <label for="condition">Condition (type new, fair, good, poor)</label>
          </div>
          </div> 
      </div>
       <h6 style="text-align: center;">Finance Informations</h6>
    <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s6">
            <input id="purchase_price" type="text" name="purchase_price" required="required" class="validate">
            <label for="purchase_price">purchase price</label>
          </div>
          <div class="input-field col s6">
            <input id="expected_asset_life" type="text" name="expected_asset_life" required="required" class="validate">
            <label for="expected_asset_life">expected asset life (in years)</label>
          </div>
        </div>
          <div class="row">        
          <div class="input-field col s6">
            <input id="scrap_value" type="text" name="scrap_value" required="required" class="validate">
            <label for="scrap_value" >scrap value</label>
          </div>
          <div class="col s6">
            <label for="Purchase_date">Purchace Date</label>
          <input id="Purchase_date" type="text" name="purchase_date" required="required" class="datepicker">
          </div>
      </div>
      <div class="container center">
        <button class="btn waves-effect waves-light" type="submit" value="submit" id="submit" name="submit">Submit<i class="fa fa-sign-in"></i>
      </div>
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/sweetalert.min.js"></script>

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