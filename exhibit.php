<? include("header.php"); 
   $id = isset($_GET['id'])?$_GET['id']:"";
   $jsid = json_encode($id);   
?>       
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
  <a href="" class="button2" data-role="button" data-icon="photos" data-theme="a" style="color:#000; display:none;" 

id="lessphotos">
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

    <div id='fb-root'></div>
    <script src='http://connect.facebook.net/en_US/all.js'></script>
    <div>
  <a onclick='postToFeed(); return false;' class="button2" data-role="button" data-icon="fb" data-theme="a" 

style="color:#3B5998;">
    Ask Facebook Friends!
  </a>
  <p id='msg'></p>
  <a href="" id="button2"  data-count="none" data-role="button" data-icon="twitt" data-theme="a" style="color:#000;">
    Ask Twitter Followers!
  </a>
  <script>
  !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
  </script> 
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
               $itemArray = array("Make", "Model", "Year", "Vin Number", "Stock Number", "Body Style", "Ext. Color", 

"Int. Color", "Trim", "Drive Train", "Trans. Type", "Eng. Displacement");
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
<script type="text/javascript">
      var imageUrl, title, url;
  $(document).ready(function(){
        <? echo "var ID = $jsid;" ?>
        url = "http://mypushportal.com/demo/exhibit.php?id=" + ID;
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


        $.getJSON(vehicleUrl, function(item){
                  $('#car_heading').html(item.year + ' ' + item.make + ' ' + item.model); 
                  $('#desc').html(item.desc); 
                  title = 'Should I buy this car? - ' + item.year + ' ' + item.make + ' ' + item.model + ' ('+ item.color.ext +') - available now at MultiChoiceApps Car Pursuit, GA';

                  var twittUrl = "https://twitter.com/share?text=" + title + "&hashtag=carpursuit";
                  $('#button2').attr('href', twittUrl);

                  $('#exhibition img').attr('src', item.pic[0].full);
                  imageUrl = item.pic[0].full;
                  $('#price_bar #r').html('$' + addCommas(item.price.net));
                  var Details = new Array(item.make, item.model, item.year, item.vin, item.stock, item.body, item.color.ext, item.color.int, item.trim, item.power.drive, item.power.trans, item.power.eng);
                  var tr = $("#cardetails tr");
                  tr.each(function(){
                    $(this).children('td:nth-child(2)').html(Details[$(this).index()]);
                  });
 
        });
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
      //facebook API
      FB.init({appId: '134384696717251', status: true, cookie: true});
      function postToFeed() {
        var obj = {
          method: 'feed',
          link: url,
          picture: imageUrl,
          name: title,
          caption: 'MultiChoiceApps Car Inventory Apps',
          description: 'Car pursuit, GA is a mobile apps developed by a leading marketing company,MultichoiceApps from Atlanta.The developer is Kaidul from Bangladesh.'
        };

         function callback(response) {
           document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
         }

        FB.ui(obj);
      }
    </script> 
<? include("footer.php"); ?>
