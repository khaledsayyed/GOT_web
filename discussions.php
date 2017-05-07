<?php
session_start();

?>
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
		$(".active").removeClass("active");
		$("#discussions").addClass("active");

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
	var post_id = data[i].getAttribute("id");
	var big_div= $('<div>',{class:"post_container"});	
	var div= $('<div>',{class:"post",id:post_id});
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
	div.append($("<span>",{class:"gray_text",text:data[i].getElementsByTagName("comments")[0].getAttribute("count")+"comments"}))
	
	div.append('<hr style="width:83%;color:#cccccc;clear:right;"/>');
	//}
	
	
	
	var vote_div = $('<div>',{class:'reaction_div'});
	vote_div.append($('<img>',{class:'upvote',src:'assets/icons/upvote.png',alt:"false",click:upvote,width:30,height:30}));//alt refers if it is pressed or not
	vote_div.append($('<span>',{text:'0',class:'votes_count'}));
	
	vote_div.append($('<img>',{class:'downvote',src:'assets/icons/downvote.png',alt:"false",click:downvote,width:30,height:30}));
	vote_div.append($('<span>',{text:'0',class:'votes_count'}));
		vote_div.append($('<img>',{class:'share',src:'assets/icons/share.png',click:share,width:30,height:30}));
	vote_div.append($('<a>',{click:comment,text:"Reply",class:'reply'}).append($('<img>',{class:'vote',src:'assets/icons/comment.png',width:35,height:35})));
	div.append(vote_div);
	big_div.append(div);
	
	big_div.append($("<div>",{class:"reply_div"}));// to be filled when reply pressed
	//now lets insert the comments
	var comments=data[i].getElementsByTagName("comment");
	all_com_div=$("<div>",{class:"comments"});
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
		com_div.append($('<strong>',{text:commenter+":"}));
		com_div.append($('<span>',{text:comment_text}));
		all_com_div.append(com_div);
	}
	
	big_div.append(all_com_div);
	$("#discussion_main_content").append(big_div);		
	}   
	
	
    }
	function upvote(){
			var dis_id =$(this).closest('.post').attr("id");
		if(this.alt=="false"){
		this.alt="true"
		$(this).css("opacity",1);
		$(this).closest('.reaction_div').children(".downvote").attr("alt","false");
		$(this).closest('.reaction_div').children(".downvote").css("opacity",0.6);
		var link="server.php?vote=up&&unvote=down&&user_voted="+document.getElementById("user_name").innerHTML+"&&dis_id="+dis_id;
		
			}
			else{
				this.alt="false"
		$(this).css("opacity",0.6);
		
		var link="server.php?unvote=up&&user_voted="+document.getElementById("user_name").innerHTML+"&&dis_id="+dis_id;
			}
		var ajax = new XMLHttpRequest();
	
	ajax.open("GET", link, true);
	ajax.send()
 
	}
	function downvote(){
			var dis_id =$(this).closest('.post').attr("id");
		if(this.alt=="false"){
		this.alt="true"
		$(this).css("opacity",1);
		$(this).closest('.reaction_div').children(".upvote").attr("alt","false");
		$(this).closest('.reaction_div').children(".upvote").css("opacity",0.6);
		var link="server.php?vote=down&&unvote=up&&user_voted="+document.getElementById("user_name").innerHTML+"&&dis_id="+dis_id;
			}
			else{
				this.alt="false"
		$(this).css("opacity",0.6);
		
		var link="server.php?unvote=down&&user_voted="+document.getElementById("user_name").innerHTML+"&&dis_id="+dis_id;
			}
		var ajax = new XMLHttpRequest();
	
	ajax.open("GET", link, true);
	ajax.send()
	}
	function share(){
		
		alert('shared');
	}
	function comment(){
		
		//entry for the user to comment
		if($(this).closest('.post_container').children(".reply_div").is(':empty')){
	var logged_username=document.getElementById("user_name").innerHTML;
	if(logged_username===""){
		alert("you must log in first");
		// to be changed
	}
	else{
		$(this).closest('.post_container').children(".reply_div").append($('<img>', { 
		src: "./users_photos/"+logged_username+".jpg",
		onerror:"this.error=null;this.src='./users_photos/user.png';" 
		}));
		$(this).closest('.post_container').children(".reply_div").append($("<input>",{placeholder:"your comment",type:"text",class:"insert_comment"}));
		$(this).closest('.post_container').children(".reply_div").append($('<img>',{src:'assets/icons/send-message.png',click:send_comment}));
	
		
		}
		$(this).closest('.post_container').children(".reply_div").children(".insert_comment").focus();
		}else{
			$(this).closest('.post_container').children(".reply_div").empty();
		}
	}
	function send_comment(){
			var dis_id =$(this).closest('.post_container').children(".post").attr("id");
			var user = document.getElementById("user_name").innerHTML;
			var comment_text=$(this).closest(".reply_div").children(".insert_comment").val();

		var ajax = new XMLHttpRequest();
ajax.onload = update_comments;
ajax.open("GET", "server.php?name="+user+"&&dis_id="+dis_id+"&&comment_text="+comment_text, true);
ajax.send()
	$(this).closest('.post_container').children(".reply_div").empty();
	}
	function update_comments(){
		
	}
	
	</script>
</head>

<body >
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

<div id="discussion_main_content">


</div>


<a href="new_discussion.php"><input type="button" id="add_discussion" value="+" /></a>
</body>

</html>