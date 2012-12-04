<?php  
    include("header.php");
    $type = isset($_GET['type'])?$_GET['type']:"";
    $jstype = json_encode($type);
?>
<script type="text/javascript">
      $(document).ready(function(){
        <? echo "var type = $jstype;"; ?>

        var parent = $('.xyz .upper_case');
        var c = 0; var count = 0;
        var yearArray = new Array();

        function countElement(item, array){
          var count = 0;
          $.each(array, function(i, v){
            if(v === item) count++;
          });
          return count;
        }  

        $(".loading").show();
        $.getJSON(url, function(data){
          $(".loading").hide();
          if(type === "new_car"){

            $.each(data, function(index, item){
              if(item.year == y) c++;
              else if(item.year > y) count++;
            });

            parent.append('<li  data-icon="index-arrow" class="search"> <a href="search_make.php?type=' + type + '&y=' + y + '" style="font-size: 16px;margin-left: 10px;font-weight:normal;">' + y + '<span class="ui-li-count" id="counter1">' + c +'</span></a></li>'); 
            parent.listview('refresh'); 
            parent.append('<li  data-icon="index-arrow" class="search"> <a href="search_make.php?type=' + type + '&y=' + (y+1) + '" style="font-size: 16px;margin-left: 10px;font-weight:normal;">' + (y+1) + '<span class="ui-li-count" id="counter1">' + count +'</span></a></li>'); 
            parent.listview('refresh');             
          }

          else if(type === "old_car"){

            $.each(data, function(index, item){
              if(item.year < y) yearArray.push(item.year);
            });

            var countArray = new Array();
            var yArray = new Array();

            $.each(yearArray, function(i, item){
              if($.inArray(item, yArray) == -1){
                yArray.push(item);
                var counter = countElement(item, yearArray);
                countArray.push(counter);
              }
            });

            $.each(yArray, function(i, item){  
              parent.append('<li  data-icon="index-arrow" class="search"> <a href="search_make.php?type=' + type + '&y=' + item + '" style="font-size: 16px;margin-left: 10px;font-weight:normal;">' + item + '<span class="ui-li-count" id="counter1">' + countArray[i] +'</span></a></li>'); 
              parent.listview('refresh');      
            });

          }


        });
      });
</script>
	<div data-role="content" data-theme="b" id="index_b" class="xyz">  
		<ul data-role="listview" data-theme="b" class="upper_case">
      <li data-role="list-divider" id="list_header">Select Year</li> 
      <div class="loading"></div>
		</ul>	
</div><!-- /content -->
<?php  include("footer.php"); ?>	