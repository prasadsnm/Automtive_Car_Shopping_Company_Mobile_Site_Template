<?php  
    include("header.php");
    include("function.php");
    $type = isset($_GET['type'])?$_GET['type']:"";
?>
	<div data-role="content" data-theme="b" id="index_body">
		<ul data-role="listview" data-theme="b" class="upper_case">
      <li data-role="list-divider" id="list_header">Select Search Type</li>
         <?php
           liMaker_("search by make", "search_make", $type, "make");
           liMaker_("search by price", "search_price", $type, "price");
           liMaker_("search by body style",  "search_body_style", $type, "body_style");
           liMaker_("search by year",  "search_year", $type, "year");
           //liMaker_("search by MPG",  "search_mpg", $type, "mpg");
           if($type == "old_car"){
               liMaker_("search by Mileage",  "search_mileage",  $type, "mileage");            
           }
           liMaker_("advanced search",  "advance_search",  $type, "advance_search");
         ?> 
		</ul>	
</div><!-- /content -->
<?php  include("footer.php"); ?>	