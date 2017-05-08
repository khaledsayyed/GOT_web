<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
	<title>Main </title>
	<link href="GOT_style.css" rel="stylesheet" type="text/css"/>
<script src="jquery.js"  type="text/javascript">></script>

	<script  type="text/javascript">
	
var images = [];
$(document).ready(function(){ //jason response to get images to display on main page	
var ajax = new XMLHttpRequest();
ajax.onload = load_pics;
ajax.open("GET", "server.php?mainImages=all", true);
ajax.send();} );
function load_pics(){
	
	var data = JSON.parse(this.responseText);
	
	for (var i = 0; i < data.imag.length; i++) {
	
	var source =data.imag[i].source;
	images[i]= source;
	document.write(images[i]);
	}
}
//fading images 

 /*var i = 0;
setInterval(fadeDivs, 3000);

function fadeDivs() {
	

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
}*/
	</script>
</head>
<body>

<!--<div>
<img id="image1" src="./images/cersei.jpg" />
<img id="image2" src="./images/dany.jpg" />
<img id="image3" src="./images/snow.jpg" />
<img id="image4" src="./images/finger.jpg" />
</div>->

</body>
</html>