<?php  include("header.php");
 ?>
<script type="text/javascript">
		  $(document).ready(function(){
            // var y = new Date().getFullYear();
            var parent = $('.search_cars .upper_case');
            var count = 0;
            var total = 0;
            $(".loading").show();
            $.getJSON(url, function(data) {
                $(".loading").hide();
                $.each(data, function(index, item) {
  	                  ++total;
  	                if(item.year >= y) ++count; 
                }); 
            parent.append('<li data-icon="index-arrow" class="search"><a href="search_category.php?type=new_car" data-transition="slide">New Cars<span class="ui-li-count" id="counter1">' + count + '</span></a></li>');
            parent.listview('refresh');
            parent.append('<li data-icon="index-arrow" class="search"><a href="search_category.php?type=old_car" data-transition="slide">Pre-Owned Cars<span class="ui-li-count" id="counter2">' + (total-count) + '</span></a></li>');
            parent.listview('refresh');

            });
		  });
</script>
	<div data-role="content" class="search_cars" >
		<ul data-role="listview" data-theme="b" class="upper_case">
			   <li data-role="list-divider" id="list_header">Search New or Used</li>
               <div class="loading"></div>		    
		</ul>	
	</div><!-- /content -->
   
<?php  include("footer.php"); ?>