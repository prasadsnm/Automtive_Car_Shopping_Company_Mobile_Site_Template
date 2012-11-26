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

	if(trim($_POST['message']) === '') {
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

        $xmladf.='<comments>'.$message.'</comments>'."\r\n";

    $xmladf.='</customer>'. "\r\n";


  $xmladf.='</prospect>'. "\r\n";
$xmladf.='</adf>'. "\r\n";

$subject = "Financing Request"; 
  
 
$headers .= "xml version: 1.0" . "\r\n";
$headers .= "Content-Type: application/xhtml+xml; charset=ISO-8859-1" . "\r\n";
$headers .= 'Content-Transfer-Encoding: 7bit' . "\r\n\r\n";

$emailto = "ikaidul@yahoo.com";

$mail_sent = @mail($emailto, $subject, $xmladf, $headers);
$emailSent = true;
}
} ?>
<?  include("formScript.php");  ?>
<div data-role="content" id="formpage3" data-theme="b">
    <?php if(isset($emailSent) && $emailSent == true) { ?>
		<div class="thanks"  style="margin:50px 0px 0px 0px;font-size: 16px;">
			<p>Thanks, your email was sent successfully.</p>
		</div>
	<?php } else { ?>
		<?php if(isset($hasError)) { ?>
		<p class="error">Sorry, an error occured.</p>
	<?php } ?>	
	<span>Need help financing your car? Fill out and submit this form below to get in touch with one of our representatives!</span>
	<form name="trade" action="" method="post" id="trade_form">
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
			<label for="message">Message:</label>
			<textarea name = "message" id = "message"><?php if(isset($_POST['message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['message']); } else { echo $_POST['message']; } } ?></textarea>
		</div>
		<fieldset class="ui-grid-a">
			<input data-theme="b" type = "submit" name = "submit" value = "Send Request" id="lsubmit"/>
		</fieldset>
		<input type="hidden" name="submitted" id="submitted" value="true" />
	</form>
	<?php } ?>
</div>

 <?php include("footer.php"); ?>