<?php
// goes into the database and fetches the data to display the row
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

 /* if (isset($_POST['active_user'])) {

    $active = $_POST['active_user'];
    $status = "ONLINE";
  //  echo $active;
    $stmt = mysqli_prepare ($connect, "INSERT INTO CHAT_ONLINE VALUES (?, ?)");  // fill in the blank
 //   echo $stmt;
    mysqli_stmt_bind_param ($stmt, 'ss', $active, $status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);     
  }
  
  if (isset($_POST['offline_user'])) {
    $offline = $_POST['offline_user'];
    $status = "ONLINE";
    $stmt = mysqli_prepare ($connect, "DELETE FROM CHAT_ONLINE WHERE UNAME = ?");
    mysqli_stmt_bind_param ($stmt, 's', $offline);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  } */

  $sql = "SELECT * FROM CHAT_ONLINE";
  $qry = mysqli_query($connect, $sql);
  $result = $connect->query($sql);
  $str = "";
  $names = array();
  if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $uname = $row["UNAME"];
        if (!in_array($uname, $names)) {
  	  array_push($names, $uname);
       	}
      }
  }
  // sort the array here
  sort($names);
  for ($x = 0; $x < count($names); $x++) {
    $str = $str .
      "<tr>
        <td class=\"unamescell\">" . $names[$x] . "</td>
       </tr>";
  }

  echo $str;

?>
