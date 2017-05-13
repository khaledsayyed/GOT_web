<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>!Discussions!</title>
	<script type="text/javascript" src="jquery.js"></script>
	<link href="GOT_style.css" rel="stylesheet" type="text/css" />
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<style rel="stylesheet" type="text/css">
	body{
		background-color:#cccccc;
	}</style>

		<script type="text/javascript">
		var continue_music,continue_from;
var interval;
var audio;


	var ajax,ajax2;
	$(document).ready(function(){
		audio=document.getElementById("page_audio");
	/*	audio = new Audio('audio_file.mp3');
	audio.loop=true;
	audio.preload="auto";
	var s1 = document.createElement("source");
	s1.src="assets/audio/Light of the Seven.mp3";
	audio.appendChild(s1);*/
	continue_music = localStorage['audio'] || 'stop';
	continue_from = localStorage['play_from'] || '0';
$("#play_sound").click(play_stop_music);	
if(continue_music==='play'){
	$("#play_sound_pic").attr("src","assets/icons/muted.png");
audio.oncanplay=function() {
  audio.currentTime = parseInt(localStorage['play_from']); 

 audio.play();
};

  interval = setInterval(update_play_from, 1000);
 
}else{
	localStorage['audio']= 'stop';
	localStorage['play_from'] = '0';
}



	$('.link').hover(function(){$(this).children("h5").css("background-color","#eedddd");},function(){$(this).children("h5").css("background-color","#ffffff");});


		$(".active").removeClass("active");
		$("#discussions").addClass("active");

	$( "#main-sidebar" ).simplerSidebar( {
	  selectors: {
	    trigger: ".toggle-sidebar",
	    quitter: ".close-sb"
	  }
	});
	$("#login_message").hide();
	$("#login_message,.toggle-sidebar").click(function(){$("#login_message").hide();});
		 $(".clickFade ul").hide();
    $(".clickFade").click(function(){
        $(this).children("ul").stop(true,true).fadeToggle("fast"),
        $(this).toggleClass("dropdown-active");
    });
	
		 $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "scale",
        duration: 150
      },
      hide: {
        effect: "scale",
        duration: 150
      }
    });
	var url="";
	
		if($("#category").text()!==""){
			if($("#category").text()==="Hot Posts"){
				url="server.php?discussions=hot"
			}else{
				var logged_username=document.getElementById("user_name").innerHTML;
				if(logged_username===""){
				$("#login_message").show(500);
				return;
				}else{
				url="server.php?discussions=uploaded_by_me";
				}
			}
			
		}else{
		url ="server.php?discussions=all";
		}
