
<?php

  session_start();
  ini_set('display_errors', 'On');   // error checking
  error_reporting(E_ALL);    // error checking
  $script = $_SERVER['PHP_SELF'];


?>
<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
<title> Polyphasic.xyz </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="./home.css">

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="./jquery-2.1.4.min.js"></script> <!-- locally sourced -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="./other.js"></script>
<style>
  .modal-header, h4, .close {
      background-color: #4C0106;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #D0CBD1;
  }
</style>
</head>

<body>

<div id='main_container' class='container-fluid'>

<header>

<div class='row' id="top_row">
  <div class='col-sm-7'>
  <a  href = "./index.php">
    <img src="./polylogo_slogan.png" class="img-responsive" alt="Responsive image">
  </a>
  </div> <!-- end slogan -->
  <div class="col-sm-5">
  <table class= 'table' id='sign_in'>
    <tr>

      <td>
        <a role='button' class='btn btn-default btn-sm' href="./contact.html">Contact Us</a>
      </td>
      <td>
        <a role="button" class="btn btn-default btn-sm" href="./back.html">Donate</a>
     </td>
<?php
if (isset($_POST['logout'])){
        unset($_COOKIE['loggedin']);
        setcookie('loggedin',null,-1);
        header("Refresh:0");  // refreshes the page when you log in
}
$cookie_name = 'loggedin';
if (!isset($_COOKIE['loggedin'])){

echo "


<td>
  <!-- Trigger the Login Modal with a button -->
  <button tdefaulttton' class='btn btn-default btn-sm' id='signupbtn'>Sign Up</button>

  <!--Sign Up  Modal -->
  <div class='modal fade' id='signupModal' role='dialog'>
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header' style='padding:35px 50px;'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4><span class='glyphicon glyphicon-plus'></span> Sign Up</h4>
        </div>
        <div class='modal-body' style='padding:40px 50px;'>
          <form onsubmit = 'return validateForm()' role='form' action ='./signup.php' method ='POST'>
            <div class='form-group'>
              <label for='usrname'><span class='glyphicon glyphicon-user'></span> Username</label>
              <input type='text' class='form-control' name='uname' id='usname' placeholder='Enter username'>
            </div>
            <div class='form-group'>
              <label for='psw'><span class='glyphicon glyphicon-eye-open'></span> Password</label>
              <input type='text' class='form-control' name = 'passwd' id='pswd' placeholder='Enter password'>
            </div>
            <div class='form-group'>
              <label for='psw'><span class='glyphicon glyphicon-eye-open'></span> Confirm Password</label>
              <input type='text' class='form-control' name = 'repeat' id='repeat' placeholder='Enter password'>
            </div>
              <button type='submit' class='btn btn-default btn-block'><span class='glyphicon glyphicon-off'></span> Sign Up</button>
          </form>
        </div>
        <div class='modal-footer'>
          <p>Not a member? <a href='./sign_up.php'>Sign Up</a></p>
          <p>Forgot <a href='#'>Password?</a></p>
        </div>
      </div>
    </div>
 </div>
</td>  
<script>
$(document).ready(function(){
    $('#signupbtn').click(function(){
        $('#signupModal').modal();
    });
});
</script>
<td>
  <!-- Trigger the Login Modal with a button -->
  <button tdefaulttton' class='btn btn-default btn-sm' id='loginbtn'>Login</button>

  <!--Login  Modal -->
  <div class='modal fade' id='loginModal' role='dialog'>
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header' style='padding:35px 50px;'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4><span class='glyphicon glyphicon-lock'></span> Login</h4>
        </div>
        <div class='modal-body' style='padding:40px 50px;'>
          <form role='form' action ='".login()."' method ='POST'>
            <div class='form-group'>
              <label for='usrname'><span class='glyphicon glyphicon-user'></span> Username</label>
              <input type='text' class='form-control' name='uname' id='usrname' placeholder='Enter username'>
            </div>
            <div class='form-group'>
              <label for='psw'><span class='glyphicon glyphicon-eye-open'></span> Password</label>
              <input type='text' class='form-control' name = 'passwd' id='psw' placeholder='Enter password'>
            </div>
              <button type='submit' class='btn btn-default btn-block'><span class='glyphicon glyphicon-off'></span> Login</button>
          </form>
        </div>
        <div class='modal-footer'>
          <p>Not a member? <a href='./sign_up.php'>Sign Up</a></p>
          <p>Forgot <a href='#'>Password?</a></p>
        </div>
      </div>
    </div>
 </div>
</td>  
<script>
$(document).ready(function(){
    $('#loginbtn').click(function(){
        $('#loginModal').modal();
    });
});
</script>
 <td class = 'signin_text'>
        Not Logged In
     </td> 
     ";
}else {
        echo "
                <td class = 'signin_text'>Logged in as: ".$_COOKIE['loggedin']."</td>
                <td><form action = '".$script."' method='POST'><input type='submit' class='btn btn-default btn-xs' value ='Log Out' name='logout'></td>

        ";
}
function login(){
if (isset($_POST['uname']) && isset($_POST['passwd'])){
$uname = $_POST['uname'];
$passwd = $_POST['passwd'];
$passwd = md5($passwd);
$file = fopen('./passwd.txt',"r");
$unames = array();
$passwords = array();
while (!feof($file)) {    //while we're not at the end of the file
    $line = fgets($file);   // read line
    $line = trim($line);    // strip white space
    if (strlen($line) > 0) {  // if there is text there
      $line = explode(" : ", $line);  // split line into array of 2
      array_push($unames, $line[0]);    // push username onto username array
      array_push($passwords, $line[1]);  // push password onto password array
    }
}
  $taken = false;
  for ($x = 0; $x < count($unames); $x ++) { //checks if username is taken
    if ($uname == $unames[$x]) {
      $taken = true;
      $index = $x;
    }
  }
  if ($taken == true) {             // if username is in passwd.txt
    if ($unames[$index] == $uname && $passwords[$index] == $passwd) {   // if username and password match
      setcookie('loggedin', $uname, time() + (120));
      header("Refresh:0");
      echo "logged in successfully";
    }
 else {
      echo "incorrect username or password";
    }
  }
}
}
//$script = $_SERVER['PHP_SELF'];
?>
    </tr>
  </table>


  </div> <!-- end col-sm-5 right of slogan -->
