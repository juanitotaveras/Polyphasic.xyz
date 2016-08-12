<!--

function drop(id) {
	$(id).dropdown("toggle");
}                                            


$(document).ready(function() {
	// Activates popups and tooltips
	$('[data-toggle="popover"]').popover();
	$('[data-toggle="tooltip"]').tooltip();

	var first_icon_append = false;
	$("#usname").focusout(function() {
		
		var uname_correct = false;
		var uname_message = "";
		var check = 0;
		var uname = $("#usname").val();
		if ((uname.length >= 3 && uname.length <= 20)) {
			check ++;
		} 
		else {
			uname_message = "Username must be 3 - 20 characters in length.";
			uname_correct == false;
		} 
		if (!/[\w\d\-]/i.test(uname)) {  // if something that is not a letter, digit, underscore, hyphen found
			uname_message = "Username can only contain letters, digits, underscores, and hyphens.";
			uname_correct == false;
		}
		else {
			check ++;
		}

		if (check > 1) {
		$.post("../signup_checkusername.php", {
			username : uname
			},
			function(response) {
				if (response == "not_taken") {
					uname_correct = true;
					if (first_icon_append) {
						console.log("uname_correct:" + uname_correct);
						$("#check_icon_1").attr("class", "glyphicon glyphicon-ok");
						uname_message = "Username is available.";
						$("#check_icon_1").attr("title", uname_message);
					}
				}
				else {
					uname_message = "Username has already been taken.";
				}	
			}
		);
		}
		
		if (uname_correct == false && first_icon_append == false) {
			$("#uname_field_icon").append("<span class=\"glyphicon glyphicon-remove\" id=\"check_icon_1\" data-toggle=\"popover\" title=\"Choose Another Username\" data-content=\"message\" data-placement=\"right\"></span>");
			first_icon_append = true;
		}
		if (uname_correct == false && first_icon_append == true) {
			if ($("#check_icon_1").attr("class") == "glyphicon glyphicon-ok") {
				$("#check_icon_1").attr("class", "glyphicon glyphicon-remove");
			}	
		}
		$("#check_icon_1").attr("title", uname_message);
		console.log(uname_message);
		console.log(first_icon_append);
		console.log("uname_correct2:" +uname_correct);
		if ($("#usname").val() == "") {
			$("#check_icon_1").attr("class", "");
			first_icon_append = false;
		}
	}); //ends usname.keypress
	var second_icon_append = false;
	$("#pswd").focusout(function() {
		var password = $("#pswd").val();
		if (password == "") {
			$("#password_field_icon").remove();
			second_icon_append = false;
		}
		if (password.length < 3) {
			if (!second_icon_append) {
				$("#password_field_icon").append("<span class=\"glyphicon glyphicon-remove\" id=\"check_icon_2\" data-toggle=\"popover\" title=\"Password must be at least three characters long.\" data-placement=\"right\"></span>");
				second_icon_append = true;
			}
			else {
				$("#check_icon_2").attr("class", "glyphicon glyphicon-remove");
				$("#check_icon_2").attr("title", "Password must be at least three characters long.");
			}
		}
		else {
			if (!second_icon_append) {
				$("#password_field_icon").append("<span class=\"glyphicon glyphicon-ok\" id=\"check_icon_2\"></span>");
				second_icon_append = true;
			}
			else {
				$("#check_icon_2").attr("class", "glyphicon glyphicon-ok");
			}
		}
// copypasted (check this)
		if ($("#pswd").val() != $("#repeat").val()) {
			if (!third_icon_append) {
				$("#repeat_field_icon").append("<span class =\"glyphicon glyphicon-remove\" id=\"check_icon_3\" data-toggle=\"popover\" title=\"Password and repeat password must match\" data-placement=\"right\"></span>");				
				third_icon_append = true;
			}
			else {
				$("#check_icon_3").attr("class", "glyphicon glyphicon-remove");
			}
		}
		else {
			if (third_icon_append) {
				$("#check_icon_3").attr("class", "glyphicon glyphicon-ok");
			}
			else {
				$("#repeat_field_icon").append("<span class=\"glyphicon glyphicon-ok\" id=\"check_icon_3\"></span>");
				third_icon_append = true;
			}
		}
// end copypasta
//	});

	}); //end #pswd.focusout
	var third_icon_append = false;
	$("#repeat").focusout(function() {
		if ($("#pswd").val() != $("#repeat").val()) {
			if (!third_icon_append) {
				$("#repeat_field_icon").append("<span class =\"glyphicon glyphicon-remove\" id=\"check_icon_3\" data-toggle=\"popover\" title=\"Password and repeat password must match\" data-placement=\"right\"></span>");				
				third_icon_append = true;
			}
			else {
				$("#check_icon_3").attr("class", "glyphicon glyphicon-remove");
			}
		}
		else {
			if (third_icon_append) {
				$("#check_icon_3").attr("class", "glyphicon glyphicon-ok");
			}
			else {
				$("#repeat_field_icon").append("<span class=\"glyphicon glyphicon-ok\" id=\"check_icon_3\"></span>");
				third_icon_append = true;
			}
		}

	});

// if everything has been validated
$("#signup_button").click(function() {		
	if ($("#check_icon_1").attr("class") == "glyphicon glyphicon-ok" && $("#check_icon_2").attr("class") == "glyphicon glyphicon-ok" && $("#check_icon_3").attr("class") == "glyphicon glyphicon-ok") {
		$.post("../signup.php", {
			uname : $("#usname").val(),
			passwd : $("#pswd").val(),
			repeat : $("#repeat").val()
		},
		function(response) {
			response.trim();
			if (response == "success" ) {
				alert("Signed up successfully.");
				window.location.reload(true);
			}
			else {
				alert("Sign up not successful. Try again.");
			//	alert(response);
				console.log(response);
			}
		});
	}
});
$("#login_button").click(function() {
        $.post("../login.php", {
                uname : $("#usrname").val(),
                passwd : $("#psw").val()
        },
        function(response) {
                response.trim();
                if (response == "success") {
                        alert("Logged in successfully.");
                        window.location.reload(true);
                }
        }); // ends post

}); //ends login_button.click
	
$("#logoutbtn").click(function() {
        $.post("../logger.php", {
                logout : "logout",
                action : "out"
        },
        function(response) {
                response.trim();
                if (response == "success") {
                        alert("You have been logged out.");
                        window.location.reload(true);
                }
        });
}); // ends logoutbtn.click     

// activates sign up modal
$("#signupbtn").click(function(){
	$("#signupModal").modal();
}); // ends signupbtn modal

// activates log in modal
$("#loginbtn").click(function(){
	$("#loginModal").modal();
});
//
//

}); // ends document.ready
-->
