<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Characters!</title>
<script type="text/javascript" src="jquery.js"></script>
<link href="GOT_style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript"  >


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







		$(".active").removeClass("active");
		$("#characters").addClass("active");

$( "#main-sidebar" ).simplerSidebar( {
	  selectors: {
	    trigger: ".toggle-sidebar",
	    quitter: ".close-sb"
	  }
	});
	$("#login_message").hide();
	$("#login_message,.toggle-sidebar").click(function(){$("#login_message").hide();});
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "scale",
        duration: 500
      },
      hide: {
        effect: "puff",
        duration: 500
      }
    });
	
	 $(".clickFade ul").hide();
    $(".clickFade").click(function(){
        $(this).children("ul").stop(true,true).fadeToggle("fast"),
        $(this).toggleClass("dropdown-active");
    });

var ajax = new XMLHttpRequest();
ajax.onload = load_pics;
ajax.open("GET", "server.php?characters=all", true);
ajax.send();
});
function load_pics(){
	
	var data = JSON.parse(this.responseText);
	for (var i = 0; i < data.characters.length; i++) {
	
	var name =data.characters[i].name;
		var img = $('<img />', { 
		id: 'p'+i,
		title: name,
		src: 'characters/'+name+'.jpg',
		alt: name,
		width:150,
		height: 150
 
		});
	set_actions_to_image(img);
	
	$("#charac_div").append(img);
	
	//
	}
}
function set_actions_to_image(img){
	img.hover(function(){img.animate({"width": "180px","height": "180px","marginTop":"-20px","marginLeft":"-20px"}, "medium");},function(){img.animate({"width": "150px","height": "150px","marginTop":"0px","marginLeft":"0px"}, "medium")});

	img.click(show_char_info);

	

}
function show_char_info(){
var ajax = new XMLHttpRequest();
ajax.onload = load_char_info;
ajax.open("GET", "server.php?characters="+this.alt, true);
ajax.send()
 
 
}
function load_char_info(){
	var data = JSON.parse(this.responseText).characters[0];
	$( "#dialog" ).empty();
	$( "#dialog" ).dialog('option','title', data.name);
	$( "#dialog" ).append($("<p>",{text:'House: '+data.house}));
	$( "#dialog" ).append($("<p>",{text:'State: '+data.state}));
		$( "#dialog" ).append($("<p>",{text:data.story}));
	$( "#dialog" ).dialog( "open" );
}
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
<body>
<?php include("toolbar.php");?>

<div id="dialog"></div>
<div id="charac_div" ></div>

</body></html>