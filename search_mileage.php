<?php  
    include("header.php");
    $type = isset($_GET['type'])?$_GET['type']:"";
    $jstype = json_encode($type);
?>
<script type="text/javascript">
      $(document).ready(function(){
        <? echo "var type = $jstype;"; ?>

        function rangeMeter(lowerRange, upperRange, array){
          var count = 0;
          for (var i = 0; i < array.length; i++) {
            if(array[i] >= lowerRange && array[i] <= upperRange){
              count++;
            }
          };
          return count;
        }

        function addCommas(str) {
             var amount = new String(str);
             amount = amount.split("").reverse();
             var output = "";
             for ( var i = 0; i <= amount.length-1; i++ ){
             output = amount[i] + output;
             if ((i+1) % 3 == 0 && (amount.length-1) !== i) output = ',' + output;
             }
             return output;
        }  

        var parent = $('.miless .upper_case');
        var mileArray = new Array();
        $('.loading').show();
        $.getJSON(url, function(data){
          $('.loading').hide();
          if(type === "new_car"){
            $.each(data, function(index, item){
              if(item.year >= y) mileArray.push(item.miles);
            });
          }

          else if(type === "old_car"){
            $.each(data, function(index, item){
              if(item.year < y) mileArray.push(item.miles);
            });
          }

            var max = Math.max.apply(Math, mileArray);
            var c = rangeMeter(0, 20000, mileArray);
            parent.append('<li  data-icon="index-arrow" class="search"> <a href="search_make.php?type=' + type + '&milelow=' + 0 + '&mileup=' + 20000 + '" style="font-size: 16px;margin-left: 10px;font-weight:normal;">'  + 0 + ' - ' + 20000 + '<span class="ui-li-count" id="counter1">' + addCommas(c) +'</span></a></li>'); 
            parent.listview('refresh');
            for (var i = 20001; i < max; i+=20000) {
                  var upper = i + 19999;
                  c = rangeMeter(i, upper, mileArray);
                  if((max - i) < 19999){
                    parent.append('<li  data-icon="index-arrow" class="search"> <a href="search_make.php?type=' + type + '&milelow=' + i + '&mileup=' + upper + '" style="font-size: 16px;margin-left: 10px;font-weight:normal;">'  + addCommas(i) + '+'+ '<span class="ui-li-count" id="counter1">' + addCommas(c) +'</span></a></li>'); 
                    parent.listview('refresh');
                    break;
                  }
                  parent.append('<li  data-icon="index-arrow" class="search"> <a href="search_make.php?type=' + type + '&milelow=' + i + '&mileup=' + upper + '" style="font-size: 16px;margin-left: 10px;font-weight:normal;">'  + addCommas(i) + ' - '+ addCommas(upper) + '<span class="ui-li-count" id="counter1">' + c +'</span></a></li>'); 
                  parent.listview('refresh'); 
            };


        });
      });
</script>
  <div data-role="content" data-theme="b" id="index_b" class="miless">   
    <ul data-role="listview" data-theme="b" class="upper_case">
      <li data-role="list-divider" id="list_header">Select Mileage</li>
      <div class="loading"></div> 
    </ul> 
</div><!-- /content -->
<?php  include("footer.php"); ?>  
         