ajax = new XMLHttpRequest();
ajax.onload = load_posts ;
ajax.open("GET",url , true);
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
if(($("#category")!==null)&&($("#category").text()==='My Posts')){		div2.append($('<img>',{class:'delete',src:'assets/icons/delete.png',click:delete_post,width:30,height:35}));}

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
	
	div.append($("<span>",{class:"gray_text",click:show_all_comments,text:data[i].getElementsByTagName("comments")[0].getAttribute("count")+"comments"}))
	
	div.append('<br/><br/><hr style="width:83%;color:#cccccc;"/>');
	//}
	
	
	
	var vote_div = $('<div>',{class:'reaction_div'});
	var upvote_icon =$('<img>',{class:'upvote',src:'assets/icons/upvote.png',alt:(data[i].getAttribute("upvoted_by_me")==="yes")?"true":"false",click:upvote,width:30,height:30})
	//alt refers if it is pressed or not
		if(data[i].getAttribute("upvoted_by_me")==="yes"){upvote_icon.css("opacity",1);}
	vote_div.append(upvote_icon );
	vote_div.append($('<span>',{text:data[i].getAttribute("upvotes"),class:'upvotes_count'}));
	 var downvote_icon = $('<img>',{class:'downvote',src:'assets/icons/downvote.png',alt:(data[i].getAttribute("downvoted_by_me")==="yes")?"true":"false",click:downvote,width:30,height:30}) ;
	
	if(data[i].getAttribute("downvoted_by_me")==="yes"){downvote_icon.css("opacity",1);}
	vote_div.append(downvote_icon);
	vote_div.append($('<span>',{text:data[i].getAttribute("downvotes"),class:'downvotes_count'}));
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
		id:"img"+k,
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
	function show_all_comments(){
		
	var dis_id =$(this).closest('.post').attr("id");
		ajax2 = new XMLHttpRequest();
ajax2.onload = fill_all_comments;
ajax2.open("GET", "server.php?update_me_on_discussion="+dis_id, true);
ajax2.send()	
$(this).prop('onclick',null).off('click');
		$(this).on('click',show_three_comments);
		
	}
	function show_three_comments(){
		
	var dis_id =$(this).closest('.post').attr("id");
		ajax2 = new XMLHttpRequest();
ajax2.onload = update_comments;
ajax2.open("GET", "server.php?update_me_on_discussion="+dis_id, true);
ajax2.send()	
$(this).prop('onclick',null).off('click');
		$(this).on('click',show_all_comments);
		
	}
	
	
	
	function update_discussion(dis_id){

	ajax2 = new XMLHttpRequest();
ajax2.onload = update_comments;
ajax2.open("GET", "server.php?update_me_on_discussion="+dis_id, true);
ajax2.send()	
	}
	function upvote(){
			var logged_username=document.getElementById("user_name").innerHTML;	
		if(logged_username===""){
		$("#login_message").show(500);
		// to be changed
	}
	else{
			var dis_id =$(this).closest('.post').attr("id");
		if(this.alt=="false"){
		this.alt="true"
		$(this).css("opacity",1);
		$(this).closest('.reaction_div').children(".downvote").attr("alt","false");
		$(this).closest('.reaction_div').children(".downvote").css("opacity",0.6);
		var link="server.php?vote=up&&unvote=down&&user_voted="+logged_username+"&&dis_id="+dis_id;
		
			}
			else{
				this.alt="false"
		$(this).css("opacity",0.6);
		
		var link="server.php?unvote=up&&user_voted="+document.getElementById("user_name").innerHTML+"&&dis_id="+dis_id;
			}
		var ajax3 = new XMLHttpRequest();
	
	ajax3.open("GET", link, true);
	ajax3.send();
		update_discussion(dis_id);
	}
	}
	function downvote(){
		var logged_username=document.getElementById("user_name").innerHTML;	
		if(logged_username===""){
		$("#login_message").show(500);
		// to be changed
	}
	else{
			var dis_id =$(this).closest('.post').attr("id");
		if(this.alt=="false"){
		this.alt="true"
		$(this).css("opacity",1);
		$(this).closest('.reaction_div').children(".upvote").attr("alt","false");
		$(this).closest('.reaction_div').children(".upvote").css("opacity",0.6);
		var link="server.php?vote=down&&unvote=up&&user_voted="+ logged_username +"&&dis_id="+dis_id;
			}
			else{
				this.alt="false"
		$(this).css("opacity",0.6);
		
		var link="server.php?unvote=down&&user_voted="+document.getElementById("user_name").innerHTML+"&&dis_id="+dis_id;
			}
		var ajax2 = new XMLHttpRequest();
	
	ajax2.open("GET", link, true);
	ajax2.send();
	update_discussion(dis_id);
	}
	}
	function share(){
		
	var dis_id =$(this).closest('.post').attr("id");
	$( "#dialog" ).empty();
	$( "#dialog" ).dialog('option','title', 'SHARE');
	$( "#dialog" ).append($("<p>",{text:'localhost:81/GOT_website/discussions.php?id='+dis_id}));
	$( "#dialog" ).dialog( "open" );
	}
	function delete_post(){
		
	var dis_id =$(this).closest('.post').attr("id");
	var ajax = new XMLHttpRequest();
	ajax.onload=update_my_discussions;
	ajax.open("GET", "server.php?delete_discussion="+dis_id, true);
	ajax.send();
	
	}
	function update_my_discussions(){
		var url="server.php?discussions=uploaded_by_me";

		ajax = new XMLHttpRequest();
		ajax.onload = load_posts ;
		ajax.open("GET",url , true);
		ajax.send();
		
	}
	function comment(){
		
		//entry for the user to comment
		if($(this).closest('.post_container').children(".reply_div").is(':empty')){
	var logged_username=document.getElementById("user_name").innerHTML;
	if(logged_username===""){
		$("#login_message").show(500);
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
			var dis_id =$(this).closest(".post_container").children(".post").attr("id");
			var user = document.getElementById("user_name").innerHTML;
			var comment_text=$(this).closest(".reply_div").children(".insert_comment").val();

		ajax2 = new XMLHttpRequest();
ajax2.onload = update_comments;
ajax2.open("GET", "server.php?name="+user+"&&dis_id="+dis_id+"&&comment_text="+comment_text, true);
ajax2.send()
	$(this).closest('.post_container').children(".reply_div").empty();
	}
	function update_comments(){
		var  data = ajax2.responseXML;
		var id= data.getElementsByTagName("discussion")[0].getAttribute("id");
		
		var updated_upvotes = data.getElementsByTagName("discussion")[0].getAttribute("upvotes");
		var updated_downvotes = data.getElementsByTagName("discussion")[0].getAttribute("downvotes");

		var updated_comments_count =data.getElementsByTagName("comments")[0].getAttribute("count");
		var comments = data.getElementsByTagName("comment");
	
		$("#"+id).children(".reaction_div").children(".upvotes_count").text(updated_upvotes);
		$("#"+id).children(".reaction_div").children(".downvotes_count").text(updated_downvotes);

		$("#"+id).children(".gray_text").text(updated_comments_count+"comments");
		var all_comments_div = $("#"+id).closest(".post_container").children(".comments");
		all_comments_div.empty();
	for (var k =comments.length-1; k > comments.length-4; k--) {
		var commenter=comments[k].getAttribute("user_commented");
		var comment_text = comments[k].firstChild.nodeValue;
		var com_div=$('<div>',{class:'com_div'});
		com_div.append($('<img>', { 
		id:"img"+k,
		src: "./users_photos/"+commenter+".jpg",
		class:"commenter_pic",
		onerror:"this.error=null;this.src='./users_photos/user.png';" 
		
		}));
		com_div.append($('<strong>',{text:commenter+":"}));
		com_div.append($('<span>',{text:comment_text}));
		all_comments_div.append(com_div);
		
	}
	}

	function fill_all_comments(){
		if (this.status == 200) {
		var  data = ajax2.responseXML;
		var id= data.getElementsByTagName("discussion")[0].getAttribute("id");
		
		var updated_upvotes = data.getElementsByTagName("discussion")[0].getAttribute("upvotes");
		var updated_downvotes = data.getElementsByTagName("discussion")[0].getAttribute("downvotes");

		var updated_comments_count =data.getElementsByTagName("comments")[0].getAttribute("count");
		var comments = data.getElementsByTagName("comment");
	//	alert($("#"+id).children(".reaction_div").children(".upvote").text());
		$("#"+id).children(".reaction_div").children(".upvotes_count").text(updated_upvotes);
		$("#"+id).children(".reaction_div").children(".downvotes_count").text(updated_downvotes);
		
		$("#"+id).children(".gray_text").text(updated_comments_count+"comments");
		var all_comments_div = $("#"+id).closest(".post_container").children(".comments");
		all_comments_div.empty();
	for (var k =comments.length-1; k >=0; k--) {
		var commenter=comments[k].getAttribute("user_commented");
		var comment_text = comments[k].firstChild.nodeValue;
		var com_div=$('<div>',{class:'com_div'});
		com_div.append($('<img>', { 
		id:"img"+k,
		src: "./users_photos/"+commenter+".jpg",
		class:"commenter_pic",
		onerror:"this.error=null;this.src='./users_photos/user.png';" 
		
		}));
		com_div.append($('<strong>',{text:commenter+":"}));
		com_div.append($('<span>',{text:comment_text}));
		all_comments_div.append(com_div);
		
	}
	
	
	}}
	function update_play_from(){
localStorage['play_from'] = (parseInt(localStorage['play_from'])+1 ).toString();
	
}
function play_stop_music(){
		var sound_button =document.getElementById("play_sound_pic");

	if(localStorage['audio']==="stop"){
		
		audio.play();
		localStorage['audio']="play";
		sound_button.src="assets/icons/muted.png";
		  interval = setInterval(update_play_from, 1000);
	}else{
	audio.pause();
	localStorage['audio']="stop";
	sound_button.src="assets/icons/voice.png";
	clearInterval(interval);
	}
	
}
	
	</script>
</head>

<body >
<?php include("toolbar.php");?>
<div style="background-color:#cccccc;overflow:hidden;">
<div id="discussion_categories">
<ul >
Categories
<a href="discussions.php"> <li>All Posts</li></a>
<a href="discussions.php?cat=hot"> <li>Hot</li></a>
<a href="discussions.php?cat=uploaded_by_me"><li>Uploaded By Me</li></a>
</ul>
<ul>links
<a href=""><li>official facebook page</li></a>
<a href=""><li>official instagram page</li></a>
<a href=""><li>official website</li></a>
</ul>
</div>
<?php include("links.php");?>
<?php
if(isSet($_GET['cat'])):
if($_GET['cat']==='hot'):?>
<h3 class="title" id='category'>Hot Posts</h4><?php
elseif($_GET['cat']==='uploaded_by_me'):?>
<h3  class="title" id='category'>My Posts</h4><?php
endif;
endif;
?>
<div id="discussion_main_content">


</div>
<div id="dialog"></div>

<a href="new_discussion.php"><input type="button" id="add_discussion" value="+" /></a>
</div>
</body>

</html>