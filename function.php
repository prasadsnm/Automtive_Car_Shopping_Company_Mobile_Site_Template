<?php 
           function liMaker($name, $tagline, $url, $imageName) { ?>
               <li  data-icon="custom">
               	  <a href="<?php echo $url.".php"; ?>" >
			          <img src="images/<? echo $imageName;?>.png" class="ui-li-thumb"/>
			          <?php echo $name; if($tagline != "") { ?>
			          <span><?php echo $tagline;?></span>
			          <? } ?>
			      </a>
			   </li>           	
<? } function liMaker2($name, $url, $imageName) { ?>
               <li  data-icon="custom">
               	  <a href="<?php echo $url.".php"; ?>" >
			          <img src="images/car_logo/<? echo $imageName;?>.png" class="ui-li-thumb"/>
			      </a>
			   </li>  
<? } ?>			   
