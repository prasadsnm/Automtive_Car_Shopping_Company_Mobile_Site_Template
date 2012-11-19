$(document).ready(function(){
	function imageResize(){
		var contentWidth = $(window).width();
		$('.rs-slider li img').css('width', contentWidth);
	}
	imageResize();
	$(window).resize(function(){
		imageResize();
	});
});