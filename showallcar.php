<? include("header.php"); 
   $make = isset($_GET['make'])?$_GET['make']:"";
   $jsmake = json_encode($make);
   $model = isset($_GET['model'])?$_GET['model']:"";
   $jsmodel = json_encode($model);
   $type = isset($_GET['type'])?$_GET['type']:"";
   $jstype = json_encode($type);
?>
<script type="text/javascript">
      $(document).ready(function(){
        <? echo "var m = $jsmake; var mod = $jsmodel; var type = $jstype;"; ?>
        var url = "inventory/inventory.json";
        var colorArray = new Array();
        var priceArray = new Array();
        var mileageArray = new Array();
        var yearArray = new Array();
        var idArray = new Array();
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
        var y = new Date().getFullYear();
        var parent = $('.makelist .upper_case');
        $.getJSON(url, function(data){
            $.each(data, function(index, item){
              if(type === "new_car"){
                  if( (item.year >= y) && item.model == mod && item.make == m) {
                   colorArray.push(item.color.ext);
                   priceArray.push(item.price.net);
                   mileageArray.push(item.miles);
                   yearArray.push(item.year);
                   idArray.push(item.id);
                }
              } else if( type === "old_car"){
                  if( (item.year < y) && item.model == mod && item.make == m) {
                   colorArray.push(item.color.ext);
                   priceArray.push(item.price.net);
                   mileageArray.push(item.miles);
                   yearArray.push(item.year);
                   idArray.push(item.id);
                }                
              }
            }); 
            for (var i = 0; i < colorArray.length; i++) {
                  parent.append('<li data-icon="list-arrow" id="l"> <a data-transition="slidedown" data-ajax="false" href="exhibit.php?id=' + idArray[i] + '"><img src="images/car_icon/' + mod + '.png" class="ui-li-thumb"/>' + yearArray[i] + ' ' + m + ' ' + mod +'<br/><label class="x">Color: </label><label class="y">' + colorArray[i]+ '</label><br/><label class="x">Price: </label><label class="y"> $' + addCommas(priceArray[i]) + '</label><br/><label class="x">Mileage: </label><label class="y">' + addCommas( mileageArray[i]) + '</label></a></li>'); 
                  parent.listview('refresh'); 
                }; 
        });
      });
</script>
  <div data-role="content" class="makelist">
    <ul data-role="listview" data-theme="a" class="upper_case">
       <li data-role="list-divider" id="list_header" class="list_header">Select Car</li> 
  </ul>
</div><!-- /content -->
<? include("footer.php"); ?>


