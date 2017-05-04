<!Doctype html>
<html>
<head>
</head>

<body>
<form action="../server.php" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend>add charcter:</legend>

		<div>
			<strong>Character Name:</strong>
			<input type="text" name="cname" size="16" />
		</div>
		<div>
			<strong>House:</strong>
			<input type="text" name="house" size="16" />
		</div>
		
		<div>
			<strong>story:</strong>
			<textarea rows="4" cols="50" name="cstory">
			</textarea>
		</div>
		
		<div>
			<strong>Photo:</strong>
			<input name="cphoto" type="file" />
		</div>
		<div>
			<input type="submit" value="Add Character" />
		</div>
	</fieldset>
</form>

</body>
</html>