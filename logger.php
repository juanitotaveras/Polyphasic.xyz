<?php
      //  function logger($uname, $action) {    // records which users have logged in, whether they logged in or out
	if (isset($_POST["logout"]) && isset($_POST["action"])) {
		$uname = $_COOKIE["loggedin"];
	        setcookie("loggedin", "", time() - 3600);
                unset($_COOKIE["loggedin"]);
		$action = $_POST["action"];
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
        }  // end function logger

?>
