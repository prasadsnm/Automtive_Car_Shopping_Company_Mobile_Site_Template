<script type="text/javascript">
$(document).ready(function(){
	function imageResize(){
		var contentWidth = $(window).width();
		$('.rs-slider li img').css('width', contentWidth);
	}
	imageResize();
	$(window).bind("resize",function(){
		imageResize();
	});   
});
</script>
<link rel="stylesheet" href="css/refineslide.css" /> <!--Image slideshow css-->
<script src="js/jquery.refineslide.min.js"></script> <!--Image slideshow js--> 
<ul class="rs-slider">
    <li><img src="images/slide/img4.jpg" alt="" /></li>
    <li><img src="images/slide/img3.jpg" alt="" /></li>
    <li><img src="images/slide/img5.jpg" alt="" /></li>
</ul>