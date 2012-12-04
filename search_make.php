<? include("header.php"); 
   $type = isset($_GET['type'])?$_GET['type']:"";
   $jstype = json_encode($type);
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
        <? echo "var type = $jstype; var b = $jsbody; var yr = $jsy; var pl = $jspl; var pu= $jspu; var ml = $jsml; var mu= $jsmu; "; ?>
		  	var makeArray = new Array();
        function countElement(item, array){
          var count = 0;
          $.each(array, function(i, v){
            if(v === item) count++;
          });
          return count;
        }
		  	var parent = $('#brand .upper_case');
        $('.loading').show();
		  	$.getJSON(url, function(data){

          $('.loading').hide();
          if(type === "new_car") {
           
            if(b != ""){
              $.each(data, function(index, item){
                if(item.body == b && item.year >= y) makeArray.push(item.make);  
              });
            } else if(ml != "") {
              $.each(data, function(index, item){
                if(item.miles >= ml && item.miles <= mu && item.year >= y) 
                  makeArray.push(item.make);  
              });              
            } else if(pl != "") {
              $.each(data, function(index, item){
                if(item.price.net >= pl && item.price.net <= pu && item.year >= y) 
                  makeArray.push(item.make);  
              });              
            } else if(yr != ""){                 
              $.each(data, function(index, item){
                if(item.year == yr) makeArray.push(item.make); 
              });  
            }
            else{
              $.each(data, function(index, item){
                if(item.year >= y) makeArray.push(item.make);  
              });
            }

          }


          else if(type === "old_car") {

            if(b != ""){
              $.each(data, function(index, item){
                if(item.body == b && item.year < y) makeArray.push(item.make);  
              });
            }  else if(ml != "") {
              $.each(data, function(index, item){
                if(item.miles >= ml && item.miles <= mu && item.year < y) 
                  makeArray.push(item.make);  
              });              
            }  else if(pl != "") {
              $.each(data, function(index, item){
                if(item.price.net >= pl && item.price.net <= pu && item.year < y) 
                  makeArray.push(item.make);  
              });              
            }else if(yr != ""){                 
              $.each(data, function(index, item){
                if(item.year == yr) makeArray.push(item.make); 
              });  
            }
            else {
              $.each(data, function(index, item){
                if(item.year < y) makeArray.push(item.make);  
              });              
            }

          }
            var arr = new Array(); 
            var countArray = new Array();
            var len = makeArray.length;
            for (var i = 0; i < len; i++) {
                if($.inArray(makeArray[i], arr) == -1) {
                  var c = countElement(makeArray[i], makeArray);
                  arr.push(makeArray[i]);
                  countArray.push(c);
                }
             };

            for (var i = 0; i < arr.length; i++) {
                  parent.append('<li data-icon="list-arrow"> <a data-transition="slidedown" href="model.php?make='+ arr[i] +'&type=' + type + '&body=' + b + '&y=' + yr + '&pricelow=' + pl + '&priceup=' + pu  + '&milelow=' + ml + '&mileup=' + mu +'"><img src="images/car_logo/' + (arr[i]).toLowerCase() + '.png" class="ui-li-thumb"/><br/>' + arr[i] + '<span class="ui-li-count" id="counter1">' + countArray[i] + '</span></a></li>');  
                };  
                parent.listview('refresh'); 
		  	});
		  });
</script>
	<div data-role="content" class="makelist" id="brand">
		<ul data-role="listview" data-theme="a" class="upper_case">
      <div class="loading"></div>
		</ul>
	</div><!-- /content -->
<? include("footer.php"); ?>