
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="simpler-sidebar.js"></script>
<script type="text/javascript">
function validatelogin(){
	if(checkname() && checkpassword()){ return true;}
	else alert("invalid data"); return false;
}
function checkname(){
var name = document.getElementById("user");
	name.style.backgroundColor="#f2f2f2";
if(name.value==""){
		name.style.backgroundColor="#ff6666";
		/*document.getElementById("submit").disabled="disabled";*/
		return false;
	}
	return true;
}

function checkpassword(){
var pass = document.getElementById("pass");
	pass.style.backgroundColor="#f2f2f2";
if(pass.value.match(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)==null){
		pass.style.backgroundColor="#ff6666";
	/*	document.getElementById("submit").disabled="disabled";*/
	return false;
	}
	return true;
}
</script>

	<div class="main-navbar main-navbar-fixed-top" id="main-navbar">

	  <div class="main-navbar-content">
	   <div><a href="index.php"><img src="assets/logo.png" width="168" height="41"/></a></div>
  <div><a id="index" class="tab" href="index.php">Home</a></div>
  <div> <a id="discussions" class="tab" href="discussions.php">Discussions</a></div>
   <div><a id="characters" class="tab" href="characters.php">Characters</a> </div>

   <div><a id="contact" class="tab" href="about_us.php">Contact</a></div>


 
	    <div class="icon right toggle-sidebar">

	      <img alt="menu" height="26px" src="menu.png" width="26px" />

	    </div>
		
		<div class="clickFade">
	   <?php
if(isset($_SESSION["logged_in_name"]))
{
$user= $_SESSION["logged_in_name"];?>
<a href="javascript:void(0)" id="user_holder"><span class="round_small_image"><img id="user" src="users_photos/<?=$user?>" onerror="this.error=null;this.src='./users_photos/user.png';" alt="<?=$user?>" title="<?=$user?>" width="25" height="25"/></span><span id="user_name"><?=$user?></span><span>&#x25BC;</span></a><!-- this will be styled and placed at thee corner bla bla-->

            <ul>
                <li><a href="#">&nbsp;&nbsp;Edit Your Account</a></li>
                <li><a href="server.php?log_me_out_please=true">Log Out</a></li>
            </ul>
<?php }
else{
$user=	"";?>
<a href="javascript:void(0)" id="user_holder"><span class="round_small_image"><img id="user" src="users_photos/user.png" alt="<?=$user?>" title="<?=$user?>" width="25" height="25"/></span><span id="user_name"><?=$user?></span><span>&#x25BC;</span></a><!-- this will be styled and placed at thee corner bla bla-->
		<ul>
                <li><a class="toggle-sidebar">&nbsp;&nbsp;Log In</a></li>
                <li><a href="signup.php">&nbsp;&nbsp;Sign Up</a></li>
            </ul>
<?php }
?>	
		
	  </div>
	  <div id="play_sound">

	      <img  id="play_sound_pic" alt="0" height="24px" src="assets/icons/voice.png" width="24px" title="play"/>

	    </div>
	  </div>

</div>

<div class="main-sidebar main-sidebar-right" id="main-sidebar">

	  <div class="main-sidebar-wrapper" id="main-sidebar-wrapper">

	  <form action="server.php" method="post" Onsubmit= "return validatelogin();">
		
						<div>
							<strong>UserName:</strong><input id="user" name="login_name" type="text" size="20" onblur="checkname();"  /> <br />
							<strong>Password: </strong><input id="pass" name="login_password" type="text" size="20" onblur="checkpassword();" /> <br />
							<input id="submit" type="submit" value="Log In" />
						</div>
	
		</form>
	    <nav>

	      <ul>


<a href="signup.php"><li class="close-sb">
         
Sign Up
	        </li></a>
	<a href="#editprofile">        <li class="close-sb">
        
Edit Profile 
	        </li></a>

	     <a href="about_us.php">     <li class="close-sb">
 About us 
	        </li></a>
			

	      </ul>

	    </nav>
		This Website is developed by:<br />
		Khaled El Sayed<br />
		Huda Hammoud

	  </div>

</div>


<div id="dummy_div">	</div>
<div id="login_message"><img src="assets/icons/please_log_in_first.png" alt="please log in to perform this" height="165" width="165" /></div>

<audio id="page_audio" preload="auto"  loop="true" autobuffer>
<source src="assets/audio/Light of the Seven.mp3"/>	
<source src="assets/audio/Light of the Seven.ogg"/>	
Unsupported in Firefox
</audio>
