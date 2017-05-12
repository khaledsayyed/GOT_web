<!DOCTYPE html>
<html>
<head>
<title>sign up</title>
<script src="jquery.js"></script>
<link href="GOT_style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
window.onload=function(){
	
	$( "#main-sidebar" ).simplerSidebar( {
	  selectors: {
	    trigger: ".toggle-sidebar",
	    quitter: ".close-sb"
	  }
	});
	$("#login_message").hide();
	$("#login_message.toggle-sidebar").click(function(){$("#login_message").hide();});
	 $(".clickFade ul").hide();
    $(".clickFade").click(function(){
        $(this).children("ul").stop(true,true).fadeToggle("fast"),
        $(this).toggleClass("dropdown-active");
    });

	
	
	
}
function check_name(){

}
function check_password(){

}
function check_email(){

}
function check_password_confirm(){
	var pass = document.getElementsByName("passwd");
	var pass2 = document.getElementsByName("passwd1");
	
	if(pass[0].value!=pass2[0].value){
		pass2[0].style.backgroundColor="#ff6666";
		document.getElementById("submit").disabled="disabled";
		//unvalid.push("passwd1");
	}
}
function view_pic(){
	document.getElementById("pic1").src= "images/"+document.getElementById("team_select1").value+".jpg";
}
</script>
</head>
<body>
<?php include("toolbar.php");?>
<div id="hello_pic"><img id="pic1" src="" title="hello_pic" alt=""></div>
<div id="signup">
<form id="register-form" action="index.php" method="GET" enctype="multipart/form-data">
	<fieldset id="signup_fieldset">
		<legend>New User Signup:</legend>

		<div>
			<strong>Name:</strong>
			<input class="data" id="nam" type="text" name="name" size="16" onblur="check_name();" />
		</div>
		<div>
			<strong>Email:</strong>
			<input class="data" type="email" name="email" size="16" onblur="check_email();" />
		</div>
		<div>
			<strong>Password:</strong>
			<input class="data" id="pass1" type="password" name="passwd" size="16" onblur="check_password()"  />
		</div>
		<div>
			<strong  >Confirm Password:</strong>
			<input class="data" id="pass2"type="password" name="passwd1" size="16" onblur="check_password_confirm()" />
		</div>
		


		<div>
			<strong >Team:</strong>
			<select name="team" id="team_select1" onchange="view_pic()">
			<option value="none">none</option>
				<option value="dany">Danaerys - Tyrion</option>
				<option value="snow">Snow - Mormunt</option>
				<option value="finger">Sansa- Little Finger</option>
				<option value="cersei">Cersei</option>
			</select>
		</div>
		<br />
		<div>
			<strong  >Photo:</strong>(optional)
			<input name="photo" type="file" />
		</div>
		<br />

		<div>
			<input id="submit" type="submit" value="Sign Up" />
		</div>
		<div>
		 <p id="message">Already registered? <a href="./index.php">Sign In</a></p>
		</div>
	</fieldset>
</form>
</div>
</body></html>