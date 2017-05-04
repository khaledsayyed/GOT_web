<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>!Discussions!</title>
	<link href="GOT_style.css" rel="stylesheet" type="text/css" />
	<style rel="stylesheet" type="text/css">
	body{
		background-color:#cccccc;
	}</style>
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
	var big_div= $('<div>',{class:"post_container"});	
	var div= $('<div>',{class:"post"});
	var div2= $('<div>',{class:"post_head"});
	var title =data[i].getAttribute("title");
	var date_time =data[i].getAttribute("datetime");
	var posted_by =data[i].getAttribute("postedBy")+".jpg";
	var content=data[i].getElementsByTagName("text")[0].firstChild.nodeValue;
		
	var img_user=$('<img>', { 
		id:"img"+i,
		src: "./users_photos/"+posted_by,
		alt:data[i].getAttribute("postedBy") ,
		class:"user_posted_by",
		onerror:"this.error=null;this.src='./users_photos/user.png';" 
		
		});
		
	div2.append(img_user);
	div2.append($('<h3>', { 
		text:data[i].getAttribute("postedBy")
		}));
		div2.append($('<p>', { 
		text:date_time
		}));
	
	

	div.append(div2);
	div.append($("<h4>",{text:title}));
	div.append($("<p>",{text:content}));
	//if(){
	var img_src=data[i].getElementsByTagName("img")[0].firstChild.nodeValue;
	var img = $('<img>', { 
		id: 'p'+i,
		title: img_src,
		src: "./discussion_files/"+img_src,
		alt: img_src,
		
		});
		var img_div = $('<div>',{class:'big_pic'});
		img_div.append(img);
	div.append(img_div);
	div.append('<hr style="width:83%;color:#cccccc;"/>');
	//}
	
	
	
	var vote_div = $('<div>',{class:'reaction_div'});
	vote_div.append($('<img>',{class:'vote',src:'assets/icons/upvote.png',click:upvote,width:30,height:30}));
	vote_div.append($('<span>',{text:'0',class:'votes_count'}));
	
	vote_div.append($('<img>',{class:'vote',src:'assets/icons/downvote.png',click:downvote,width:30,height:30}));
	vote_div.append($('<span>',{text:'0',class:'votes_count'}));
		vote_div.append($('<img>',{class:'share',src:'assets/icons/share.png',click:share,width:30,height:30}));
	vote_div.append($('<div>',{click:comment,text:"REPLY",class:'votes_count'}).append($('<img>',{class:'vote',src:'assets/icons/comment.png',width:35,height:35})));
	div.append(vote_div);
	big_div.append(div);
	//now lets insert the comments
	var comments=data[i].getElementsByTagName("comment");
	for(var k=0;k<comments.length;k++){
		var commenter=comments[k].getAttribute("user_commented");
		var comment_text = comments[k].firstChild.nodeValue;
		var com_div=$('<div>',{class:'com_div'});
		com_div.append($('<img>', { 
		id:"img"+i,
		src: "./users_photos/"+commenter+".jpg",
		class:"commenter_pic",
		onerror:"this.error=null;this.src='./users_photos/user.png';" 
		
		}));
		com_div.append($('<strong>',{text:commenter}));
		com_div.append($('<span>',{text:comment_text}));
		big_div.append(com_div);
	}
	
	
	$("#discussion_main_content").append(big_div);		
	}   
	
	
    }
	function upvote(){
		
		alert('upvoted');
	}
	function downvote(){
		
		alert('downvoted');
	}
	function share(){
		
		alert('shared');
	}
	function comment(){
		
		alert('commented');
	}
	</script>
</head>

<body >
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