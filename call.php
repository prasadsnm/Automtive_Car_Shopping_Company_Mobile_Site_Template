<?php  include("header.php"); ?>

	<div data-role="content" >
		<ul data-role="listview" data-theme="a" class="upper_case">
         <?php
           include("function.php");
           liMaker2("Buick", "", "buick");
           liMaker2("chevrolet", "chevrolet", "chevrolet");
         ?>
		</ul>	
	</div><!-- /content -->

<?php  include("footer.php"); ?>	