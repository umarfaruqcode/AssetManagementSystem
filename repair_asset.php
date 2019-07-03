 <?php
  include 'config/dbconnection.php';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {

        $serial_no = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['serial_no'])))));
        $asset_no = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['asset_no'])))));
        $condition = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['condition'])))));
        $warrant_exipirey = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['warrant_exipirey'])))));
        $info = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['info'])))));
        $description = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['description'])))));
        
          $sql = "
           INSERT INTO repair(serial_no, asset_no, conditions, warrant, repair_info, description)
           VALUES('$serial_no', '$asset_no', '$condition', '$warrant_exipirey', '$info', '$description')";
           $query_run = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

          if ($query_run) {
            echo "<script>
          alert('Added');
          window.location = 'repair_asset.php';
        </script>";
          }else {
         echo "<script>
          alert('problem');
          window.location = 'repair_asset.php';
        </script>";
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
        <a href="#!" class="brand-logo" style="margin-left: 50px;">Repair Assets</a>
        <ul class="right hide-on-med-and-down" style="margin-right: 302px;">
          <!-- <li><a href="#"><i class="material-icons">settings</i></a></li> -->
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
    <li><a class="waves-effect" href="report.php">Write Reports</a></li>
    <li><a class="waves-effect" href="show_report.php">View Reports</a></li>
    <!-- <li><a class="waves-effect" href="message.php">Write Message</a></li> -->
    <li><a class="waves-effect" href="approve.php">Aprrove Users</a></li>
    <li><a class="waves-effect" href="user_report.php">User Report</a></li>

  </ul>
  <h6 style="text-align: center;">Asset Repair Informations</h6>
    <div class="row container">
      <form class="col s12" method="post" action="">
        <div class="row">
          <div class="input-field col s6">
            <input id="serial_no" name="serial_no" type="text" class="validate">
            <label for="serial_no">serial number</label>
          </div>
          <div class="input-field col s6">
            <input id="asset_no" name="asset_no" type="text" class="validate">
            <label for="asset_no">Asset number</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <select name="condition">
              <option value="" disabled selected>Choose your option</option>
              <option value="new">new</option>
              <option value="good">good</option>
              <option value="fair">fair</option>
              <option value="poor">poor</option>
            </select>
            <label>Condition</label>
          </div>
           <div class="col s6">
            <label for="warrant_exipirey">warrant expirey</label>
            <input id="warrant_exipirey" name="warrant_exipirey" type="text" class="datepicker">
          </div> 
          </div>
            <h6 style="text-align: center;">Repair Information</h6>
             <div class="row">
              <div class="col s6 offset-s3">
                <select name="info">
                  <option disabled selected>Choose your option</option>
                  <option value="inspection">inspection</option>
                  <option value="maintanance">maintanace</option>
                </select>
                <label>Condition</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="textarea1" name="description" class="materialize-textarea"></textarea>
                <label for="textarea1">Description</label>
              </div>
            </div>
      <div class="container center">
        <button class="btn waves-effect waves-light" type="submit" name="submit">Submit<i class="fa fa-sign-in"></i></button>
      </div>
      </form>
      <br>
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