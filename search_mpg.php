<?php  
    include("header.php");
    include("function.php");
?>
	<div data-role="content" data-theme="b" id="index_b">   
		<ul data-role="listview" data-theme="b" class="upper_case">
      <li data-role="list-divider" id="list_header">Select MPG</li> 
         <?php
            $counterArray = array(4141, 1224, 1424, 4121, 4);
         ?>
          <li  data-icon="index-arrow" class="search">
                    <a href="brandlist.php" style="font-size: 16px;margin-left: 10px;">
                      91 - 100 MPG
                      <span class="ui-li-count" id="counter"><?=$counterArray[0]?></span>
                    </a>
           </li>         
         <?   
             $mpg = 50;
             $i = 0;
            while ($mpg > 10) { 
              ?>
                  <li  data-icon="index-arrow" class="search">
                    <a href="brandlist.php" style="font-size: 16px;margin-left: 10px;">
                      <? echo ($mpg - 9)." - ".($mpg)." MPG"; $mpg -= 10; $i++; 
                      ?>
                      <span class="ui-li-count" id="counter"><?=$counterArray[$i]?></span>
                    </a>
                  </li>                 
              <? } ?> 
		</ul>	
</div><!-- /content -->
<?php  include("footer.php"); ?>	