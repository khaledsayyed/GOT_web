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
	    trigger: "#toggle-sidebar",
	    quitter: ".close-sb"
	  }
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
<form action="index.php" method="GET" enctype="multipart/form-data">
	<fieldset id="signup_fieldset">
		<legend>New User Signup:</legend>

		<div>
			<strong>Name:</strong>
			<input type="text" name="name" size="16" onblur="check_name();" />
		</div>
		<div>
			<strong>Email:</strong>
			<input type="email" name="email" size="16" onblur="check_email();" />
		</div>
		<div>
			<strong>Password:</strong>
			<input id="pass1" type="password" name="passwd" size="16" onblur="check_password()"  />
		</div>
		<div>
			<strong>Confirm Password:</strong>
			<input id="pass2"type="password" name="passwd1" size="16" onblur="check_password_confirm()" />
		</div>
		<div>
		



		<div>
			<strong>Team:</strong>
			<select name="team" id="team_select1" onchange="view_pic()">
			<option value="none">none</option>
				<option value="dany">Danaerys - Tyrion</option>
				<option value="snow">Snow - Mormunt</option>
				<option value="finger">Sansa- Little Finger</option>
				<option value="cersei">Cersei</option>
			</select>
		</div>

		


		<div>
			<strong>Photo:</strong>(optional)
			<input name="photo" type="file" />
		</div>


		<div>
			<input id="submit" type="submit" value="Sign Up" />
		</div>
	</fieldset>
</form>
</body></html>