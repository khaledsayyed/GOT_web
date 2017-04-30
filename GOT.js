$(document).ready(function(){
		$( "#main-sidebar" ).simplerSidebar( {
	  selectors: {
	    trigger: "#toggle-sidebar",
	    quitter: ".close-sb"
	  }
	});
	
$("#snow").hover(function(){$("#snow").removeClass("tm").addClass("highlighted");
	},function(){$("#snow").removeClass("highlighted").addClass("tm");
	});
	
	
}
);