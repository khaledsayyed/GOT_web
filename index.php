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
	
	
}
);
	</script>
</head>
<body>
<?php include("toolbar.php");?>
<!--viframe src="//giphy.com/embed/2VZEyhyd9jduM" width="480" height="422" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/game-of-thrones-dragon-fantasy-2VZEyhyd9jduM">via GIPHY</a></p-->
<!--video width="320" height="240" autoplay loop controls muted>
  <source src="assets/main_page_video/long_walk.mp4" type="video/mp4" />

</video-->

</body>
</html>