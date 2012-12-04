<? include("header.php"); 
   $type = isset($_GET['type'])?$_GET['type']:"";
   $jstype = json_encode($type);
   $make = isset($_GET['make'])?$_GET['make']:"";
   $jsmake = json_encode($make);
   $model = isset($_GET['model'])?$_GET['model']:"";
   $jsmodel = json_encode($model);
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
        <? echo "var type = $jstype; var m = $jsmake; var mod = $jsmodel;  var b = $jsbody; var pl = $jspl; var pu= $jspu; var ml = $jsml; var mu= $jsmu;"; ?>
        var yearArray = new Array();
        function countElement(item, array){
          var count = 0;
          $.each(array, function(i, v){
            if(v === item) count++;
          });
          return count;
        }
        var parent = $('#anonym .upper_case');
        $(".loading").show();
        $.getJSON(url, function(data){
          $(".loading").hide();
          if(type === "new_car"){

            if(b != ""){
              $.each(data, function(index, item){
                if(item.body == b && item.year >= y && item.make === m && item.model === mod) 
                  yearArray.push(item.year);  
              });
            } else if(ml != "") {
              $.each(data, function(index, item){
                if(item.miles >= ml && item.miles <= mu && item.year >= y && item.make === m && item.model === mod) 
                  yearArray.push(item.year);  
              });              
            } else if(pl != "") {
              $.each(data, function(index, item){
                if(item.price.net >= pl && item.price.net <= pu && item.year >= y && item.make === m && item.model === mod) 
                  yearArray.push(item.year);  
              });              
            } else {
              $.each(data, function(index, item){
                if(item.year >= y && item.make === m && item.model === mod) 
                  yearArray.push(item.year);   
              });              
            } 
                       
          }

          if(type === "old_car"){

            if(b != ""){
              $.each(data, function(index, item){
                if(item.body == b && item.year < y && item.make === m && item.model === mod) 
                  yearArray.push(item.year);  
              });
            } else if(ml != "") {
              $.each(data, function(index, item){
                if(item.miles >= ml && item.miles <= mu && item.year < y && item.make === m && item.model === mod) 
                  yearArray.push(item.year);  
              });              
            } else if(pl != "") {
              $.each(data, function(index, item){
                if(item.price.net >= pl && item.price.net <= pu && item.year < y && item.make === m && item.model === mod) 
                  yearArray.push(item.year);  
              });              
            } else {
              $.each(data, function(index, item){
                if(item.year < y && item.make === m && item.model === mod) 
                  yearArray.push(item.year);   
              });              
            }             

          }
          
          var c = yearArray.length;
          parent.append('<li data-icon="list-arrow" class="model"><a data-transition="slidedown" href="showallcar.php?make='+ m  + '&type=' + type + '&model=' + mod + '&body=' + b +'"><img src="images/searchall.png" class="ui-li-thumb"/><br/>Show All<span class="ui-li-count" id="counter1">' + c + '</span></a></li>'); 
          parent.listview('refresh'); 
              
             var makeArray = new Array(); 
             var carArray = new Array();
             for (var i = 0; i < yearArray.length; i++) {
                if($.inArray(yearArray[i], makeArray) == -1) {
                  c = countElement(yearArray[i], yearArray);
                  makeArray.push(yearArray[i]);
                  carArray.push(c);
                }
             };
            for (var i = 0; i < makeArray.length; i++) {
                  parent.append('<li data-icon="list-arrow" class="model"><a data-transition="slidedown" href="carlist.php?make='+ m +'&type=' + type + '&model=' + mod + '&year=' + makeArray[i] + '&body=' + b + '&pricelow=' + pl + '&priceup=' + pu +  '&milelow=' + ml + '&mileup=' + mu +  '"><img src="images/car_logo/' + makeArray[i] + '.png" class="ui-li-thumb"/><br/>' + makeArray[i] + '<span class="ui-li-count" id="counter1">' + carArray[i] + '</span></a></li>'); 
                  parent.listview('refresh'); 
                };     
        });
      });
</script>
  <div data-role="content" class="year_body" id="anonym">
    <ul data-role="listview" data-theme="a" class="upper_case">
       <li data-role="list-divider" id="list_header">Select Year</li> 
       <div class="loading"></div>
    </ul>
  </div><!-- /content -->
<? include("footer.php"); ?>


