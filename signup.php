<?php
  include 'config/dbconnection.php';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['signup'])) {
      
      if ($_POST['password1'] === $_POST['password2']) {
        $username = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['username'])))));
        $password = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim(md5($_POST['password1']))))));
        $email = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['email'])))));
        $contact = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['contact'])))));
        $gender = $mysqli->escape_string(htmlentities(addslashes(htmlentities(trim($_POST['gender'])))));

        $sql = "SELECT * FROM users WHERE email='$email'";
        $query_run = mysqli_query($mysqli, $sql);
        $num_row = mysqli_num_rows($query_run);

        if ($num_row === 0) {
          $sql = "INSERT INTO users (username, password, email, contact, gender) VALUES ('$username', '$password', '$email', '$contact', '$gender')";
          $query_run = mysqli_query($mysqli, $sql);

          if ($query_run === true) {
            echo "<script>swal('Congratulations!','".$username ." Successfully Added!', 'success')</script>";
          }
          else{
            echo "<script>swal('Error!', 'Unable to add ".$username .", please try again!', 'error')</script>";
          }
        }
        else {
          echo "<script>swal('Error!', '".$email ." already exist!', 'error')</script>";
        }
      }
      else {
        echo "<script>swal('Error!', 'Password doesn't match', 'error')</script>";
      }
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
      <div class="card blue darken-3">
        <div class="card-content white-text">
          <span class="card-title center">SIGN UP</span>
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" autocomplete="off">
           <div class="row">
            <div class="col s12">
              <div class="row">
                <div class="col s12 l2"></div>
                <div id="" class="col s12 l8">
                    <div class="input-field col s12 l12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="username" type="text" class="validate" name="username" required>
                    <label for="username">Username</label>
                  </div>
                  <div class="input-field col s12 l12">
                    <i class="material-icons prefix">lock</i>
                    <input id="password" type="password" class="validate" name="password1" required>
                    <label for="password">Password</label>
                  </div>
                <div class="input-field col s12 l12">
                    <i class="material-icons prefix">lock</i>
                    <input id="password" type="password" class="validate" name="password2" required>
                    <label for="password">Confirm Password</label>
                  </div>
                 <div class="input-field col s12 l12">
                    <i class="material-icons prefix">email</i>
                    <input id="email" type="email" class="validate" name="email" required>
                    <label for="email">Email</label>
                  </div>
                  <div class="input-field col s12 l12">
                    <i class="material-icons prefix">contact_phone</i>
                    <input id="contact_phone" type="number" class="validate" name="contact" required>
                    <label for="phone">phone number</label>
                  </div>
                  <div class="container">
                  <p>
				    <label>
				        <input name="gender" value="Male" type="radio" class="with-gap container" checked />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				        <span>Male</span>
				      </label>
				    <label>
				        <input name="gender" value="Female" type="radio" class="with-gap container">
				        <span>Female</span>
				      </label>
				    </p>
				 </div>
				 <br><br>
				 <div class="container center">
				 <button class="btn waves-effect waves-light" type="submit" name="signup">Submit
				    <i class="material-icons right ">send</i>
				  </button>
				  </div>
				  </div>
                </div>
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

<?php //include 'footer.php'; ?>
</body>
</html>