<?php
 session_start();	
function is_photo_uploaded_and_moved($user) {
	// bail if there were no upload forms
   if(empty($_FILES)):
       return false;
endif;
   $file = $_FILES['photo']['tmp_name']; // check for uploaded photo
	if( !empty($file) && is_uploaded_file( $file )):
            move_uploaded_file($file, "users_photos/$user.jpg");//rename and move
            return true;
        endif;
  
    // return false if no files were found
   return false;
}
if(isSet($_GET["name"])&&isSet($_GET["email"])&&isSet($_GET["passwd"])&&isSet($_GET["passwd1"])):
$name=$_GET["name"];
$email=$_GET["email"];
$password=$_GET["passwd"];
$query="INSERT INTO users VALUES('$name','$email','$password'";

if(isSet($_GET["team"])&&$_GET["team"]!=NULL){$team=$_GET['team'];$query=$query.",'$team')";}else{$query=$query.",NULL)";}


try{

$db = new PDO("mysql:host=localhost:3307;dbname=got", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec($query);
if(isSet($_GET["photo"])&&$_GET["photo"]!=NULL){is_photo_uploaded_and_moved($name);}
$_SESSION["logged_in_name"] = $name; 
}catch (PDOException $e){
	
	die("Connection failed: " . $e->getMessage());
}


endif;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
	<title>Main </title>
	<link href="GOT_style.css" rel="stylesheet" type="text/css"/>
<script src="jquery.js"  type="text/javascript">></script>
<!-- for the count down timer-->
 <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" />
 <link rel="stylesheet" href="timer/countdown/jquery.countdown.css" />

  <!-- JavaScript includes-->
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="timer/countdown/jquery.countdown.js"></script>
		
	`	<!--  **********   --> 
	<script  type="text/javascript">
	
var images = [];var i = 0;
//test

//test
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
var continue_music,continue_from;
var interval;
$(document).ready(function(){
	
	continue_music = localStorage['audio'] || 'stop';
	continue_from = localStorage['play_from'] || '0';
$("#play_sound").click(play_stop_music);	
if(continue_music!=='stop'){
	$("#play_sound_pic").attr("src","assets/icons/muted.png");
document.getElementById("page_audio").oncanplay=function() {
  this.currentTime = parseInt( localStorage['play_from']); 
  document.getElementById("page_audio").play();
};
  interval = setInterval(update_play_from, 1000);

}else{
	localStorage['audio']= 'stop';
	localStorage['play_from'] = '0';
}



	$(".active").removeClass("active");
		$("#index").addClass("active");

		$( "#main-sidebar" ).simplerSidebar( {
	  selectors: {
	    trigger: ".toggle-sidebar",
	    quitter: ".close-sb"
	  }
	});
	$("#login_message").hide();
	$("#login_message,.toggle-sidebar").click(function(){$("#login_message").hide();});
	$(".box").hide();
 $(".clickFade ul").hide();
 $(".contento button").click(join);
    $(".clickFade").click(function(){
        $(this).children("ul").stop(true,true).fadeToggle("medium"),
        $(this).toggleClass("dropdown-active");
    });

	$("#jon1").hover(function(){
	$("#"+$(this).attr("id")+"3").animate({"width":"80","height":"190px","top":"15px","right":"20px"},"slow");
	$("#"+$(this).attr("id")+"2").animate({"width":"100","height":"230px","top":"5px","right":"10px"},"slow");
	},function(){
	$("#"+$(this).attr("id")+"3").animate({"width":"70px","height":"170px","top":"25px","right":"25px"},"slow");
	$("#"+$(this).attr("id")+"2").animate({"width":"70px","height":"170px","top":"25px","right":"25px"},"slow");
	});
	$("#dany1").hover(function(){
	$("#"+$(this).attr("id")+"3").animate({"width":"80","height":"190px","top":"15px","left":"20px"},"slow");
	$("#"+$(this).attr("id")+"2").animate({"width":"100","height":"230px","top":"5px","left":"10px"},"slow");
	},function(){
	$("#"+$(this).attr("id")+"3").animate({"width":"70","height":"170px","top":"25px","left":"25px"},"slow");
	$("#"+$(this).attr("id")+"2").animate({"width":"70","height":"170","top":"25px","left":"25px"},"slow");
	});
$("#finger1").hover(function(){
	$("#"+$(this).attr("id")+"3").animate({"width":"80","height":"190px","top":"290px","left":"20px"},"slow");
	$("#"+$(this).attr("id")+"2").animate({"width":"100","height":"230px","top":"275px","left":"10px"},"slow");
	},function(){
	$("#"+$(this).attr("id")+"3").animate({"width":"70","height":"170px","top":"300px","left":"25px"},"slow");
	$("#"+$(this).attr("id")+"2").animate({"width":"70","height":"170","top":"300px","left":"25px"},"slow");
	});
	$("#cersei1").hover(function(){
	$("#"+$(this).attr("id")+"3").animate({"width":"80","height":"190px","top":"290px","right":"20px"},"slow");
	$("#"+$(this).attr("id")+"2").animate({"width":"100","height":"230px","top":"275px","right":"10px"},"slow");
	},function(){
	$("#"+$(this).attr("id")+"3").animate({"width":"70","height":"170px","top":"300px","right":"25px"},"slow");
	$("#"+$(this).attr("id")+"2").animate({"width":"70","height":"170","top":"300px","right":"25px"},"slow");
	});
	$("#dany1").click(function(){$(".box").hide(300);$("#dany_box").show(600);});
	$("#jon1").click(function(){$(".box").hide(300);$("#jon_box").show(600);});
	$("#cersei1").click(function(){$(".box").hide(300);$("#cersei_box").show(600);});
	$("#finger1").click(function(){$(".box").hide(300);$("#balish_box").show(600);});
	$(".close").click(function(){$(".box").hide(300);});

			update_members();
			//jason response to get images to display on main page	
var ajax = new XMLHttpRequest();
ajax.onload = load_pics;
ajax.open("GET", "server.php?mainImages=all", true);
ajax.send();	
	
	var ajax = new XMLHttpRequest();
ajax.onload = load_time;
ajax.open("GET", "server.php?timer=yes", true);
ajax.send();	
	


setInterval(fadeDivs, 10000);
}
);
	

function update_members(){
var ajax2 = new XMLHttpRequest();
			ajax2.onload=dump_members;
			ajax2.open("GET", "server.php?get_members=true", true);
			ajax2.send();
}
function dump_members(){
	data = JSON.parse(this.responseText);
	for (var i = 0; i < data.members.length; i++) {

		$("#"+data.members[i].team+"_members").text(data.members[i].count);
	}
}
function join(){
		var logged_username=document.getElementById("user_name").innerHTML;
		if(logged_username===""){
		$("#login_message").show(500);
		// to be changed
		}else{
		
			var team = this.id;
			
			var ajax2 = new XMLHttpRequest();
			ajax2.onload=update_members;
			ajax2.open("GET", "server.php?join_team="+team, true);
			ajax2.send();
		
		}
	
}



function load_pics(){
	
	var data = JSON.parse(this.responseText);
	for (var i = 0; i < data.imag.length; i++) {
	
	var source =data.imag[i].source;
	images[i]= source;
	
	}
}
//fading images 

 

function fadeDivs() {
	 i = i < images.length ? i : 0;

    $('#image1').fadeOut(200, function(){
        $(this).attr('src',images[i++]).fadeIn(200);
    })
	 $('#image2').fadeOut(400, function(){
        $(this).attr('src',images[i++]).fadeIn(400);
    })
	 $('#image3').fadeOut(300, function(){
        $(this).attr('src',images[i++]).fadeIn(300);
    })
	 $('#image4').fadeOut(500, function(){
        $(this).attr('src',images[i++]).fadeIn(500);
    })
	
   // i++;
}
function load_time(){
	
	var data = JSON.parse(this.responseText);
	for (var i = 0; i < data.timer.length; i++) {
	var time =data.timer[i].time;
	}
		var d= time.split("/");

var t=new Date();
	var note = $('#note'),
		 ts = new Date(d[0], d[1], d[2]),
		newEpisode= true;

	if(t > ts){
		// if the new episode is already here  just wait a whole year
		//note this should not happen since admin always updates databse
		// Notice the *1000 at the end - time must be in milliseconds
		ts = (new Date()).getTime() + 365*24*60*60*1000;

		newEpisode = false;
	}
		
	$('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			if(newEpisode){
				message += "left until the new Episode!";
			}
			else {
			message += "left until the new Episode!";
			}
			
			note.html(message);
		}
	});
	
}


	</script>
</head>
<body>
<?php include("toolbar.php");?>
<div id="our_cool_div">
<div id="countdown"></div>
  <p id="note"></p> 
    	
<div id="fadingimg">
<img id="image1" src="./images/cersei.jpg" />
<img id="image2" src="./images/dany.jpg" />
<img id="image3" src="./images/snow.jpg" />

<img id="image4" src="./images/finger.jpg" /><br/>
<video id="main_page_video" width="320" height="240" autoplay loop controls muted>
  <source src="assets/main_page_video/long_walk.mp4" type="video/mp4" />


</video>
</div>

      


<!--viframe src="//giphy.com/embed/2VZEyhyd9jduM" width="480" height="422" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/game-of-thrones-dragon-fantasy-2VZEyhyd9jduM">via GIPHY</a></p-->




<img id="dany1" src="images/dany.jpg" class="team" title="Danerys Targarian" alt="Danerys Targarian" height="170" width="70"/>
<img id="jon1" src="images/snow.jpg" class="team_r" title="Jon Snow" alt="Jon Snow" height="170" width="70"/>
<img id="cersei1" src="images/cersei.jpg" class="team_r" title="Cersei Lannister" alt="Cersei Lannister" height="170" width="70"/>
<img id="finger1" src="images/finger.jpg" class="team" title="Little Finger" alt="Little Finger" height="170" width="70"/>
<img id="dany12" src="images/dany2.jpg" title="Danerys Targarian" alt="Danerys Targarian" height="170" width="70"/>
<img id="jon12" src="images/snow2.jpg" title="Jon Snow" alt="Jon Snow" height="170" width="70"/>
<img id="cersei12" src="images/cersei2.jpg"  title="Cersei Lannister" alt="Cersei Lannister" height="170" width="70"/>
<img id="finger12" src="images/finger2.jpg"  title="Little Finger" alt="Little Finger" height="170" width="70"/>
<img id="dany13" src="images/dany3.jpg" title="Danerys Targarian" alt="Danerys Targarian" height="170" width="70"/>
<img id="jon13" src="images/snow3.jpg" title="Jon Snow" alt="Jon Snow" height="170" width="70"/>
<img id="finger13" src="images/finger3.jpg"  title="Little Finger" alt="Little Finger" height="170" width="70"/>
<img id="cersei13" src="images/cersei3.jpg"  title="Cersei Lannister" alt="Cersei Lannister" height="170" width="70"/>

<div id="dany_box" class="box"><h3><button class="close"> X </button>Danerys Targaryan- Tyrion Lannister</h3><div class="contento"  ><p>Daenerys Stormborn of the House Targaryen, the Unburnt, the First of Her Name, Queen of Meereen, Queen of the Andals, the Rhoynar and the First Men, Lady Regnant of the Seven Kingdoms, Protector of the Realm, Khaleesi of the Great Grass Sea, Breaker of Chains and Mother of Dragons</p><p><button id="dany">JOIN</button><strong id="dany_members">0</strong> members in team danerys</p></div></div>
<div id="balish_box" class="box"><h3><button class="close"> X </button>Petyr Balish - SanSa Stark</h3><div class="contento" ><p>Lord Petyr Baelish, popularly called Littlefinger, was the Master of Coin on the Small Council. He is a skilled manipulator and uses his ownership of brothels in King's Landing to both accrue intelligence on political rivals and acquire vast wealth. </p><p><button id="finger">JOIN</button><strong id="finger_members">0</strong> members in team Balish</p></div></div>
<div id="cersei_box" class="box"><h3><button class="close"> X </button>Cersei Lannister</h3><div class="contento"><p>Queen Cersei I Lannister is the widow of King Robert Baratheon and Queen of the Seven Kingdoms.Cersei assumed the throne under the name of Cersei of the House Lannister, the First of Her Name, Queen of the Andals and the First Men, Protector of the Seven Kingdoms</p><p><button  id="cersei">JOIN</button><strong id="cersei_members">0</strong> members in team Cersei Lannister</p></div></div>
<div id="jon_box" class="box"><h3><button class="close"> X </button>Jon Sno-Liana Mormund</h3><div class="contento"><p>King Jon Snow is the son of Lady Lyanna Stark and Rhaegar Targaryen, the Prince of Dragonstone.After securing help from a few other Northern Houses and the Vale of Arryn, they successfully retake the castle from Ramsay Bolton, restoring House Stark's dominion over the North with Jon being declared the new King in the North by the Northern Lords.  </p><p><button id="snow">JOIN</button><strong id="snow_members">0</strong> members in team Jon Snow </p></div></div>



</div>
</body>
</html>