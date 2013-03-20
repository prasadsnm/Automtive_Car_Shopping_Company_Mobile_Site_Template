<? include("header.php"); 
   $make = isset($_GET['make'])?$_GET['make']:"";
   $jsmake = json_encode($make);
   $model = isset($_GET['model'])?$_GET['model']:"";
   $jsmodel = json_encode($model);
   $year = isset($_GET['year'])?$_GET['year']:"";
   $jsyear = json_encode($year);
   $body = isset($_GET['body'])?$_GET['body']:"";
   $jsbody = json_encode($body);

   $pl = isset($_GET['pricelow'])?$_GET['pricelow']:"";
   $jspl = json_encode($pl);
   $pu = isset($_GET['priceup'])?$_GET['priceup']:"";
   $jspu = json_encode($pu);

   $ml = isset($_GET['milelow'])?$_GET['milelow']:"";
   $jsml = json_encode($ml);
   $mu = isset($_GET['mileup'])?$_GET['mileup']:"";
   $jsmu = json_encode($mu);     
?>
<script type="text/javascript">
      $(document).ready(function(){
        <? echo "var m = $jsmake; var mod = $jsmodel; var yea = $jsyear;  var b = $jsbody; var pl = $jspl; var pu= $jspu; var ml = $jsml; var mu= $jsmu;"; ?>
        var colorArray = new Array();
        var priceArray = new Array();
        var mileageArray = new Array();
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
        var parent = $('#phoneix .upper_case');
        $('.loading').show();
        $.getJSON(url, function(data){
          $('.loading').hide();
          if( b != "" ) {
            $.each(data, function(index, item){
                if(item.body == b && item.year == yea && item.model == mod && item.make == m) {
                   colorArray.push(item.color.ext);
                   priceArray.push(item.price.net);
                   mileageArray.push(item.miles);
                   idArray.push(item.id);
                }

            });
          } else if( ml != "" ) {
            $.each(data, function(index, item){
                if(item.miles >= ml && item.miles <= mu && item.year == yea && item.model == mod && item.make == m) {
                   colorArray.push(item.color.ext);
                   priceArray.push(item.price.net);
                   mileageArray.push(item.miles);
                   idArray.push(item.id);
                }

            });            
          }  else if( pl != "" ) {
            $.each(data, function(index, item){
                if(item.price.net >= pl && item.price.net <= pu && item.year == yea && item.model == mod && item.make == m) {
                   colorArray.push(item.color.ext);
                   priceArray.push(item.price.net);
                   mileageArray.push(item.miles);
                   idArray.push(item.id);
                }

            });            
          } else {
            $.each(data, function(index, item){
                if(item.year == yea && item.model == mod && item.make == m) {
                   colorArray.push(item.color.ext);
                   priceArray.push(item.price.net);
                   mileageArray.push(item.miles);
                   idArray.push(item.id);
                }

            });    
          }
            for (var i = 0; i < colorArray.length; i++) {
                  parent.append('<li data-icon="list-arrow" id="l"> <a data-transition="slidedown" data-ajax="false" href="exhibit.php?id=' + idArray[i] + '"><img src="images/car_icon/' + mod + '.png" class="ui-li-thumb"/>' + yea + ' ' + m + ' ' + mod +'<br/><label class="x">Color: </label><label class="y">' + colorArray[i]+ '</label><br/><label class="x">Price: </label><label class="y"> $' + addCommas(priceArray[i]) + '</label><br/><label class="x">Mileage: </label><label class="y">' + addCommas( mileageArray[i]) + '</label></a></li>'); 
                  parent.listview('refresh'); 
                };     
        });

      });
</script>
  <div data-role="content" class="makelist" id="phoneix">
    <ul data-role="listview" data-theme="a" class="upper_case">
       <li data-role="list-divider" id="list_header" class="list_header">Select Car</li> 
       <div class="loading"></div>
  </ul>
</div><!-- /content -->
<? include("footer.php"); ?>