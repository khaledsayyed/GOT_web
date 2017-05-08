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
<script src="jquery.js"></script>
	<script  type="text/javascript">
	
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
	$("#jon").hover(function(){
	$("#"+$(this).attr("id")+"3").animate({"width":"80","height":"190px","top":"15px","right":"20px"},"slow");
	$("#"+$(this).attr("id")+"2").animate({"width":"100","height":"230px","top":"5px","right":"10px"},"slow");
	},function(){
	$("#"+$(this).attr("id")+"3").animate({"width":"70px","height":"170px","top":"25px","right":"25px"},"slow");
	$("#"+$(this).attr("id")+"2").animate({"width":"70px","height":"170px","top":"25px","right":"25px"},"slow");
	});
	$("#dany").hover(function(){
	$("#"+$(this).attr("id")+"3").animate({"width":"80","height":"190px","top":"15px","left":"20px"},"slow");
	$("#"+$(this).attr("id")+"2").animate({"width":"100","height":"230px","top":"5px","left":"10px"},"slow");
	},function(){
	$("#"+$(this).attr("id")+"3").animate({"width":"70","height":"170px","top":"25px","left":"25px"},"slow");
	$("#"+$(this).attr("id")+"2").animate({"width":"70","height":"170","top":"25px","left":"25px"},"slow");
	});
$("#finger").hover(function(){
	$("#"+$(this).attr("id")+"3").animate({"width":"80","height":"190px","top":"290px","left":"20px"},"slow");
	$("#"+$(this).attr("id")+"2").animate({"width":"100","height":"230px","top":"275px","left":"10px"},"slow");
	},function(){
	$("#"+$(this).attr("id")+"3").animate({"width":"70","height":"170px","top":"300px","left":"25px"},"slow");
	$("#"+$(this).attr("id")+"2").animate({"width":"70","height":"170","top":"300px","left":"25px"},"slow");
	});
	$("#cersei").hover(function(){
	$("#"+$(this).attr("id")+"3").animate({"width":"80","height":"190px","top":"290px","right":"20px"},"slow");
	$("#"+$(this).attr("id")+"2").animate({"width":"100","height":"230px","top":"275px","right":"10px"},"slow");
	},function(){
	$("#"+$(this).attr("id")+"3").animate({"width":"70","height":"170px","top":"300px","right":"25px"},"slow");
	$("#"+$(this).attr("id")+"2").animate({"width":"70","height":"170","top":"300px","right":"25px"},"slow");
	});
});

	</script>
</head>
<body>
<?php include("toolbar.php");?>
<!--viframe src="//giphy.com/embed/2VZEyhyd9jduM" width="480" height="422" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/game-of-thrones-dragon-fantasy-2VZEyhyd9jduM">via GIPHY</a></p-->
<!--video width="320" height="240" autoplay loop controls muted>
  <source src="assets/main_page_video/long_walk.mp4" type="video/mp4" />

</video-->
<div id="our_cool_div">
<img id="dany" src="images/dany.jpg" class="team" title="Danerys Targarian" alt="Danerys Targarian" height="170" width="70"/>
<img id="jon" src="images/snow.jpg" class="team_r" title="Jon Snow" alt="Jon Snow" height="170" width="70"/>
<img id="cersei" src="images/cersei.jpg" class="team_r" title="Cersei Lannister" alt="Cersei Lannister" height="170" width="70"/>
<img id="finger" src="images/finger.jpg" class="team" title="Little Finger" alt="Little Finger" height="170" width="70"/>
<img id="dany2" src="images/dany2.jpg" title="Danerys Targarian" alt="Danerys Targarian" height="170" width="70"/>
<img id="jon2" src="images/snow2.jpg" title="Jon Snow" alt="Jon Snow" height="170" width="70"/>
<img id="cersei2" src="images/cersei2.jpg"  title="Cersei Lannister" alt="Cersei Lannister" height="170" width="70"/>
<img id="finger2" src="images/finger2.jpg"  title="Little Finger" alt="Little Finger" height="170" width="70"/>
<img id="dany3" src="images/dany3.jpg" title="Danerys Targarian" alt="Danerys Targarian" height="170" width="70"/>
<img id="jon3" src="images/snow3.jpg" title="Jon Snow" alt="Jon Snow" height="170" width="70"/>
<img id="finger3" src="images/finger3.jpg"  title="Little Finger" alt="Little Finger" height="170" width="70"/>
<img id="cersei3" src="images/cersei3.jpg"  title="Cersei Lannister" alt="Cersei Lannister" height="170" width="70"/>


</div>
</body>
</html>