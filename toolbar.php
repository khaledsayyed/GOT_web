
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="simpler-sidebar.js"></script>




	<div class="main-navbar main-navbar-fixed-top" id="main-navbar">

	  <div class="main-navbar-content">
	   <div><a href="index.php"><img src="assets/logo.png" width="168" height="43"/></a></div>
  <div><a id="index" class="tab" href="index.php">Home</a></div>
  <div> <a id="discussions" class="tab" href="discussions.php">Discussions</a></div>
   <div><a id="characters" class="tab" href="characters.php">Characters</a> </div>
  <div> <a class="tab" href="#">News</a></div>
   <div><a id="contact" class="tab" href="#">Contact</a></div>


 
	    <div class="icon right toggle-sidebar">

	      <img alt="menu" height="26px" src="menu.png" width="26px">

	    </div>
		<div class="clickFade">
	   <?php
if(isset($_SESSION["logged_in_name"]))
{
$user= $_SESSION["logged_in_name"];?>
<a href="javascript:void(0)" id="user_holder"><span class="round_small_image"><img id="user" src="users_photos/<?=$user?>" alt="<?=$user?>" title="<?=$user?>" width="25" height="25"/></span><span id="user_name"><?=$user?></span><span>&#x25BC;</span></a><!-- this will be styled and placed at thee corner bla bla-->

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
                <li><a href="#">&nbsp;&nbsp;Sign Up</a></li>
            </ul>
<?php }
?>	
		
	  </div>
	  </div>

</div>

<div class="main-sidebar main-sidebar-right" id="main-sidebar">

	  <div class="main-sidebar-wrapper" id="main-sidebar-wrapper">

	  <form action="server.php" method="post">
		
						<div>
							<strong>UserName:</strong><input id="user" name="login_name" type="text" size="20"  /> <br />
							<strong>Password: </strong><input id="pass" name="login_password" type="text" size="20"  /> <br />
							<input type="submit" value="Log In" />
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

	     <a href="#about">     <li class="close-sb">
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

