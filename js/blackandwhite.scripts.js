jQuery( function( $ ) {
	 
$(document).ready(function(){
	
	var numberOfImages = $('.bxslider li').length;
	if( numberOfImages < 2 ) {

    var slider = $('.bxslider').bxSlider({
  		mode: 'horizontal',
		pager: false,	
    	autoHidePager: true,
		auto: false,
		pause: 6000,
		speed: 1000, 
		useCSS: false
		}); 	
	   }
	if( numberOfImages > 1 ) {

    var slider = $('.bxslider').bxSlider({
  		mode: 'horizontal',
		pager: false,	
    	autoHidePager: true,
		auto: true,
		pause: 6000,
		speed: 1000, 
		useCSS: false
		}); 	
	   }
	});
	
});
