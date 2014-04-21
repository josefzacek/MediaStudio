// JavaScript Document
$(document).ready(function() { 	


/*portfolio page hover effects*/
$(".portfolio_item_image").hover(function(){
		$(this).stop().animate({top:"-150px"},{queue:false,duration:400});
	}, function() {
		$(this).stop().animate({top:"0px"},{queue:false,duration:400});
	});

});