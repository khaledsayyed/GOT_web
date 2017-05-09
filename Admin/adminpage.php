<!Doctype html>
<html>
<head>
<script>
function validate()
{
	var nam, house, story, pic;
	nam= document.getElementbyID("nm");
	house= document.getElementbyID("house");
	story=document.getElementbyID("story");
	pic= document.getElementbyID("cphoto");
	if(nam.length!=0 && house.length!=0 && story.length!=0 && pic.value!= null)
	{return true;}
	else return false;
	
}
function validateadmin()
{
	var nam;
	nam= document.getElementbyID("anm");
	if(nam.length!=0)return true;
	else return false;
	
}
</script>
</head>

<body>
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
<?php
if(isset($_GET["st"])){
	if($_GET["st"]=="success"){?>
<script>alert(" changes done successfuly!");</script>
<?php }}
?>
</body>
</html>