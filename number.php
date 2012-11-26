<?php  include("header.php"); ?>
	<div data-role="content" data-theme="b">
		<span></span>
		<ul data-role="listview" data-theme="b" class="upper_case">
			<li id="list_header" data-role="list-divider">Select the department you wish to call.</li>
         <?php
           include("function.php");
           liMaker3("New Sales Department", "800-718-1720", "call_black");
           liMaker3("Pre-owned Sales Department", "800-718-1720", "call_black");
           liMaker3("Service Department", "800-590-6840", "call_black");
           liMaker3("Finance Department", "800-718-1720", "call_black");
           liMaker3("Parts Department", "800-590-6840", "call_black");
         ?>
		</ul>	
	</div><!-- /content -->
   
<?php  include("footer.php"); ?>