</div> <!-- end row -->
<nav class="navbar navbar-inverse" id="navbar">
  <div class="container-fluid" id="nav_container">
    <div class="navbar-header" id="head_nav">
      <a class="navbar-brand" href="./index.php" id="home_button">Home</a>
    </div>  <!-- end head_nav -->
   <!--  <div>  -->
      <ul class="nav navbar-nav">
   <!--     <li class="active"><a href="#">Home</a></li> -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="sched_dropdown" onmouseover="drop(this)">Schedules
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="./Schedules/monophasic.html" class="sched_items">Monophasic</a></li>
            <li><a href="./Schedules/biphasic.html" class="sched_items">Biphasic</a></li>
            <li><a href="./Schedules/siesta.html" class="sched_items">Siesta</a></li>
            <li><a href="./Schedules/e3.html" class="sched_items">Everyman 3</a></li>
            <li><a href="./Schedules/dual_core.html" class="sched_items">Dual Core</a></li>
            <li><a href="./Schedules/uberman.html" class="sched_items">Uberman</a></li>
            <li><a href="./Schedules/dymaxion.html" class="sched_items">Dymaxion</a></li>
            <li><a href="./Schedules/segmented.html" class="sched_items">Segmented</a></li>
          </ul>
        </li>
        <li><a href='#'>Adaptation</a></li>
        <li><a href="http://napchart.com">Napchart</a></li>
        <li><a href="#">Research</a></li>
        <li><a href="#">Lucid Dreaming</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">Archives</a></li>

        <li class='dropdown'>
          <a class='dropdown-toggle' data-toggle='dropdown' href='#' id="community_dropdown" onmouseover='drop(this)'>Community
            <span class="caret"></span></a>
          <ul class='dropdown-menu'>
            <li><a href='./Chat/chat.php'>Chatroom</a></li>
            <li><a href="http://reddit.com/r/polyphasic">Forums</a></li>
          </ul>
        </li>  <!-- end dropdown list -->

      </ul>

      <ul class='nav navbar-nav navbar-right'>

<!--    </div> -->
<!--  </div> -->
<!-- </nav> -->
<!--            </table> -->
                <form class="search">
                <li id="search_container"><input type='text' id='search' size='20'>
                <input type="submit" value="Search" class='btn'></form></li>

       </ul>
</div>
<!-- </div> -->
</nav>
        </header>
</html>
