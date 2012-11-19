<?php  include("header.php"); ?>
    <!--SlideShow-->
    <link rel="stylesheet" href="css/refineslide.css" />
    <script src="js/jquery.refineslide.min.js"></script>
    <ul class="rs-slider">
       <li><img src="images/slide/img4.jpg" alt="" /></li>
       <li><img src="images/slide/img3.jpg" alt="" /></li>
       <li><img src="images/slide/img5.jpg" alt="" /></li>
    </ul>
    <!--SlideShow Ends-->

	<div data-role="content">
    
		<ul data-role="listview" data-theme="b" class="upper_case">
         <?php
           include("function.php");
           liMaker("search", "new & pre-owned inventory", "search", "search_black");
           liMaker("call", "talk to the pros..", "call", "call_black");
           liMaker("inquire", "Ask what to know", "inquire", "inquire");
           liMaker("trade-in", "trade in for top doller!", "trade_in", "trade_in");
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
            transitionDuration : 800,
            autoPlay           : true,
            keyNav             : false,
            delay              : 3000,
            controls           : null
        });
    });
</script>
<?php  include("footer.php"); ?>	