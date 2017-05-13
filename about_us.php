<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>!Contact Us!</title>
	<link href="GOT_style.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript">
	
var audio;
var continue_music,continue_from;
var interval;
//test


$(document).ready(function(){
	$(".active").removeClass("active");
		$("#contact").addClass("active");
		
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
	$("#login_message.toggle-sidebar").click(function(){$("#login_message").hide();});
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

<body style="background-color:#bcbcbc">
<?php include("toolbar.php");?>
<div id="about_us">
<h3>Game of Thrones Fan Website</h3><br/>
<p>This Website is developed as a course project for cmps278(Web Development) in AUB by:Dr. Haidar Safa</p>
<ul><strong>By</strong><li>Khaled El Sayed</li><li>Huda Hammoud</li></ul>
<br/><br/>
<form action="server.php" method="POST">
<fieldset>
<legend>Contact Us:</legend>
		<img src="assets/Raven.png" alt="raven" width="150px" height="150px" title="raven" style="float:right"/>
		<div>
			<strong>Name:</strong>
			<input type="text" name="msg_name" size="16"  />
		</div>
		<div>
			<strong>Subject:</strong>
			<input type="text" name="msg_subject" size="16"  />
		</div>
		<div>
			<strong>Email:(optional)</strong>
			<input type="email" name="msg_email" size="16" />
		</div>
		
		<div>
			<strong>Message:</strong><br/>
			<textarea name="msg_body" cols="45" rows="5">
			</textarea>
		</div>
		<div>
			<input id="submit_contact" type="submit" value="Send A Raven" />
		</div>
</fieldset>
</form>
<?php
if(isSet($_GET['sent'])&&$_GET['sent']==="yes"):?>
<p id="sent">Sent, Thank You For Contacting Us</p><?php
endif;
?>
<br /><br />
</div>

</body>
</html>