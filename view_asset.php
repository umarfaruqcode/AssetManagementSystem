
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
      window.location.href = 'view_asset.php';
    }
  }
  </script>
  <script type="text/javascript">
    function logout() {
    var r = confirm('Are you sure you want to logout?');
    if (r) {
      window.location.href = 'logout.php'; 
    }
    else {
      window.location.href = 'view_asset.php';
    }
  }
  </script>
</head>
<header>
      <div class="navbar-fixed">
    <nav class="blue">
      <div class="nav-wrapper">
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <a href="#!" class="brand-logo" style="margin-left: 50px;">View Assets</a>
        <ul class="right hide-on-med-and-down" style="margin-right: 302px;">
 <li><a onclick="logout()" href="#">SIGN OUT <i class = "fa fa-sign-out"></i></a></li>
<!--           <li><a href="#"><i class="material-icons">settings</i></a></li>
 -->        </ul>
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
    <li><a class="waves-effect" href="approve.php">Aprrove Users</a></li>
    <li><a class="waves-effect" href="user_report.php">User Report</a></li>

  </ul>
<?php
include 'config/dbconnection.php';
if(isset($_POST['search'])){
        $key = mysqli_real_escape_string($mysqli, $_POST['search']);
        $sql = mysqli_query($mysqli, "SELECT * FROM asset WHERE asset_name LIKE '%$key%' OR manufacturer LIKE '%$key%' OR asset_type LIKE '%$key%' OR serial_no LIKE '%$key%' OR model LIKE '%$key%'") or die(mysqli_error($mysqli));
        $title = "Search Results";
}else{
  $sql = mysqli_query($mysqli, "SELECT * FROM asset ");
}
 ?>
 <div class="row">
  <div class="col s8 offset-s2">
   <form method="post" action="view_asset.php">
    <div class="input-field">
     <input type="search" name="search" class="validate" id="s">
     <label for="s"><i class="fa fa-search"></i> Search</label>
     </div> 
    <div class="center">
      <button type="submit" name="submit" class="btn btn-flat">Search</button>
    </div>
   </form>
   </div>
 </div>
 <?php if(isset($title)){
  echo "<h4 class='center'>".$title."</h4>";
 } ?>
 
 <table class="container" >
        <thead>
          <tr>
              <th>Asset Name</th>
              <th>Manufacturer</th>
              <th>Model</th>
              <th>Serial number</th>
              <th>Purchase Date</th>
              <th>Edit</th>
              <th>Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php
         while($row = mysqli_fetch_assoc($sql)){ 
         ?>

        
          <tr>
            <td><?php echo $row['asset_name'];?></td>
            <td><?php echo $row['manufacturer'];?></td>
            <td><?php echo $row['model'];?></td>
            <td><?php echo $row['serial_no'];?></td>
            <td><?php echo $row['purchase_date'];?></td>
            <td><a href="edit.php?id=<?=$row['id'];?>" class="btn btn-flat">Edit</a></td>
            <td><a onclick="alert('Are you sure you want to delete?');
      window.location = 'delete.php?id=<?php echo $row['id'];?>';" class="btn btn-flat"><i class="fa fa-trash red-text"></i></a></td>
          </tr>
        
      <?php } ?>
      </tbody>
      </table>
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