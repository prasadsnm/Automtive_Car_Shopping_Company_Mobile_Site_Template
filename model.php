<? include("header.php"); 
   $type = isset($_GET['type'])?$_GET['type']:"";
   $jstype = json_encode($type);
   $make = isset($_GET['make'])?$_GET['make']:"";
   $jsmake = json_encode($make);
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

   $y = isset($_GET['y'])?$_GET['y']:"";
   $jsy = json_encode($y);  
?>
<script type="text/javascript">
      $(document).ready(function(){
        <? echo "var type = $jstype; var m = $jsmake; var b = $jsbody; var yr = $jsy; var pl = $jspl; var pu= $jspu; var ml = $jsml; var mu= $jsmu;  "; ?>
        var modelArray = new Array();
        function countElement(item, array){
          var count = 0;
          $.each(array, function(i, v){
            if(v == item) count++;
          });
          return count;
        }
        var parent = $('#carmodel .upper_case');
        $.getJSON(url, function(data){
          if(type === "new_car"){

            if(b != ""){
              $.each(data, function(index, item){
                if(item.body == b && item.year >= y && item.make === m) 
                  modelArray.push(item.model);  
              });
            }  else if( yr != "" ) {
              $.each(data, function(index, item){
                if( item.year == yr && item.make === m) 
                  modelArray.push(item.model);  
              });              
            } else if( ml != "" ) {
              $.each(data, function(index, item){
                if(item.miles >= ml && item.miles <= mu && item.year >= y && item.make === m) 
                  modelArray.push(item.model);  
              });              
            } else if( pl != "" ) {
              $.each(data, function(index, item){
                if(item.price.net >= pl && item.price.net <= pu && item.year >= y && item.make === m) 
                  modelArray.push(item.model);  
              });              
            } else {
              $.each(data, function(index, item){
                if(item.year >= y && item.make === m) modelArray.push(item.model);  
              });              
            }

          }


          if(type === "old_car"){

            if(b != ""){
              $.each(data, function(index, item){
                if(item.body == b && item.year < y && item.make === m) 
                  modelArray.push(item.model);  
              });
            }  else if( yr != "" ) {
              $.each(data, function(index, item){
                if( item.year == yr && item.make === m) 
                  modelArray.push(item.model);  
              });              
            }  else if( ml != "" ) {
              $.each(data, function(index, item){
                if(item.miles >= ml && item.miles <= mu && item.year < y && item.make === m) 
                  modelArray.push(item.model);  
              });              
            } else if( pl != "" ) {
              $.each(data, function(index, item){
                if(item.price.net >= pl && item.price.net <= pu && item.year < y && item.make === m) 
                  modelArray.push(item.model);  
              });              
            } else {
              $.each(data, function(index, item){
                if(item.year < y && item.make === m) modelArray.push(item.model);  
              });              
            } 

          }

            var arr = new Array(); 
            var countArray = new Array();
            for (var i = 0; i < modelArray.length; i++) {
                if($.inArray(modelArray[i], arr) == -1) {
                  c = countElement(modelArray[i], modelArray);
                  arr.push(modelArray[i]);
                  countArray.push(c);
                }
             };
            if(yr != ""){
              for (var i = 0; i < arr.length; i++) {
                  parent.append('<li data-icon="list-arrow" class="model"> <a href="carlist.php?make='+ m +'&type=' + type + '&model=' + arr[i] + '&year=' + yr +'"><img src="images/car_logo/' + arr[i] + '.png" class="ui-li-thumb"/><br/>' + arr[i] + '<span class="ui-li-count" id="counter1">' + countArray[i] + '</span></a></li>');
                }; 
                parent.listview('refresh');  
            } else {
                for (var i = 0; i < arr.length; i++) {
                  parent.append('<li data-icon="list-arrow" class="model"> <a href="yearwise.php?make='+ m +'&type=' + type + '&model=' + arr[i] + '&body=' + b + '&pricelow=' + pl + '&priceup=' + pu + '&milelow=' + ml + '&mileup=' + mu + '"><img src="images/car_logo/' + arr[i] + '.png" class="ui-li-thumb"/><br/>' + arr[i] + '<span class="ui-li-count" id="counter1">' + countArray[i] + '</span></a></li>');   
                }; 
                parent.listview('refresh'); 
            }
        });
      });
</script>
  <div data-role="content" id="carmodel">
    <ul data-role="listview" data-theme="a" class="upper_case">
       <li data-role="list-divider" id="list_header">Select Model</li> 
    </ul>
  </div><!-- /content -->
<? include("footer.php"); ?>


