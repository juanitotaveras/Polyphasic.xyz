<?php
	/*ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	$script = $_SERVER['PHP_SELF'];
*/

if (isset($_POST["uname"]) && isset($_POST["passwd"]) && !isset($_POST["loggedin"])){
	// open db file from root and get db info
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
	$emails = [];
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($unames, $row["USERNAME"]);
			array_push($passwords, $row["PASSWORD"]);
			array_push($emails, $row["EMAIL"]);
		}
	}

	$uname = $_POST["uname"];
	$passwd = $_POST["passwd"];
	$passwd = md5($passwd);
        $taken = false;
        for ($x = 0; $x < count($unames); $x ++) { //checks if username is taken
                if ($uname == $unames[$x] || $uname == $emails[$x]) {
                        $taken = true;
                        $index = $x;
			if ($uname == $emails[$x]) {
				$uname = $unames[$x];
			}
                }
        }
        if ($taken == true) {             // if username is in passwd.txt
                if ($unames[$index] == $uname && $passwords[$index] == $passwd) {   // if username and password match
                        setcookie('loggedin', $uname, time() + (60 * 60 * 24));
                        $action = "in";
	                $uname = $_COOKIE["loggedin"];	        	
			$log = fopen("./logger.txt", "r");
			$log_unames = array();
                	$log_times = array();
                	$log_actions = array();
               		while (!feof($log)) {
                        	$line = fgets($log);
                       		$line = trim($line);
                        	if (strlen($line) > 0) {
                                	$line = explode(";", $line);
                                	array_push($log_unames, $line[0]);
                                	array_push($log_times, $line[1]);
                                	array_push($log_actions, $line[2]);
                        	}
                	}
                	fclose($log);
                	array_push($log_unames, $uname);
                	$a = date("a");
                	$h = date("h");
                	$i = date("i");
                	$s = date("s");

                	if ($a == "pm") {   // if it's in pm, change to 24 hour format for SQL
                        	$h = $h + 12;
                	}
                	else if ($a == "am" && $h == 12) {  // if it's 12:00 am, change to 00:00
                        	$h = '00';
                	}

                	$time = date("Y-m-d") . " " . $h . ":" . $i . ":" . $s;

                	array_push($log_times, $time);
                	array_push($log_actions, $action);
                	$str = "";
                	for ($x = 0; $x < count($log_unames); $x ++) {
                        	$str = $str . $log_unames[$x] . ";" . $log_times[$x] . ";" . $log_actions[$x] . "\r\n";
                	}
                	$log = fopen("./logger.txt", "w");
                	fwrite($log, $str);
                	fclose($log);
                        echo "success";
                }
                else {
//                      echo "incorrect username or password";
                }
        }
}

?>
