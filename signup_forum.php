<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL);
  $script = $_SERVER['PHP_SELF'];
  //echo 'test<script>alert("test")</script>';

  


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

  $sql = "SELECT * FROM f_members ORDER BY real_name";
  $qry = mysqli_query($connect, $sql);
  $result = $connect->query($sql);
  $unames = [];
  $passwords = [];
  $id_nums = [];
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      array_push($unames, $row["real_name"]); 
      array_push($passwords, $row["passwd"]);
      array_push($id_nums, $row['id_member']);
    }
  }

  $timezone = $_POST["timezone"];
  
  // new parameters for forum registry
  $id_member = (array_pop($id_nums)) + 1;
  $member_name = $_POST["uname"];
  $date_registered = time();
  $posts = 0;
  $id_group = 0;
  $Ingfile = '';
  $last_login = time();
  $real_name = $_POST['uname'];
  $instant_messages = 0;
  $unread_messages = 0;

  $new_pm = 0;
  $buddy_list = '';
  $pm_ignore_list = '';
  $pm_prefs = 0;
  $mod_prefs = '';
  $message_labels = '';
  $passwd = $_POST['passwd'];
  $openid_uri = '';
  $email_address = $_POST['email'];
  $personal_text = '';

  $gender = 0;
  $birthdate = '0000-00-00';
  $website_title = '';
  $website_url = '';
  $location = '';
  $icq = '';
  $aim = '';
  $yim = '';
  $msn = '';
  $hide_email = 0;

  $show_online = 0;
  $time_format = '';
  $signature = '';
  $time_offset = 0;
  $avatar = '';
  $pm_email_nortify = 0;
  $karma_bad = 0;
  $karma_good = 0;
  $usertitle = '';
  $notify_announcements = 1;

  $notify_regularly = 1;
  $notify_send_body = 0;
  $notify_types = 2;
  $member_ip = 0;
  $member_ip2 = 0;
  $secret_question = '';
  $secret_answer = '';
  $id_theme = 0;
  $is_activated = 1;
  $validaiton_code = '';

  $id_msg_last_visit = 0;
  $additional_groups = '';
  $smiley_set = '';
  $id_post_group = 4;
  $total_time_logged_in = time(); // fix later
  $password_salt = '';
  $ignore_boards = '';
  $warning = 0;
  $password_flood = 0;
  $pm_receive_from = 1;


  $p = md5($passwd); //encrypt password
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
    if ($member_name == $unames[$x]) {
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
      $blank = '';
      $vals = 'INSERT INTO f_members VALUES(?';
      for ($i = 1; $i < 60; $i++) {
        $vals = $vals . ', ?';
      }
      $vals = $vals . ')';
      $stmt = mysqli_prepare($connect, $vals);
      // 60 parameters set here
      mysqli_stmt_bind_param($stmt, 'isiiisisiiississssssissssisssiissisiiisiiiiiissiisissiissiii', $id_member, $member_name, $date_registered, $posts, $id_group, $Ingfile, $last_login, $real_name, $instant_messages, $unread_messages, $new_pm, $buddy_list, $pm_ignore_list, $pm_prefs, $mod_prefs, $message_labels, $r, $openid_uri, $email_address, $personal_text, $gender, $birthdate, $website_title, $website_url, $location, $icq, $aim, $yim, $msn, $hide_email, $show_online, $time_format, $signature, $time_offset, $avatar, $pm_email_nortify, $karma_bad, $karma_good, $usertitle, $notify_announcements, $notify_regularly, $notify_send_body, $notify_types, $member_ip, $member_ip2, $secret_question, $secret_answer, $id_theme, $is_activated, $validaiton_code, $id_msg_last_visit, $additional_groups, $smiley_set, $id_post_group, $total_time_logged_in, $password_salt, $ignore_boards, $warning, $password_flood, $pm_receive_from);  
     mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      // add action if transaction fails
      // you also need to close the sql query
      $response = "success";
      // set context to correct settings
      //require('./forum/SSI.php');
      global $context;
      $context['user']['is_guest'] = FALSE;
      setcookie("loggedin", $real_name, time() + (60 * 60 * 24)); 
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
