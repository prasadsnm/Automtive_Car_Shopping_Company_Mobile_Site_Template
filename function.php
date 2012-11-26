<?php 
           function liMaker($name, $tagline, $url, $imageName) { ?>
               <li  data-icon="index-arrow" class="index">
               	  <a href="<?php echo $url.".php"; ?>" data-transition="slide">
			          <img src="images/<? echo $imageName;?>.png" class="ui-li-thumb"/>
			          <?=$name; if($tagline != "") { ?>
			          <span><?=$tagline;?></span>
			          <? } ?>
			      </a>
			   </li>           	
<? } 
           function liMaker3($name, $tagline, $imageName) { ?>
               <li  data-icon="index-arrow" class="index">
               	  <a href="<?php echo "tel:".$tagline; ?>" style="font-size: 15px;"  data-transition="flow">
			          <img src="images/<? echo $imageName;?>.png" class="ui-li-thumb"/>
			          <?=$name; if($tagline != "") { ?>
			          <span><?=$tagline;?></span>
			          <? } ?>
			      </a>
			   </li>           	
<? } 
 function liMaker4($name, $url, $imageName) { ?>
               <li  data-icon="index-arrow" class="index">
               	  <a href="<?php echo $url; ?>" style="font-size: 16px;" data-transition="flip">
			          <img src="images/<? echo $imageName;?>.png" class="ui-li-thumb" style="margin-top: 7px;"/>
			          <br/><?=$name;?></span>
			      </a>
			   </li>           	
<? }  function liMaker_($name, $url, $type, $imageName) { ?>
               <li  data-icon="index-arrow" class="index">
               	  <a href="<?php echo $url.".php?type=".$type; ?>" style="font-size: 16px;" data-transition="flip">
			          <img src="images/<? echo $imageName;?>.png" class="ui-li-thumb" style="margin-top: 7px;"/>
			          <br/><?=$name;?></span>
			      </a>
			   </li>           	
<? }

?>			        
