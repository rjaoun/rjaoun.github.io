$(document).ready(function() {
	// back to top button
	var btn = $("#back-to-top");
	btn.hide();

	$(window).scroll(function() {
		if ($(window).scrollTop() > 300){
			btn.fadeIn();
		} else {
			btn.fadeOut();
		}
	});
	btn.on("click", function(e) {
		e.preventDefault();
		$("html,body").animate({scrollTop:0}, "300");
		return false;
	});
});