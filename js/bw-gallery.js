jQuery( function( $ ) {
	
var container = document.querySelector('#freshly-pressed');
	var msnry; imagesLoaded( container, function() {
  	msnry = new Masonry( container, {
 	   itemSelector: '.press',
	   transitionDuration: '0.3s',
       columnWidth: container.querySelector('.press') })
	});	

});