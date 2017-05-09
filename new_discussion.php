<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>!Discussions!</title>
	<link href="GOT_style.css" rel="stylesheet" type="text/css"/>
<link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>
	<script type="text/javascript">
	
	$(document).ready(function(){
	$( "#main-sidebar" ).simplerSidebar( {
	  selectors: {
	    trigger: ".toggle-sidebar",
	    quitter: ".close-sb"
	  }
	});
	$("#login_message").hide();
	$("#login_message,.toggle-sidebar").click(function(){$("#login_message").hide();});
		$("#fileuploader").uploadFile({
	url:"server.php?save_pic_temporarly=true",
	
	type:"post",
	fileName:"file"
	});
	
	 $(".clickFade ul").hide();
    $(".clickFade").click(function(){
        $(this).children("ul").stop(true,true).fadeToggle("fast"),
        $(this).toggleClass("dropdown-active");
    });
    
    
	});
	</script>
	
	
	</head>

<body>
<?php include("toolbar.php");?>

<div id="discussion_categories">
<ul id="dis_cat">
Categories
<li>Hot</li>
<li>Recent</li>
<li>Funny</li>
<li>Theories</li>
</ul>
</div>

<div>

<form action="server.php" method="POST" enctype="multipart/form-data">
	<fieldset id="NEW_POST_FIELDSET">
		<legend>New Discussion:</legend>
		<div>
			Title:<input name="title" type="text" />
		</div>
		<div>
		<textarea name="text" type="text" placeholder="Enter your text here" cols="50" rows="10"></textarea>
		</div>
		<div id="fileuploader" name="file">Upload</div>
		
		
		<div>
		
			<input id="submit" type="submit" value="Submit" />
		</div>
	</fieldset>
</form>


</div>

</body>

</html>