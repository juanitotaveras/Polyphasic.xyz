<?php
        //session_start();
      //  ini_set('display_errors', 'On');   // error checking
    //    error_reporting(E_ALL);    // error checking
  //      $script = $_SERVER['PHP_SELF'];
	$levels = 1;
	require "../header.php";
	require "../Mobile_Detect.php";
	require ("../forum/SSI.php");
	$detect = new Mobile_Detect;
	$mobile = false;
	if ($detect->isMobile()) {
		$mobile = true;
	}
?>

<link rel="stylesheet" href="./chat.css">

<script src="./chat.js"></script>
<script src="../jstz.min.js"></script>

<?php
if (!isset($context['user']['is_guest'])) {
echo '<script>alert("test");</script>';

echo '
<script>
	console.log("test");
	alert("test");
	function onchat() {
		$.post("./chat_online.php", { 
			active_user: "' . $context['user']['name'] . '"
		});
	}

	function offchat() {
		$.post("chat_online.php", {
			offline_user: "' . $context['user']['name'] . '"
		});
	}
$(document).ready(function() {
	$(".logoff, a, button").click(function(){
		offchat();
	});
	window.onbeforeunload = function () {
		offchat();
	};
});
</script>';
}

?>
<!--<body onload="onchat()"> -->

<div class="row panels" id='comment_area'>
  <div class="col-xs-10" id="innercomment">

<?php
if (!isset($context['is_guest'])) {
	$uname = $context['user']['name'];
	echo "
	<script>
	  var username ='" . $uname . "';
$(document).ready(function () {
	  function postcomment() {

	    if (window.ActiveXObject) {
    	      xhr = new ActiveXObject ('Microsoft.XMLHTTP');
  	    }
  	    else if (window.XMLHttpRequest) {
	      xhr = new XMLHttpRequest();
 	    }

   	     var comment = $('#textarea').val();

	   // Only make call if there is data
	   if ((comment == null) || (comment == '')) return;




	    // Build URL
	    var url = '/chat/addcomment.php?comment=' + escape(comment) + '&uname=' + escape(username);

	    // Open connection to server
	    xhr.open ('GET', url, true);

  	    // Send request
  	    xhr.send(null);
	  }
	$(\"#textarea\").on('keyup',function(e){
		if(e.which==13){
//			alert('test');
			postcomment();  
			$(\"#textarea\").val('');
		//	$(\"#textarea\").focus();
		}
	});

});


</script>"; 
} //else { echo'<script>alert("test2");</script>';}
?>
 
  <textarea name='comment'  id='textarea'> </textarea>
  <div class="col-xs-2 col-xs-push-10">
  <input type='button' name='submit_comment' value='Submit' id='submit_button' onclick='postcomment()' class='btn'>
  </div> <!-- end col xs -->
    </div> <!-- end inner comment -->
  </div>  <!-- end comment_area -->

<!-- <div class="container-fluid panels" id="body_container">  -->

<div id="displaybox" class="row">
<!-- panel with current users -->
<div id="toprow" class="col-sm-12">
<?php
$upanel = "<div id='upanel' class='col-xs-12 col-sm-4 col-lg-1 col-lg-push-11'>
<h2> Online </h2>
<p id='active'></p>
<table id='active_table'>
<script>
// uses GET to see active users and displays them
var active = setInterval(function() {\$.get('chat_online.php', function(data) {
  if ($('#active_table').innerHTML != data) { 
  $('#active_table').html(data); };
});

}, 2000);


</script>
</table>
</div>   <!-- end upanel -->";

$comments = "<div id='inner_box' class='col-xs-12 col-sm-6  col-lg-11 col-lg-pull-1'>
<table id='comment_table' class='table-responsive table'>
</table>
</div> <!-- end inner box -->";
	if (!$mobile) {
		echo ($upanel . $comments);
	}
	else {
		echo ($comments . $upanel);
	}
echo "
<script>
var refresh = setInterval(function() {
	$.get(\"./refresh.php\", 
	{";
if (isset($_COOKIE['loggedin'])) {
	echo"
		user : \"" . $_COOKIE['loggedin'] . "\"
	";
}
echo "
	},	
	function(response) {
	
		var tbl = $(\"#comment_table\");
		
		var comments = response.split(\"@@@@\");
		
		var array = new Array();
		for (var x = 0; x < comments.length; x ++) {
			var comment = comments[x].split(\"****\");
			array.push(comment);
		}	
		
		var output = \"\";
		var d = new Date();
		var n = d.getTimezoneOffset();
		if (n % 60 == 0) {    // if time offset is in hours exactly
			var offset = (n/60);
			var minn = false; // indicates minutes do not need to be changed
			//console.log(\"offset:\" + offset);
		}
		else {
			var hrs = n // 60;
			var mins = offset - (hrs * 60);	
			var minn = true; // indicates minutes do need to be changed
		}
		for (var x = 0; x < array.length; x ++) {
			var timeout = array[x][0];
			// set time to proper time zone
			timeout = timeout.split(\":\");
			if (minn == false) {
				var unset = parseInt(timeout[0]);
				var newhour = unset - offset;
				if (newhour < 0 && minn == false) {
					newhour = 24 + newhour;
				}		
			}
			var newtime = newhour.toString() + ':' + timeout[1] + ':' + timeout[2];
			var nameout = array[x][1];
			var commentout = array[x][2];
			// process emoticons
		/*	var emoticon_table = new Array();
			for (var x = 0; x < emoticon_table.length; x ++) {
				if (comment.search(x) != -1) {  // if emoticon found in comment
					console.log('found');	
				}
			} */
			output = output +
				\"<tr><td class='timecell' style='width:5px'><div class='timediv'>\" + newtime + \"</div></td><td class='namecell'><div class='namediv'>\" + nameout + \"</div></td><td class='commentcell'><div class='commentdiv'>\" + commentout + \"</div></td></tr>\";
		}
		//console.log(output);
		$(\"#comment_table\").html(output);
	
	}
	);
}, 500);



</script>";


?>
</div> 
</div>
</div> <!-- end displaybox -->
<!--</div> end body_container -->

<!-- This function sends the database the user and time of viewing chat. Send new every two seconds. -->
<?php /*
	
		if (isset($_COOKIE['loggedin'])) {
			echo "<script>
				var uname ='" . $_COOKIE['loggedin'] . "';";
		}
		else {
			echo "<script>
				var uname='uname';";
		}
	echo "
	var log = setInterval(function() {
		var addr = './currentusers.php?uname=' + escape(uname);
		$.get(addr);  

		 }, 2000);
</script>"; */
?>
<!--
<h3 id = "login_text"> Log in to chat </h3>
<img src="./chatbox.png" alt="chatbox" id="chatbox"> 

  <div class="footer" id="demo">
    created 10/9/2015
    &copy; Polyphasic.xyz - Kayne Khoury, Juanito Taveras
  </div> -->
</div>
</div><!--</div> -->
</body>
</html>

