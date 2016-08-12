<?php
  //ini_set('display_errors', 'On');
  //error_reporting(E_ALL);
  //$script = $_SERVER['PHP_SELF'];
//  echo "test";

  


function register() {
  // open db file from root and get db login info
  $file = fopen("/home/thatfatdood/db.txt", "r") or die("Error opening file.");
  $dbinfo = [];
  while (!feof($file)) {
    $info = trim(fgets($file));
    array_push($dbinfo, $info);
  }
  $connect = mysqli_connect($dbinfo[0], $dbinfo[1], $dbinfo[2], $dbinfo[3], $dbinfo[4]);
  if (empty($connect)) {
    die ("mysqli_connect failed " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM MEMBERS ORDER BY USERNAME";
  $qry = mysqli_query($connect, $sql);
  $result = $connect->query($sql);
  $unames = [];
  $passwords = [];
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      array_push($unames, $row["USERNAME"]); 
      array_push($passwords, $row["PASSWORD"]);
    }
  }

  $u = $_POST["uname"];
  $p = $_POST["passwd"];
  $email = $_POST["email"];
  $timezone = $_POST["timezone"];
  
  $p = md5($p); //encrypt password
  $r = $_POST["repeat"];
  $r = md5($r); //encrypt repeat password
  $opt = $_POST["opt"];
  
  if ($opt == "true") {
    $opt_in = 1;
   // echo "true";
  }
  else {
    $opt_in = 0;
   // echo "false";
  }
  $taken = FALSE;
  for ($x = 0; $x < count($unames); $x ++) { //checks if username is taken
    if ($u == $unames[$x]) {
      $taken = TRUE;
      $index = $x;
    }
  }
  if (!$taken) {                        // if username not in passwd.txt
  //  $_SESSION["loggedin"] = TRUE;
    if ($p == $r) {    // if password and repeat match 
      date_default_timezone_set("UTC");
      $h = date("H");
      $i = date("i");
      $s = date("s");
      $time = date("Y-m-d") . " " . $h . ":" . $i . ":" . $s;
      //echo $time;
      $blank = "";
      $stmt = mysqli_prepare($connect, "INSERT INTO MEMBERS VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
      mysqli_stmt_bind_param($stmt, 'ssssisss', $u, $p, $timezone, $email, $opt_in, $time, $time, $blank);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      // add action if transaction fails
      // you also need to close the sql query
      $response = "success";
      setcookie("loggedin", $u, time() + (60 * 60 * 24)); 
      echo $response;
    }
    else {
      echo "password and repeat password must match.";
    }
  }
  else {
    echo "username has been taken.";
  }
}

if (count($_POST) > 0) {
	register();
}
