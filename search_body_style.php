<?php  
    include("header.php");
    $type = isset($_GET['type'])?$_GET['type']:"";
    $jstype = json_encode($type);
?>
<script type="text/javascript">
      $(document).ready(function(){
        <? echo "var type = $jstype;"; ?>
        var bodyArray = new Array();
        function countElement(item, array){
          var count = 0;
          $.each(array, function(i, v){
            if(v === item) count++;
          });
          return count;
        }
        var y = new Date().getFullYear();
        var parent = $('.body_styles .upper_case');
        $('.loading').show();
        $.getJSON(url, function(data){
          $('.loading').hide();
          if(type === "new_car"){
            $.each(data, function(index, item){
              if(item.year >= y) bodyArray.push(item.body);  
            });
          }
          else if(type === "old_car"){
            $.each(data, function(index, item){
                if(item.year < y) bodyArray.push(item.body);  
            });            
          }
            var arr = new Array(); 
            var countArray = new Array();
            var len = bodyArray.length;
            for (var i = 0; i < len; i++) {
                if($.inArray(bodyArray[i], arr) == -1) {
                  var c = countElement(bodyArray[i], bodyArray);
                  arr.push(bodyArray[i]);
                  countArray.push(c);
                }
             };

            for (var i = 0; i < arr.length; i++) {
                  parent.append('<li  data-icon="index-arrow" class="index"> <a href="search_make.php?type=' + type + '&body=' + arr[i] + '"style="font-size: 16px;margin-left: 10px;"><img src="images/body_style/' + (arr[i]).toLowerCase() + '.png" class="ui-li-thumb" style="margin-top: 7px;"/><br/>' + arr[i] + '<span class="ui-li-count" id="counter1">' + countArray[i] + '</span></a></li>'); 
                  parent.listview('refresh'); 
                };   
        });
      });
</script>
	<div data-role="content" data-theme="b" class="body_styles">
		<ul data-role="listview" data-theme="b" class="upper_case">
      <li data-role="list-divider" id="list_header">Select Body Style</li> 
      <div class="loading"></div>
		</ul>	
</div><!-- /content -->
<?php  include("footer.php"); ?>	


