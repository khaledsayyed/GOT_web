<?php
session_start();
if (isset ($_SESSION["AdminName"])){
	$admin=$_SESSION["AdminName"]?>

<!Doctype html>
<html>
<head>
<link href="adminpage.css" rel="stylesheet" type="text/css"/>
<script src="../jquery.js"  type="text/javascript"></script>
<script src="adminpage.js"  type="text/javascript"></script>
<?php
/*
function is_photo_uploaded_and_moved($user) {
	// bail if there were no upload forms
   if(empty($_FILES)):
       return false;
endif;
   $file = $_FILES['photo']['tmp_name']; // check for uploaded photo
	if( !empty($file) && is_uploaded_file( $file )):
            move_uploaded_file($file, "users_photos/$user.jpg");//rename and move
            return true;
        endif;
  
    // return false if no files were found
   return false;
}
*/
?>
</head>

<body>
<ul id= "top-menu">
  <li class="active">
   <a href="#">Add Admin</a>
  </li>
  <li>
    <a href="#char">Add Character</a>
  </li>
  <li>
    <a href="#vid">Add Video</a>
  </li>
  <li>
    <a href="#pc">Add Picture</a>
  </li>
   <li>
    <a href="#t">Change Timer</a>
  </li>
    <li id="admin">
   admin name: <?= $admin?> 
   <a href="index.php?destroy=1">Logout</a>
  </li>
</ul>
<a id="ad">
<form action="../server.php" method="POST" enctype="multipart/form-data" onsubmit="return validateadmin()">
	<fieldset>
		<legend>add Admin:</legend>

		<div>
			<strong>usename of new admin:</strong>
			<input id="anm" type="text" name="aname" size="16" />
		</div>
		<div>
			<input type="submit" value="Add admin" />
		</div>
	</fieldset>
</form>
</a>
<a id="t">
<form action="../server.php" method="POST" enctype="multipart/form-data" onsubmit="return validatetime()">
	<fieldset>
		<legend>change next episode's timer:</legend>

		<div>
			<strong>time of new episode ([yyyy/m/dd], where m= 0->11):</strong>
			<input id="ntime" type="text" name="nexttimer" size="16" />
		</div>
		<div>
			<input type="submit" value="change timer" />
		</div>
	</fieldset>
</form>
</a>
<a id="char">
<form action="../server.php" method="POST" enctype="multipart/form-data" onsubmit="return validate()">
	<fieldset>
		<legend>add charcter:</legend>

		<div>
			<strong>Character Name:</strong>
			<input id="nm" type="text" name="cname" size="16" />
		</div>
		<div>
			<strong>House:</strong>
			<input id="house" type="text" name="house" size="16" />
		</div>
		
		<div>
			<strong>story:</strong><br/>
			<textarea id="story" rows="4" cols="50" name="cstory">
			</textarea>
		</div>
		<div>
			<strong>State:</strong>
			<select name="state">
			<option>Alive</option>
			<option>Dead</option>
			</select>
		</div>
		<div>
			<strong>Photo:</strong>
			<input id= "cphoto" name="cphoto" type="file" />
		</div>
		<div>
			<input type="submit" value="Add Character" />
		</div>
	</fieldset>
</form>
</a>
<a id="vid">
<form action="../server.php" method="POST" enctype="multipart/form-data" >
	<fieldset>
		<legend>change video:</legend>

		<div>
			<strong>video link:</strong>
			<input id="video" type="file" name="video" size="16" />
		</div>
		<div>
			<input type="submit" name="uploadvideo" value="change video" />
		</div>
	</fieldset>
</form>
</a>
<a id="pc">
<form action="../server.php" method="POST" enctype="multipart/form-data">
	<fieldset>
		<legend>add pic to main page:</legend>

		<div>
			<strong>add pic:</strong>
			<input id="pic" type="file" name="pic" size="16" />
			<select name="tm"  >
			<option value="none">none</option>
				<option value="dany">Danaerys - Tyrion</option>
				<option value="snow">Snow - Mormunt</option>
				<option value="finger">Sansa- Little Finger</option>
				<option value="cersei">Cersei</option>
			</select>
		</div>
		<div>
			<input type="submit" name="uploadphoto" value="Add Photo" />
		</div>
	</fieldset>
</form>
</a>
<?php
if(isset($_GET["st"])){
	if($_GET["st"]=="success"){?>
<script>alert(" changes done successfuly!");</script>
<?php }
if($_GET["st"]=="fail"){?>
<script> alert(" invalid input");</script>
<?php }
}
?>
</body>
</html>
<?php } else {header("location: ./index.php?status=fail");}?>