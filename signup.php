<!DOCTYPE html>
<html>
<head>
<title>sign up</title>
<script src="jquery.js"></script>
<link href="GOT_style.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
body{
	width:100%;
	height:100%;
	background: url("signup.jpg") no-repeat center center fixed;
  background-size: cover;
   -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  font-family: "Cursive", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale; 
  color:white;
}
#register-form {

	 position: relative;
  z-index: 1;
  max-width: 360px;
  margin: 0 auto 300px;
  padding: 0px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}	
#register-form 	.data {
  font-family: "Cursive", sans-serif;
  outline: 0;
  background:#f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
 
}
#register-form  #submit{
  font-family: "Cursive", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #800000;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF ;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
#register-form #submit:hover,#register-form #submit:active,#register-form #submit:focus {
  background: #FF0000;
}
#register-form #message {
  margin: 15px 0 0;
  color: white;
  font-size: 12px;
}
#register-form #message a {
  color: #4CAF50;
  text-decoration: none;
}
#signup_fieldset { margin: auto; 

width:100%;
}

</style>
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
function validate(){
	if(check_name() && check_password() && check_password_confirm() && check_email()){ return true;}
	else alert("invalid data"); return false;
}
function check_name(){
var name = document.getElementById("name1");
	name.style.backgroundColor="#f2f2f2";
if(name.value.length==0){
		name.style.backgroundColor="#ff6666";
		document.getElementById("submit").disabled="disabled";
		return false;
	}
	return true;
}
function check_password(){
var pass = document.getElementById("passwd1");
	pass.style.backgroundColor="#f2f2f2";
if(pass.value.match(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)==null){
		pass.style.backgroundColor="#ff6666";
		document.getElementById("submit").disabled="disabled";
	return false;
	}
	return true;
}
	


function check_email(){
var email = document.getElementsByName("email");
	email[0].style.backgroundColor="#f2f2f2";
if(email[0].value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)==null){
		email[0].style.backgroundColor="#ff6666";
		document.getElementById("submit").disabled="disabled";
		//unvalid.push("passwd1");
		return false;
	}
	return true;
}
function check_password_confirm(){
	
	var pass = document.getElementsByName("passwd");
	var pass2 = document.getElementsByName("passwd1");
	pass2[0].style.backgroundColor="#f2f2f2";
	if(pass[0].value!=pass2[0].value){
		pass2[0].style.backgroundColor="#ff6666";
		document.getElementById("submit").disabled="disabled";
		//unvalid.push("passwd1");
		return false;
	}
	return true;
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
<form id="register-form" action="index.php" method="GET" enctype="multipart/form-data" Onsubmit= "return validate();">
	<fieldset id="signup_fieldset">
		<legend>New User Signup:</legend>

		<div>
			<strong>Name:</strong>

			<input class="data" id="name1" type="text" name="name" size="16" onblur="check_name();" />

		</div>
		<div>
			<strong>Email:</strong>
			<input class="data" type="email" id="s_email" name="email" size="16" placeholder="x@y ..." onblur="check_email();" />
		</div>
		<div>
			<strong>Password:</strong>
			<input class="data" id="passwd1" type="password" name="passwd" placeholder="atleast 1 num 1 char ..." size="16" onblur="check_password()"  />
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
			<strong>Photo:</strong>(optional)
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