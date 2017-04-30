<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>!Discussions!</title>
	<link href="GOT_style.css" rel="stylesheet" type="text/css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript">
	
	$(document).ready(function(){
	$( "#main-sidebar" ).simplerSidebar( {
	  selectors: {
	    trigger: "#toggle-sidebar",
	    quitter: ".close-sb"
	  }
	});
		
    
    
	});
	</script>
</head>

<body>
<?php include("toolbar.html");?>
<div id="discussion_categories">
<ul id="dis_cat">
Categories
<li>Hot</li>
<li>Recent</li>
<li>Funny</li>
<li>Theories</li>
</ul>
</div>



<div id="discussion_main_content">
<div id="add_discussion_interface"></div>

</div>


<a href="new_discussion.php"><input type="button" id="add_discussion" value="+" "/></a>
</body>

</html>