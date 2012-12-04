<?php  include("header.php"); ?>
<script type="text/javascript">
		  $(document).ready(function(){
		  	var makeArray = new Array();
		  	var parent = $('.makelist .upper_case');
		  	$(".loading").show();
		  	$.getJSON(url, function(data){
		  		$(".loading").hide();
		  		$.each(data, function(index, item){
		  			if(($.inArray(item.make, makeArray)) == -1){
		  			   makeArray.push(item.make);
		  			   parent.append('<li data-icon="list-arrow"> <a data-transition="slidedown" href="trade_form.php?make='+ item.make +'"><img src="images/car_logo/' + (item.make).toLowerCase() + '.png" class="ui-li-thumb"/>' + item.make + '</a></li>');
		  				parent.listview('refresh');
		  			}
		  		});
		  	});
		  });
</script>
	<div data-role="content" class="makelist">
		<ul data-role="listview" data-theme="a" class="upper_case">
			<div class="loading"></div>
		</ul>
	</div><!-- /content -->
   
<?php  include("footer.php"); ?>