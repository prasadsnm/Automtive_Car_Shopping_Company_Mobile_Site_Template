<? include("header.php"); 
   $id = isset($_GET['id'])?$_GET['id']:"";
   $jsid = json_encode($id);   
?>
<script type="text/javascript">
      $(document).ready(function(){
        <? echo "var ID = $jsid;" ?>
        var vehicleUrl = "http://multichoice.dealercp.com/vehicle/?id=" + ID + "&format=json&jsoncallback=?";
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
        var imageUrl, title;


        $.getJSON(vehicleUrl, function(item){
                	$('#car_heading').html(item.year + ' ' + item.make + ' ' + item.model); 
                  $('#desc').html(item.desc); 
                  title = 'Should I buy this car ' + item.year + ' ' + item.make + ' ' + item.model;
                	$('#exhibition img').attr('src', item.pic[0].full);
                  imageUrl = item.pic[0].full;
                	$('#price_bar #r').html('$' + addCommas(item.price.net));
                	var Details = new Array(item.make, item.model, item.year, item.vin, item.stock, item.body, item.color.ext, item.color.int, item.trim, item.power.drive, item.power.trans, item.power.eng);
                	var tr = $("#cardetails tr");
                	tr.each(function(){
                		$(this).children('td:nth-child(2)').html(Details[$(this).index()]);
                	});
 
        });
 /*
(function($) {
    $.fn.clickToggle = function(func1, func2) {
        var funcs = [func1, func2];
        this.data('toggleclicked', 0);
        this.click(function() {
            var data = $(this).data();
            var tc = data.toggleclicked;
            $.proxy(funcs[tc], this)();
            data.toggleclicked = (tc + 1) % 2;
        });
        return this;
    };
}(jQuery));
*/
        $('#photos').click(function(){
          $.getJSON(vehicleUrl, function(item){
            $('#exhibition').html("");
            $.each(item.pic, function(i, val){
              $('#exhibition').append('<img src="' + val.full + '"/>'); 
            });    
          });
          $('#photos').hide();
          $('#lessphotos').show();
          return false;
        });

        $('#lessphotos').click(function(){
           $('#exhibition').html("");
           $('#exhibition').append('<img src="' + imageUrl + '"/>');
          $('#lessphotos').hide();
          $('#photos').show();           
           return false;          
        });

        
        $('#fav_1').click(function(){

          $('#fav_1').hide();
          $('#fav_2').show();
          return false;
        });

        $('#fav_2').click(function(){

          $('#fav_2').hide();
          $('#fav_1').show();           
           return false;          
        });        


      });
</script>
<div id='fb-root'></div>
    <script src='http://connect.facebook.net/en_US/all.js'></script>
    <script> 
    /*
      FB.init({appId: "YOUR_APP_ID", status: true, cookie: true});

      function postToFeed() {

        // calling the API ...
        var obj = {
          method: 'feed',
          redirect_uri: 'https://multichoiceapps.com/demo/',
          link: 'https://developers.facebook.com/docs/reference/dialogs/',
          picture: imageUrl,
          name: 'Facebook Dialogs',
          caption: 'Reference Documentation',
          description: 'Using Dialogs to interact with users.'
        };

        // function callback(response) {
        //   document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        // }

        FB.ui(obj);
      }
      */
    
    </script>    
<div data-role="content" data-theme="b">
	<div id="car_heading"></div>
	<div>
	<a href="tel:800-718-1720" class="button2" data-role="button" data-icon="phonn" data-theme="a" style="color:#000;">
		Call Now!
	</a>
	<a href="" class="button2" data-role="button" data-icon="fav" data-theme="a" style="color:#000;" id="fav_1">
		Add To Favorites
	</a>
  <a href="" class="button2" data-role="button" data-icon="fav" data-theme="a" style="color:#000;display:none;" id="fav_2">
    Remove From Favorites
  </a>  
	<a href="" class="button2" data-role="button" data-icon="photos" data-theme="a" style="color:#000;" id="photos">
		View All Photos
	</a>		
  <a href="" class="button2" data-role="button" data-icon="photos" data-theme="a" style="color:#000; display:none;" id="lessphotos">
    View Less Photos
  </a>  
	</div>

	<div id="exhibition"><img src=""/> </div>
	<div id="price_bar">
		<span>Price:</span> 
		<span id="r"></span>
	</div>
	<div id="friend">
		Ask your friends if you should buy this car!
	</div>
    <div>
	<a onclick='postToFeed(); return false;' class="button2" data-role="button" data-icon="fb" data-theme="a" style="color:#3B5998;">
		Ask Facebook Friends!
	</a>
	<a href="" class="button2" data-role="button" data-icon="twitt" data-theme="a" style="color:#000;">
		Ask Twitter Followers!
	</a>	
	<a href="loan_form.php" class="button2" data-role="button" data-icon="mail" data-theme="a" style="color:#000;">
		Meassage Us!
	</a>
	<a href="loan_form.php" class="button2" data-role="button" data-icon="loaner" data-theme="a" style="color:#000;">
		Need Financing?
	</a>	
	<a href="trade_form.php" class="button2" data-role="button" data-icon="trader" data-theme="a" style="color:#000;">
		Trade-In for this Car!
	</a>	
    </div>
    	<div id="friend">
		   Car Details
	    </div>
    <div>
        <table id="cardetails">
        	<tbody>
        	   <?php
        	     $itemArray = array("Make", "Model", "Year", "Vin Number", "Stock Number", "Body Style", "Ext. Color", "Int. Color", "Trim", "Drive Train", "Trans. Type", "Eng. Displacement");
        	     for ($i=0; $i < sizeof($itemArray); $i++) { 
        	     	?>
    		        <tr>
        		        <td id="right"><?=$itemArray[$i].": "?></td> 
        		        <td id="left"></td>
        	        </tr>         	     	   
        	     	<?
        	     }
        	   ?>  		
        	</tbody>
        </table>
    </div><br/><br/>
    <div id="desc"></div>
</div>
<? include("footer.php"); ?>