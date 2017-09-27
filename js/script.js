window.onload = function(){
	
	
	var toggle = $("#toggle");
	var smallNav = $("#small-nav");
	var fullNav = $("#full-nav");
	redraw();
	
	function redraw(){
		
		var width = $(window).width();
	
		if(width <= 480){
			$("#full-nav").css("display", "none");
			$("#small-nav").css("display", "none");
			$("#toggle").css("display", "block");
			console.log("less");
		}else{
			
			$("#full-nav").css("display", "block");
			$("#small-nav").css("display", "none");
			$("#toggle").css("display", "none");
			console.log("More");
		}
	}
	
	$("#toggle").click(function(){
		$("#small-nav").slideToggle(200);
	});
	
	
	
	window.addEventListener("resize",redraw);
	
		$(function() {
				  $('a[href*=#]:not([href=#])').click(function() {
					  
					  redraw();
					  
					if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
					  var target = $(this.hash);
					  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
					  if (target.length) {
						$('html,body').animate({
						  scrollTop: target.offset().top
						}, 1000);
						return false;
					  }
					}
					
					
				  });
	});
	
	
	
	
}

function validate(){
		var number = document.getElementById("contact");
		if(String(number.value).length == 10){
			return true;
		}else{
			return false;
		}
	}