<html>

<head>

<title> Polyphasic.xyz </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="../home.css">

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>
        
        

        function drop() {
                $(".dropdown-toggle").dropdown("toggle");
                $(".sched_items").onmouseout = function() {alert("I love cake");};
        //      $(".dropdown-toggle").onmouseout = $(".dropdown-toggle").dropdown("toggle");
        }
        


</script>
<script>

        window.onload = function(){

                var a = false;
                var b = false;
                var c = false;
                document.getElementById("uinput").style.display = "none";
                document.getElementById("username").style.display = "none";
                document.getElementById("pinput").style.display = "none";
                document.getElementById("password").style.display = "none";
                document.getElementById("log_submit").style.display = "none";

                document.getElementById("term_head").onclick = function(){
                if (a == false){
                        
                                document.getElementById("termin").style.height = "250px";
                                a = true;
                        } else{
                                document.getElementById("termin").style.height = "0px";
                                a = false;
                        }

                }
                document.getElementById("stage_head").onclick = function(){
                if (b == false){
                        
                                document.getElementById("stages").style.height = "500px";
                                b = true;
                        } else{
                                document.getElementById("stages").style.height = "0px";
                                b = false;
                        }
                }
                document.getElementById("target").onclick = function(){
                if (c == false){
                                document.getElementById("uinput").style.display = "block";
                                document.getElementById("username").style.display = "block";
                                document.getElementById("pinput").style.display = "block";
                                document.getElementById("password").style.display = "block";
                                document.getElementById("log_submit").style.display = "block";
                                document.getElementById("target").style.display = "none";
                                $("#uname").focus();
                                c = true;
                        }
                }
        }
        
</script>


</head>

<body>




<div id="main">
  <table class= "table" id="sign_in">
<tr>
      <td>
        <a role="button" class="btn btn-default btn-xs"  href ="./sign_up.html"id="sign_button">Sign Up</a>
      </td>
      <td>
        <a role="button" class="btn btn-default btn-xs" href="./contact.html">Contact Us</a>
      </td>
      <td>
        <a role="button" class="btn btn-default btn-xs" href="./back.html">Donate</a>
     </td>
     <td>
        <a id="target" role="button" class="btn btn-default btn-xs">Login</a>
     </td>
     <form id = "login_form" method = "POST">
     <td id = "username" class='signin_text'>
        Username:
     </td>
     <td id = "uinput">
        <input type = "text" id = "uname" name = "uname">
     <td>
     <td id ="password" class='signin_text'>
        Password:
     </td>
     <td id = "pinput">
        <input type = "password" id = "passwd" name = "passwd">
     </td>
      <td id = "log_submit">
        <input class="btn btn-default" type = "submit" value = "login">
     </td>
     </form>
    </tr>
  </table>

<header>


<a  href = "./index.php">
        <img src="../polylogo.png" class="img-responsive" alt="Responsive image" width="50%">
</a>

<table class="row" id="navigation">
<nav class="navbar navbar-inverse" id="nav">
<nav class="navbar navbar-inverse" id="nav">
  <div class="container-fluid" id="nav2">
    <div class="navbar-header" id="head_nav">
      <a class="navbar-brand" href="./index.html" id="home_button">Home</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
   <!--     <li class="active"><a href="#">Home</a></li> -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" onmouseover="drop()">Schedules
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="./Schedules/monophasic.html" class="sched_items">Monophasic</a></li>
            <li><a href="./Schedules/biphasic.html" class="sched_items">Biphasic</a></li>
            <li><a href="./Schedules/siesta.html" class="sched_items">Siesta</a></li>
            <li><a href="./Schedules/e3.html" class="sched_items">Everyman 3</a></li>
            <li><a href="./Schedules/dual_core.html" class="sched_items">Dual Core</a></li>
            <li><a href="./Schedules/uberman.html" class="sched_items">Uberman</a></li>
            <li><a href="./Schedules/dymaxion.html" class="sched_items">Dymaxion</a></li>
            <li><a href="./Schedules/segmented.html" class="sched_items" onmouseout="drop()">Segmented</a></li>
          </ul>
        </li>
        <li><a href='#'>Adaptation</a></li>
        <li><a href="http://napchart.com">Napchart</a></li>
        <li><a href="#">Research</a></li>
        <li><a href="#">Lucid Dreaming</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">Archives</a></li>
        <li><a href="#">Community</a></li>
      </ul>
    </div>
  </div>
</nav>
                </table>
                <form class="search" align = "center">
                        <input id = 'search'type="search">
                        <input type="submit" value="search">
                </form>
        </header>

<?php



?>

<!-- Chatbox -->
<h3 id = "login_text"> Log in to chat </h3>
<img src="./Chat/chatbox.png" alt="chatbox" id="chatbox">

  <div class="footer" id="demo">
    created 10/9/2015
    &copy; Polyphasic.xyz - Kayne Khoury, Juanito Taveras
  </div>
</body>
</html>

