<?php
  // include SSI.php
  include("../forum/SSI.php");
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

  if (!isset($context['is_guest'])) {
 // if (isset($_GET['user'])) {
   
      $active = $context['user']['name'];
      $status = "ONLINE";
      $t = time();
      $stmt = mysqli_prepare ($connect, "INSERT INTO CHAT_ONLINE VALUES (?, ?, ?)");  // fill in the blank
      mysqli_stmt_bind_param ($stmt, 'ssi', $active, $status, $t);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      
  } 

      $stmt2 = mysqli_prepare($connect, "DELETE FROM CHAT_ONLINE WHERE TIME < (UNIX_TIMESTAMP() - 2)");
      mysqli_stmt_execute($stmt2);
      mysqli_stmt_close($stmt2); 
  $sql = "SELECT * FROM CHAT ORDER BY TIME DESC LIMIT 70";
  $qry = mysqli_query($connect, $sql);
  $result = $connect->query($sql);
  $str = "";
  if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $username = $row["USERNAME"];
        $time = $row["TIME"];  // modify to suit time zone
        $time = substr($time, 11); 
        $comment = $row["COMMENT"]; // add emojis
	$str = $str . $time . "****" . $username . "****" . $comment . "@@@@";
       /* $str = $str .
                 "<tr>
                   <td class='timecell'>" . $time . "</td>
                   <td class='namecell'>" . $username . "</td>
                   <td class='commentcell'> " . $comment . "</td>
                  </tr>"; */
       }
  }
 

   
  
  
echo $str;

?>
