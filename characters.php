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
$(document).ready(function(){
		$(".active").removeClass("active");
		$("#characters").addClass("active");

$( "#main-sidebar" ).simplerSidebar( {
	  selectors: {
	    trigger: ".toggle-sidebar",
	    quitter: ".close-sb"
	  }
	});
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

</script>

</head>
<body>
<?php include("toolbar.php");?>

<div id="dialog"></div>
<div id="charac_div" ></div>

</body></html>