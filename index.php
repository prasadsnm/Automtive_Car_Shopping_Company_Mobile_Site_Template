<?php  include("header.php"); ?>

	<div data-role="content" >
		<ul data-role="listview" data-theme="a" class="upper_case">
         <?php
           include("function.php");
           liMaker("search", "new & pre-owned inventory", "search", "search_black");
           liMaker("call", "talk to the pros..", "call", "call_black");
           liMaker("trade-in", "trade in for top doller!", "trade_in", "trade_in");
           liMaker("loan", "need financing? Apply now!", "loan", "loan");
           liMaker("service", "need maintenance or repair?", "service", "service");
         ?>
		</ul>	
	</div><!-- /content -->

<?php  include("footer.php"); ?>	