<?php
  /* returns true if username has not been taken
  ./home.js calls this from the register() function.
  created 2/28/16 Juanito Taveras
                */
  ini_set('display_errors', 'On');
  error_reporting(E_ALL);
  $script = $_SERVER['PHP_SELF'];

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

  // fetch usernames from database
  $sql = 'SELECT * FROM f_members ORDER BY real_name';
  $qry = mysqli_query($connect, $sql);
  $result = $connect->query($sql);
  $unames = [];
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      array_push($unames, $row["real_name"]);
    }
  }


  if (isset($_POST["username"])) {
    $username = $_POST["username"];
    if (in_array($username, $unames)) {
      echo "taken";
    }    
    else {
      echo "not_taken";
    }
  }
?>
