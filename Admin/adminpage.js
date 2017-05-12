function validate()
{
	var nam, house, story, pic;
	nam=document.getElementById("nm").value;
	house= document.getElementById("house").value;
	story=document.getElementById("story").value;
	pic= document.getElementById("cphoto");
	if(nam.length!=0 && house.length!=0 && story.length!=0 && pic.value!= null)
	{return true;}
	else return false;
	
}
function validateadmin()
{
	var nam;
	nam= document.getElementById("anm").value;
	if(nam.length!=0)return true;
	else return false;
	
}
function validatetime()
{
	var t;
	t= document.getElementById("ntime").value;
	if(t.match(/^[0-9]{4}\/[0-9]{1}\/[0-9]{2}$/) )return true;
	else {alert("invalid formate of time"); return false; }
	
}
// Cache selectors
 var lastId="", topMenu = $("#top-menu"),  topMenuHeight = topMenu.outerHeight()+15,
    // All list items
	/*menuItems =  topMenu.find('a[href*="#"]'), */
    menuItems = topMenu.find("a"),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function(){
      var item = $($(this).attr("href"));
      if (item.length) { return item; }
    });

// Bind click handler to menu items
// so we can get a fancy scroll animation
menuItems.click(function(e){
	 e = e || window.event;
  var href = $(this).attr("href"),
      offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight +1;
  $('html, body').stop().animate({ 
      scrollTop: offsetTop }, 300);
  e.preventDefault();
});

// Bind to scroll
$(window).scroll(function(){
   // Get container scroll position
   var fromTop = $(this).scrollTop()+ topMenuHeight;
   
   // Get id of current scroll item
   var cur = scrollItems.map(function(){
     if ($(this).offset().top < fromTop)
       return this;
   });
   // Get the id of the current element
   cur = cur[cur.length-1];
   var id = cur && cur.length ? cur[0].id : "";
 /*  alert(id);*/
if (lastId !== id) {
       lastId = id;
       // Set/remove active class
	   
       menuItems
         .parent().removeClass("active")
         .end().filter("[href='#"+id+"']").parent().addClass("active");
   }                   
});