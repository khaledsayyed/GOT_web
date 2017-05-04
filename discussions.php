<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>!Discussions!</title>
	<link href="GOT_style.css" rel="stylesheet" type="text/css"/>
	<script src="jquery.js"></script>
		<script type="text/javascript">
	var ajax;
	$(document).ready(function(){
	$( "#main-sidebar" ).simplerSidebar( {
	  selectors: {
	    trigger: "#toggle-sidebar",
	    quitter: ".close-sb"
	  }
	});
		
		
ajax = new XMLHttpRequest();
ajax.onload = load_posts ;
ajax.open("GET", "server.php?discussions=all", true);
ajax.send();
	});
	function load_posts(){
		$("#discussion_main_content").empty();
	var data = ajax.responseXML.getElementsByTagName("discussion");
	for (var i = 0; i < data.length; i++) {
	var div= $('<div>',{class:"post"});
	var title =data[i].getAttribute("title");
	var date_time =data[i].getAttribute("datetime");
	var posted_by =data[i].getAttribute("postedBy");
	var content=data[i].getElementsByTagName("text")[0].firstChild.nodeValue;
	var comments=data[i].getElementsByTagName("comment");	
	
	
	

	
	div.append($("<h4>",{text:title}));
	div.append($("<p>",{text:content}));
	//if(){
	var img_src=data[i].getElementsByTagName("img")[0].firstChild.nodeValue;
	var img = $('<img>', { 
		id: 'p'+i,
		title: img_src,
		src: "./discussion_files/"+img_src,
		alt: img_src
 
		});
	div.append(img);
	//}
	$("#discussion_main_content").append(div);
		
	}
    
    }
	
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


</div>


<a href="new_discussion.php"><input type="button" id="add_discussion" value="+" /></a>
</body>

</html>