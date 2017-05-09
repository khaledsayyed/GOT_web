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
<!-- for the count down timer -->
 <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" />
<link rel="stylesheet" href="timer/css/styles.css" />
 <link rel="stylesheet" href="timer/countdown/jquery.countdown.css" />

  <!-- JavaScript includes -->
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="timer/countdown/jquery.countdown.js"></script>
		<script src="timer/js/script.js"></script>
	`	<!--  **********   -->
	<script  type="text/javascript">
	
var images = [];var i = 0;

$(document).ready(function(){
	$(".active").removeClass("active");
		$("#index").addClass("active");

		$( "#main-sidebar" ).simplerSidebar( {
	  selectors: {
	    trigger: "#toggle-sidebar",
	    quitter: ".close-sb"
	  }
	});
	
 $(".clickFade ul").hide();
    $(".clickFade").click(function(){
        $(this).children("ul").stop(true,true).fadeToggle("medium"),
        $(this).toggleClass("dropdown-active");
    });
//jason response to get images to display on main page	
var ajax = new XMLHttpRequest();
ajax.onload = load_pics;
ajax.open("GET", "server.php?mainImages=all", true);
ajax.send();	
	

setInterval(fadeDivs, 3000);
}
);

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

    $('#image1').fadeOut(100, function(){
        $(this).attr('src',images[i++]).fadeIn(100);
    })
	 $('#image2').fadeOut(100, function(){
        $(this).attr('src',images[i++]).fadeIn(100);
    })
	 $('#image3').fadeOut(100, function(){
        $(this).attr('src',images[i++]).fadeIn(100);
    })
	 $('#image4').fadeOut(100, function(){
        $(this).attr('src',images[i++]).fadeIn(100);
    })
	
   // i++;
}


	</script>
</head>
<body>
<?php include("toolbar.php");?>
<div id="fadingimg">
<img id="image1" src="./images/cersei.jpg" />
<img id="image2" src="./images/dany.jpg" />
<img id="image3" src="./images/snow.jpg" />
<img id="image4" src="./images/finger.jpg" />
</div>
<div id="countdown"></div>
	<p id="note"></p>

        
      


<!--viframe src="//giphy.com/embed/2VZEyhyd9jduM" width="480" height="422" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/game-of-thrones-dragon-fantasy-2VZEyhyd9jduM">via GIPHY</a></p-->
<!--video width="320" height="240" autoplay loop controls muted>
  <source src="assets/main_page_video/long_walk.mp4" type="video/mp4" />

</video>-->

</body>
</html>