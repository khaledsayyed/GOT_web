$(document).ready(function(){
	var ajax = new XMLHttpRequest();
ajax.onload = load_time;
ajax.open("GET", "server.php?timer=yes", true);
ajax.send();	
	


}
);
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