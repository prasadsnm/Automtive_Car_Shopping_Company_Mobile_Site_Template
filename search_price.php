<?php  
    include("header.php");
    $type = isset($_GET['type'])?$_GET['type']:"";
    $jstype = json_encode($type);
?>
<script type="text/javascript">
      $(document).ready(function(){
        <? echo "var type = $jstype;"; ?>


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
        function rangeMeter(lowerRange, upperRange, array){
          var count = 0;
          for (var i = 0; i < array.length; i++) {
            if(array[i] >= lowerRange && array[i] <= upperRange){
              ++count;
            }
          };
          return count;
        }
function integerRound (digit) {
    var j = 0, msb; 
    while( digit > 0 ) {
      msb = digit % 10;
      digit = Math.floor( digit / 10 );
      j++;
    }
    while ( j > 1 ) {
      msb = msb + '0';
      j--;
    };
    return msb;
}

        var parent = $('#index_b .upper_case');
        var priceArray = new Array();

        $.getJSON(url, function(data){

          if(type === "new_car"){

            $.each(data, function(index, item){
              if(item.year >= y) priceArray.push(item.price.net);
            });
          }

          else if(type === "old_car"){

            $.each(data, function(index, item){
              if(item.year < y) priceArray.push(item.price.net);
            });
          }
            var max = Math.max.apply(Math, priceArray);
            var min = Math.min.apply(Math, priceArray);
            var lowerMin = integerRound(min);
            for (var i = min; i < max; i+=3000) {
                  var upper = i+2999;
                  var c = rangeMeter(i, upper, priceArray);
                  if((max - i) < 3000){
                    parent.append('<li  data-icon="index-arrow" class="search"> <a href="search_make.php?type=' + type + '&pricelow=' + i + '&priceup=' + upper + '" style="font-size: 16px;margin-left: 10px;font-weight:normal;">' + ' $' + addCommas(i) + '+'+ '<span class="ui-li-count" id="counter1">' + c +'</span></a></li>'); 
                    parent.listview('refresh');
                    break;
                  }
                  parent.append('<li  data-icon="index-arrow" class="search"> <a href="search_make.php?type=' + type + '&pricelow=' + i + '&priceup=' + upper + '" style="font-size: 16px;margin-left: 10px;font-weight:normal;">' + ' $' + addCommas(i) + ' - $'+ addCommas(upper)+ '<span class="ui-li-count" id="counter1">' + c +'</span></a></li>'); 
                  parent.listview('refresh'); 
            };

        });
      });
</script>
  <div data-role="content" data-theme="b" id="index_b">   
    <ul data-role="listview" data-theme="b" class="upper_case">
      <li data-role="list-divider" id="list_header">Select Price</li> 
    </ul> 
</div><!-- /content -->
<?php  include("footer.php"); ?>  
         