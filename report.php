<?php include 'header2.php'; 
include 'config/dbconnection.php';
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_POST['submit'])) {

        $asset_name = mysqli_escape_string($mysqli, htmlentities(addslashes(htmlentities(trim($_POST['asset_name'])))));
        $subject = mysqli_escape_string($mysqli, htmlentities(addslashes(htmlentities(trim($_POST['subject'])))));
        $reports =mysqli_escape_string($mysqli, htmlentities(addslashes(htmlentities(trim($_POST['reports'])))));
          $sql = "
           INSERT INTO report(asset_name, subject, reports)VALUES('$asset_name', '$subject', '$reports')";
           $query_run = mysqli_query($mysqli, $sql);

          if ($query_run === true) {
            echo "<script>
          alert('Successfully Written');
          window.location = 'report.php';
        </script>";
          }
      }
  }
?>
<body>
<script type="text/javascript">
    function logout() {
    var r = confirm('Are you sure you want to logout?');
    if (r) {
      window.location.href = 'logout.php'; 
    }
    else {
      window.location.href = 'report.php';
    }
  }
  </script>
  <header>
      <div class="navbar-fixed">
    <nav class="blue">
      <div class="nav-wrapper">
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <a href="#!" class="brand-logo" style="margin-left: 30px;">Write Report</a>
        <ul class="right hide-on-med-and-down" style="margin-right: 302px;">
          <!-- <li><a href="notification.php"><i class="material-icons">notifications</i></a></li> -->
          <!-- <li><a href="#"><i class="material-icons">view_module</i></a></li> -->
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
    <!-- <li><a class="waves-effect" href="offices.php">offices</a></li> -->
    <li><a class="waves-effect" href="report.php">Write Reports</a></li>
    <li><a class="waves-effect" href="show_report.php">View Reports</a></li>
    <!-- <li><a class="waves-effect" href="message.php">Write Message</a></li> -->
    <li><a class="waves-effect" href="approve.php">Aprrove Users</a></li>
    <li><a class="waves-effect" href="user_report.php">User Report</a></li>

  </ul>
        </ul>
      </li>
   <!-- <li><a class="waves-effect" href="offices.php">offices</a></li> -->
   </ul>
  <br>
  <form class="container" method="post" action="report.php">
  <div class="row">
  	<div class="input-field col s4">
  		<input id="last_name" type="text" name="asset_name" required="required" class="validate">
        <label for="last_name">Asset name</label>
    </div>
   </div>
   <div class="row">
  	<div class="input-field col s6">
  		<input id="last_name" type="text" name="subject" required="required" class="validate">
        <label for="last_name">Subject</label>
    </div>
   </div>
<!--
    <div class="row">
    <script src="ckeditor/ckeditor.js"></script>
            <textarea name="reports" placeholder="Type your Report here."  id="editor1" rows="10" cols="80">
                 
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
             -->

         <div class="input-field col s12">
          <textarea id="textarea1" required="required" name="reports" class="materialize-textarea"></textarea>
          <label for="textarea1">Report</label>
        </div>
    </div>



  	<div class="container">
        <button class="btn waves-effect waves-light" type="submit" value="submit" id="submit" name="submit">Submit<i class="fa fa-sign-in"></i>
      </div>
      <br>
  	</form>

  </header>
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/sweetalert.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.sidenav').sidenav();
      $('.collapsible').collapsible();
    });
  </script>

  <main></main>


<?php include 'footer.php'; ?>