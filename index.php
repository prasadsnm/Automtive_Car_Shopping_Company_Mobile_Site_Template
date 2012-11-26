<?php  
    include("header.php");
    include("slider.php");
    include("function.php");
?>
<style type="text/css">
.ui-li .ui-btn-inner  a.ui-link-inherit, .ui-li-static.ui-li {
    padding-top:0px;
    padding-bottom:0px;
}
</style>
	<div data-role="content" data-theme="b" id="index_body">
		<ul data-role="listview" data-theme="b" class="upper_case">
         <?php
           liMaker("search", "new & pre-owned inventory", "search", "search_black");
           liMaker("call", "talk to the pros..", "call", "call_black");
           liMaker("inquire", "Ask what to know", "inquire", "inquire");
           liMaker("trade-in", "trade in for top doller!", "trade", "trade_in");
           liMaker("loan", "need financing? Apply now!", "loan", "loan");
           liMaker("service", "need maintenance or repair?", "service", "service");
         ?> 
		</ul>	
</div><!-- /content -->
<script>
    $(document).ready(function () {
        $('.rs-slider').refineSlide({
            transition         : 'cubeH',
            fallback3d         : 'fade',
            transitionDuration : 650,
            autoPlay           : true,
            keyNav             : false,
            delay              : 2500,
            controls           : null
        });
    });
</script>
<?php  include("footer.php"); ?>	