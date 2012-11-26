<?php 
      include("header.php");
      $type = isset($_GET['type'])?$_GET['type']:"";

if(isset($_POST['submitted'])) {
   
    $emailSent = false; 
	if(!isset($hasError)) {

		$emailSent = true;
	}

} ?>
<?  include("formScript.php");  ?>
<script type="text/javascript">
$(document).ready(function(){
	var makeArr = new Array();
	var parent = $('#make');
	$.getJSON(url, function(data){
    var x = y + 1;
    var it = 0;
    while( it <= 20 ){
    	$('#year').append('<option value="' + x + '">' + x + '</option>');
    	$('#year').selectmenu('refresh', true);
    	it++;
        x--;
    }
	});    
});
</script>
<div data-role="content" id="formpage2" data-theme="b">
    <?php if(isset($emailSent) && $emailSent == true) { ?>
		<div class="thanks"  style="margin:50px 0px 0px 0px;font-size: 16px;">
			<p></p>
		</div>
	<?php } else { ?>
		<?php if(isset($hasError)) { ?>
		<p class="error">Sorry, an error occured.</p>
	<?php } ?>
<style type="text/css">
.ui-li .ui-btn-inner  a.ui-link-inherit, .ui-li-static.ui-li {
    padding-top:12px;
    padding-bottom:12px;
}
</style>	
	<span>Our advanced search system allows you to locate any car in our inventory.<br/>
Use the options below to locate a car that matches your needs!</span>
	<form name="trade" action="" method="post" id="advance_form">

		<div data-role="fieldcontain">
			<label for="nu">New Or Used</label>
            <select name = "nu"  data-icon="select-arrow" data-native-menu="false"  data-placeholder="true"  id = "nu">
            	<option value="new_used">Select One</option>
                <option value="new_used">New &amp; Used</option>
                <option value="new">New</option>
                <option value="used">Used</option>						
            </select>		
			<label class="jqError" id="cprice"></label>	
		</div>		

		<div data-role="fieldcontain">
			<label for="make">Car Make</label>
            <select name = "make"  data-icon="select-arrow" data-native-menu="false"  data-placeholder="true"  id = "make">
                <option value="">Select Make</option>
                <?php  
                   $arr = array("acura", "Audi", "BMW", "buick", "Cadillac", "Chevrolet", "Chrysler", "Dodge", "FIAT", "ford", "GMC", "honda", "HUMMER", "hyundai", "Infiniti", "Jaguar", "Jeep", "kia", "land rover", "lexus", "lincoln", "mazda", "Mercedes Benz", "mercury", "MINI", "mitshubisi", "nissan", "olsmobile", "pontiac", "porsche", "ram", "saturn", "scion", "smart", "subaru", "suzuki", "toyota", "volkswogen", "volvo"); 
                   for ($i=0; $i < sizeof($arr); $i++) { 
                   	?> <option value="<?=$arr[$i]?>"><?=$arr[$i]?></option>  <?
                   }
                 ?>								
            </select>		
			<label class="jqError" id="cm"></label>	
		</div>

		<div data-role="fieldcontain">
			<label for="make">Car Model</label>
            <select name = "make"  data-icon="select-arrow" data-native-menu="false"  data-placeholder="true"  id = "model">
                <option value="">Select Model</option>
                <?php  
                   $arr_model = array(); 
                   for ($i=0; $i < sizeof($arr_model); $i++) { 
                   	?> <option value="<?=$arr_model[$i]?>"><?=$arr_model[$i]?></option>  <?
                   }
                 ?>								
            </select>		
			<label class="jqError" id="cymod"></label>	
		</div>	

		<div data-role="fieldcontain">
			<label for="make">Year</label>
            <select name = "year"  data-icon="select-arrow" data-native-menu="false"  data-placeholder="true"  id = "year">
                <option value="">Select Year</option>		
            </select>		
			<label class="jqError" id="cmod"></label>	
		</div>	
		<div data-role="fieldcontain" id="cer">
			<label for="certificate">Certified Pre-Owned</label>
            <select name = "certificate"  data-icon="select-arrow" data-native-menu="false"  data-placeholder="true"  id = "certificate">
                <option value="">certified Only</option>
                <option value="">All</option>		
            </select>		
			<label class="jqError" id="cmod"></label>	
		</div>			

		<div data-role="fieldcontain">
			<label for="body">Car Body Style</label>
            <select name = "body"  data-icon="select-arrow" data-native-menu="false"  data-placeholder="true"  id = "body">
                <option value="">Select Body Style</option>
                <?php  
                   $arr_body = array("Convertible", "Coupe", "HatchBack", "Sedan", "SUV", "Truck", "Wagon", "Van"); 
                   for ($i=0; $i < sizeof($arr_body); $i++) { 
                   	?> <option value="<?=$arr_body[$i]?>"><?=$arr_body[$i]?></option>  <?
                   }
                 ?>								
            </select>		
			<label class="jqError" id="cyear"></label>	
		</div>

		<div data-role="fieldcontain">
			<label for="price">Price Range</label>
            <select name = "price"  data-icon="select-arrow" data-native-menu="false"  data-placeholder="true"  id = "price">
                <option value="">Select Price Range</option>
                <?php  
                   $arr_body = array("Convertible", "Coupe", "HatchBack", "Sedan", "SUV", "Truck", "Wagon", "Van"); 
                   for ($i=0; $i < sizeof($arr_body); $i++) { 
                   	?> <option value="<?=$arr_body[$i]?>"><?=$arr_body[$i]?></option>  <?
                   }
                 ?>								
            </select>		
			<label class="jqError" id="cprice"></label>	
		</div>			

        <div data-role="fieldcontain" id="miles">
			<label for="price">Mileage Range</label>
            <select name = "price"  data-icon="select-arrow" data-native-menu="false"  data-placeholder="true"  id = "price">
                <option value="">Mileage Range</option>
                <?php  
                   $arr_body = array(); 
                   for ($i=0; $i < sizeof($arr_body); $i++) { 
                   	?> <option value="<?=$arr_body[$i]?>"><?=$arr_body[$i]?></option>  <?
                   }
                 ?>								
            </select>		
			<label class="jqError" id="cprice"></label>	
		</div>	

		<fieldset class="ui-grid-a">
			<input data-theme="b" type = "submit" name = "submit" value = "Send Request" id="tsubmit"/>
		</fieldset>
		<input type="hidden" name="submitted" id="submitted" value="true" />
	</form>
	<?php } ?>
</div>


 <?php include("footer.php"); ?>