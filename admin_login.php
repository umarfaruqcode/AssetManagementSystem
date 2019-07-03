<?php include 'header1.php';
ob_start();
session_start();

include 'config/dbconnection.php';
  if(isset($_POST['action'])){
    $name = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = mysqli_query($mysqli, "SELECT * FROM admin WHERE Username='$name' AND Password='$password'") or die(mysqli_error($mysqli));
    if(mysqli_num_rows($sql) == 1){
        $row = mysqli_fetch_assoc($sql);
        // $_SESSION['username'] = $row['username'];
        echo "<script>
          alert('Successfully Logged In');
          window.location = 'dashboardA.php';
        </script>";
    }else{
      $msg = "Incorrect username or password!";
    }
  }
 ?>

<div class="container">
  <div class="row">
  </div>
  <div class="row">
    <div class="col s12 l2 m12"></div>
    <div class="col s12 l8 m12">
      
      <!-- Login -->
      <div class="card blue blue darken-3">
        <div class="card-content white-text">
          <span class="card-title center">SIGN IN [ADMINISTRATOR]</span>
           <div class="row">
            <form method="POST" action="admin_login.php">
              <div class="row">
                <div class="col s12 l2"></div>
                <div id="" class="col s12 l8">
                    <div class="input-field col s12 l12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="username" name="username" type="text" class="validate">
                    <label for="username">Username</label>
                  </div>
                  <div class="input-field col s12 l12">
                    <i class="material-icons prefix">lock</i>
                    <input id="password" type="password" name="password" class="validate">
                    <label for="password">Password</label>
                  </div>
                  <div class="container center">
                  <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="fa fa-sign-in"></i>
                </div>
                 <?php if(isset($msg)){ ?>
                <br> <span class='center white-text'><?=$msg;?></span>
                <?php } ?>
              </div>
                <div class="col s12 l2"></div>
              </div>
            </form>
          </div>
        </div>
         <!-- <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a> -->
      </div>

    </div>
    <div class="col s12 l2 m12"></div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('.tabs').tabs();
  });
</script>

<?php include 'footer.php'; ?>
</body>
</html>