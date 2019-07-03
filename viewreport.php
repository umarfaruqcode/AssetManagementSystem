<?php
include 'config/dbconnection.php';
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = mysqli_query($mysqli, "SELECT * FROM report WHERE id='$id'") or die(mysqli_error($mysqli));
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
      window.location.href = 'viewreport.php';
    }
  }
  </script>
</head>
<header>
      <div class="navbar-fixed">
    <nav class="blue">
      <div class="nav-wrapper">
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <a href="#!" class="brand-logo" style="margin-left: 50px;">View Report</a>
        <ul class="right hide-on-med-and-down" style="margin-right: 302px;">
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
    <!-- <li><a class="waves-effect" href="offices.php">offices</a></li> -->
    <li><a class="waves-effect" href="report.php">Write Reports</a></li>
    <li><a class="waves-effect" href="showreport.php">View Reports</a></li>
    <!-- <li><a class="waves-effect" href="message.php">Write Message</a></li> -->
    <li><a class="waves-effect" href="approve.php">Aprrove Users</a></li>
    <li><a class="waves-effect" href="user_report.php">User Report</a></li>
  </ul>
  <br>
  		<div class="row">
  			<div class="col s8 offset-s2">
  				<div class="card">
            <div class="card-content">
              <p><b>Asset Name:</b> <?=$row['asset_name'];?><p>
                  <p><b>Subject:</b> <?=$row['subject'];?></p>
                  <br><br>
                  <p><b>Report</b></p>
                  <P><?=$mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($row['reports'])))));?></P>
            </div>
            <div class="card-action">
              <button class="btn btn-flat" onclick="window.print()">Print</button>
            </div>    
          </div>
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