jQuery(document).ready(function(){
    $('li').hide();
	
	$('h3').click(function(){
		$(this).next('li').slideToggle(3000);
	});
	$('li').hover(
	function(){$('li').css ({'background':'#FFE5C3','color':'#524737'});},
	function(){$('li').css ({'background':'#524737','color':'#FFE5C3'});});
	
});
