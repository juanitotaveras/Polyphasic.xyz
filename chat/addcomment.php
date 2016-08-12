<?php
 // include("../forum/SSI.php");
  // open db file from root and get db login info
  $file = fopen("/home/thatfatdood/db.txt", "r") or die("Error opening file.");
  $dbinfo = []; 
  while (!feof($file)) {
    $info = trim(fgets($file));
    array_push($dbinfo, $info);
  }
  fclose($file);

  $connect = mysqli_connect($dbinfo[0], $dbinfo[1], $dbinfo[2], $dbinfo[3], $dbinfo[4]);

  if (empty($connect)) {
    die("mysql_connect failed " . mysqli_connect_error());
  } 

  //add comment
  if (isset($_GET['comment'])) {
    // Get date
    //setcookie("loggedin", "user", time() + (120), "/");
    date_default_timezone_set("UTC");
    $username = $_GET['uname'];
    $h = date("H");
    $i = date("i");
    $s = date("s");

    
    $time = date('Y-m-d') . ' ' . $h . ':' . $i . ':' . $s;
    $stmt = mysqli_prepare ($connect, 'INSERT INTO CHAT VALUES (?, ?, ?)');  // fill in the blank
    mysqli_stmt_bind_param ($stmt, 'sss', $username, $time, $_GET['comment']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

  }
?>
