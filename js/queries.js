/*$(document).ready(function(){
$('li').click(function(){
$(this).animate({left : '+=750'}, 350);
$('h1').animate({bottom : '-=67'}, 350);
});

/*each(function(){
$(this).click(function(){
$(this).animate({"left" : 50}, 500)

});

});*/


$(function(){
	var box = $('div.boxOne > div');
	box.hide().filter(':first').show();	
	
	$('div.boxOne ol.tabs a').click(function(){
	box.hide();
	box.filter(this.hash).show();
	$('div.boxOne ol.tabs a').removeClass('selected');
	$(this).addClass('selected');
	return false;
	});
	
$(function(){

    // Initialize the gallery
    $('.thumbs a').touchTouch();

});
	
	

	
	
	
	
	

	
	
});



