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
	
var audio;
var continue_music,continue_from;
var interval;
//test


$(document).ready(function(){
		audio=document.getElementById("page_audio");
		/*audio = new Audio('audio_file.mp3');
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
 
};
audio.play();
  interval = setInterval(update_play_from, 1000);
 
}else{
	localStorage['audio']= 'stop';
	localStorage['play_from'] = '0';
}


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
	function update_play_from(){
localStorage['play_from'] = (parseInt(localStorage['play_from'])+1 ).toString();
	
}
function play_stop_music(){
		var sound_button =document.getElementById("play_sound_pic");
	var audio = document.getElementById("page_audio");
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

<body style="background-color:#cccccc">
<?php include("toolbar.php");?>

<div id="discussion_categories">
<ul >
Categories
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