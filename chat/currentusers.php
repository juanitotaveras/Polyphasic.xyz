<?php
/*  $file = fopen('./chatlog.txt');
  while (!feof($file)) {
    $line = fgets($file);

  }*/
  echo "test";
  ini_set('display_errors', 'On');   // error checking
  error_reporting(E_ALL);    // error checking

  $host = "localhost";
  $user = "juanito";
  $pwd = "Puppies!9";
  $dbs = "polyphasic";
  $port = "3306";

  $connect = mysqli_connect($host, $user, $pwd, $dbs, $port);

  if (empty($connect)) {
    die("mysql_connect failed " . mysqli_connect_error());
  }
  if (isset($_GET['uname'])) {
   //  Get date
    $a = date("a");
    $h = date("h");
    $i = date("i");
    $s = date("s");
    echo (date("h"));
    echo (getdate());
    if ($a == "pm") {   // if it's in pm, change to 24 hour format for SQL
     // $h = $h + 12;
    }
    else if ($a == "am" && $h == 12) {  // if it's 12:00 am, change to 00:00
      $h = '00';
    }

    $time = date("Y-m-j") . " " . $h . ":" . $i . ":" . $s;
   // $time = trim($time);
    echo $time;
    echo $_GET['uname'];
    $stmt = mysqli_prepare ($connect, "INSERT INTO CHAT_ACTIVE VALUES (?, ?)");  // fill in the blank
    mysqli_stmt_bind_param ($stmt, 'ss', $time, $_GET['uname']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); 
   // Still need to make it delete every time the timestamp is too old
    //$delete = mysqli_prepare ($connect, "DELETE FROM CHAT_ACTIVE WHERE (TIME > (DATE_SUB(TIME, 1 SECOND)))");
    $delete = mysqli_prepare ($connect, "DELETE FROM CHAT_ACTIVE WHERE (TIME < ?)");
    $d = date("j");
    $time2 = date("Y-m") . ($d - 12) . " " . ($h) . ":" . ($i) . ":" . ($s);  // delete all entries more than one day old
    mysqli_stmt_bind_param ($delete, 's', $time2);
  //  mysqli_stmt_execute($delete);
    mysqli_stmt_close($delete); 


   }

?>
