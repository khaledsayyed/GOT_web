
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


 
	    <div class="icon right" id="toggle-sidebar">

	      <img alt="menu" height="24px" src="menu.png" width="24px">

	    </div>
	   <?php
if(isset($_SESSION["logged_in_name"]))
{
$user= $_SESSION["logged_in_name"];?>
<div id="user_holder"><span class="round_small_image"><img id="user" src="users_photos/<?=$user?>" alt="<?=$user?>" title="<?=$user?>" width="25" height="25"/></span><span id="user_name"><?=$user?></span></div><!-- this will be styled and placed at thee corner bla bla-->
<?php }
else{
$user=	"";?>
<div id="user_holder"><span class="round_small_image"><img id="user" src="users_photos/user.png" alt="<?=$user?>" title="<?=$user?>" width="25" height="25"/></span><span id="user_name"><?=$user?></span></div><!-- this will be styled and placed at thee corner bla bla-->
<?php }
?>	
		
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

