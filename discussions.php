<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>!Discussions!</title>
	<link href="GOT_style.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript">
	function view_add_dis()
	{
	var paret_div = document.getElementById("add_discussion_interface");
	var temporary_div = document.createElement("div");
	temporary_div.id="temp_div";
	var dis_text = document.createElement("textarea");
	dis_text.placeholder="Enter the text here";
	dis_text.rows="12";
	dis_text.cols="80";
	//dis_text.class="textFldstyle";
	temporary_div.appendChild(dis_text);
	var breakk = document.createElement("br");
	temporary_div.appendChild(breakk);
	var post = document.createElement("input");
	post.type="button";
	post.class="btnStyle";
	post.value="Post";
	post.onclick=post_the_discussion;
	temporary_div.appendChild(post);
	paret_div.appendChild(temporary_div);
	return;
	}
	function post_the_discussion()
	{
	var paret_div = document.getElementById("add_discussion_interface");
	var child_div = document.getElementById("temp_div");
	paret_div.removeChild(child_div);
	
	return;
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
<div id="add_discussion_interface"></div>

</div>


<input type="button" id="add_discussion" value="+" onclick="view_add_dis()"/>
</body>

</html>