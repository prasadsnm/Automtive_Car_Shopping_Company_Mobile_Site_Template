<?php 
      include("header.php");
      include("function.php");

if(isset($_POST['submitted'])) {

	if(trim($_POST['fname']) === '') {
		$fnameError = 'Please enter your first name.';
		$hasError = true;
	} else {
		$fname = trim($_POST['fname']);
	}
	if(trim($_POST['lname']) === '') {
		$lnameError = 'Please enter your last name.';
		$hasError = true;
	} else {
		$lname = trim($_POST['lname']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	} 

    if(trim($_POST['phone']) === '') {
		$phoneError = 'Please enter your phone number.';
		$hasError = true;
	} else {
		$phone = trim($_POST['phone']);
	}

    if(trim($_POST['details_car']) === '') {
		$details_carError = 'Please enter your phone number.';
		$hasError = true;
	} else {
		$details_car = trim($_POST['details_car']);
	}	
 
	if(trim($_POST['type_of_service']) === '') {
		$serviceError = 'Please Select an option';
		$hasError = true;
	} else {
		$type_of_service = trim($_POST['type_of_service']);
	}

	if(trim($_POST['type_of_service2']) === '') {
		$service2Error = 'Please Select an option';
		$hasError = true;
	} else {
		$type_of_service2 = trim($_POST['type_of_service']);
	}

	if(trim($_POST['message']) === '') {
		$message = "";
	} else {
		if(function_exists('stripslashes')) {
			$message = stripslashes(trim($_POST['message']));
		} else {
			$message = trim($_POST['message']);
		}
	}

if(!isset($hasError)) {
$xmladf='<?ADF VERSION "1.0"?>'. "\r\n";
$xmladf.='<?XML VERSION "1.0"?>'. "\r\n";
$xmladf.='<adf>'. "\r\n";
  $xmladf.='<prospect>'. "\r\n";

    $xmladf.='<requestdate>'.date(DATE_ATOM).'</requestdate>'. "\r\n";


    $xmladf.='<customer>'. "\r\n";

        $xmladf.='<contact>'. "\r\n";
           $xmladf.='<name part="first">'.$fname.'</name>'. "\r\n";
           $xmladf.='<name part="last">'.$lname.'</name>'. "\r\n";
           $xmladf.='<email>'.$email.'</email>'. "\r\n";
           $xmladf.='<phone>'.$phone.'</phone>'. "\r\n";
        $xmladf.='</contact>'. "\r\n";

        $xmladf.='<comments>Car Make, Model, Year: '.$details_car.'<br/>Type of Service: '.$type_of_service.' - '.$type_of_service2.'<br/>'.$message.'</comments>'."\r\n";

    $xmladf.='</customer>'. "\r\n";
  $xmladf.='</prospect>'. "\r\n";
$xmladf.='</adf>'. "\r\n";

  $subject = "Service Request"; 
  
 
$headers  = "xml version: 1.0" . "\r\n";
$headers .= "Content-Type: application/xhtml+xml; charset=ISO-8859-1" . "\r\n";
$headers .= 'Content-Transfer-Encoding: 7bit' . "\r\n\r\n";

$emailto = "ikaidul@yahoo.com";

$mail_sent = @mail($emailto, $subject, $xmladf, $headers);		
		$emailSent = true;
}

} ?>
<?  include("formScript.php");  ?>
<div data-role="content" id="formpage" data-theme="b">
    <?php if(isset($emailSent) && $emailSent == true) { ?>
		<div class="thanks"  style="margin:50px 0px 0px 0px;font-size: 16px;">
			<p>Thanks, your email was sent successfully.</p>
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
	<span>Need to schedule maintenance or repair? Fill out and submit this form below to get in touch with one of our service technicians!</span>
	<form name="service" action="" method="post" id="service_form">
		<div data-role="fieldcontain">
			<label>First Name:</label>
			<input type="text" name="fname" id="fname"/>
			<?php if(isset($fnameError) && $fnameError != '') { ?>
			  <label class="error"><?=$fnameError;?></label>
			<?php } ?>
			<label class="jqError" id="fn"></label>
		</div>
		<div data-role="fieldcontain">
			<label>Last Name:</label>
			<input type="text" name="lname" id="lname"/>
			<?php if(isset($lnameError) &&  $lnameError != '') { ?>
			  <label class="error"><?=$lnameError;?></label>
			<?php } ?>	
			<label class="jqError" id="ln"></label>		
		</div>
		<div data-role="fieldcontain">
			<label>Email:</label>
			<input type="email" name="email" id="email"/>
			<?php if(isset($emailError) && $emailError != '') { ?>
			  <label class="error"><?=$emailError;?></label>
			<?php } ?>	
			<label class="jqError" id="mail"></label>			
		</div>
		<div data-role="fieldcontain">
			<label>Cell phone:</label>
			<input type="text" name="phone" id="phone"/>
			<?php if(isset($phoneError) && $phoneError != '') { ?>
			  <label class="error"><?=$phoneError;?></label>
			<?php } ?>
			<label class="jqError" id="ph"></label>				
		</div>
		<div data-role="fieldcontain">
			<label>Car Make, Model &amp; Year:</label>
			<input type="text" name="details_car" id="details_car"/>
			<?php if(isset($details_carError) && $details_carError != '') { ?>
			  <label class="error"><?=$details_carError;?></label>
			<?php } ?>			
			<label class="jqError" id="cm"></label>	
		</div>
		<div data-role="fieldcontain">
			<label for="type_of_service">Service Type</label>
			<select name = "type_of_service" data-icon="select-arrow" data-native-menu="false" id = "type_of_service">
                <option value="">Service Type</option>							
				<option value="Maintenance"<?php if(isset($_POST['type_of_service']) && $_POST['type_of_service']=="Maintenance")  echo " selected";?>>Maintenance</option>
                <option value="Repair"<?php if(isset($_POST['type_of_service']) && $_POST['type_of_service']=="Repair")  echo " selected";?>>Repair</option>
            </select>
			<?php if(isset($serviceError) && $serviceError != '') { ?>
			  <label class="error"><?=$serviceError;?></label>
			<?php } ?>	
			<label class="jqError" id="s1"></label>	            
		</div>
		<div data-role="fieldcontain">
			<label for="type_of_service2">Service Type</label>
			<select name = "type_of_service2"  data-icon="select-arrow" data-native-menu="false"  data-placeholder="true"  id = "type_of_service2">
                <option value="">Service Type</option>							
				<option value="Will Drop Off &amp; Pick Up"<?php if(isset($_POST['type_of_service2']) && $_POST['type_of_service2']=="Will Drop Off &amp; Pick Up")  echo " selected";?>>Will Drop Off &amp; Pick Up</option>
                <option value="Need Shuttle"<?php if(isset($_POST['type_of_service2']) && $_POST['type_of_service2']=="Need Shuttle")  echo " selected";?>>Need Shuttle</option>
                <option value="Need Loaner"<?php if(isset($_POST['type_of_service2']) && $_POST['type_of_service2']=="Need Loaner")  echo " selected";?>>Need Loaner</option>
            </select>
			<?php if(isset($service2Error) && $service2Error != '') { ?>
			  <label class="error"><?=$service2Error;?></label>
			<?php } ?>
			<label class="jqError" id="s2"></label>		             
		</div>		
		<div data-role="fieldcontain">
			<label>Desired Appointment Date/Time:</label>
			<input type="text" name="details_date" id="details_date"/>	
		</div>
		<div data-role="fieldcontain">
			<label for="message">Message:</label>
			<textarea  data-theme="b" name = "message" id = "message"><?php if(isset($_POST['message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['message']); } else { echo $_POST['message']; } } ?></textarea>
		</div>
		<fieldset class="ui-grid-a">
			<input data-theme="b" type = "submit" name = "submit" value = "Send Request" id="ssubmit"/>
		</fieldset>
		<input type="hidden" name="submitted" id="submitted" value="true" />
	</form>
	<?php } ?>
</div>

 <?php include("footer.php"); ?>