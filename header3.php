<!DOCTYPE html>
<html>
<head>
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/sweetalert.css"/>
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
</head>
<body onload="swal('Hello', 'World', 'success');">
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/sweetalert.min.js"></script>
  <!--navbar-->
   <!-- <nav>
    <div class="blue nav-wrapper">
      <div class="container">
        <a href="#" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="sass.html">Sass</a></li>
          <li><a href="badges.html">Components</a></li>
          <li><a href="collapsible.html">JavaScript</a></li>
        </ul>
        </div>
    </div>
  </nav> -->
  <header>
      <div class="navbar-fixed">
    <nav class="blue">
      <div class="nav-wrapper">
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <a href="#!" class="brand-logo" style="margin-left: 30px;">User</a>
        <ul class="right hide-on-med-and-down" style="margin-right: 302px;">
          <li><a href="notification.php"><i class="material-icons">notifications</i></a></li>
          <li><a href="#"><i class="material-icons">view_module</i></a></li>
          <li><a href="#"><i class="material-icons">settings</i></a></li>
        </ul>
      </div>
    </nav>
  </div>
  <ul id="slide-out" class="collapsible sidenav-fixed sidenav">
    <li><div class="user-view">
      <div class="background red">
        <!-- <img src="images/noavatar.png"> -->
      </div>
      <a href="#user"><img class="circle container large" src="images/passpt.png"></a>
      <a href="#name"><span class="white-text center name">John Doe</span></a>
      <a href="#email"><span class="white-text center email">jdandturk@gmail.com</span></a>
    </div></li>
    <!-- <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li> -->
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i>First</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">place</i>Second</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
  </ul>


  </header>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.sidenav').sidenav();
      $('.collapsible').collapsible();
    });
  </script>

  <main></main>

