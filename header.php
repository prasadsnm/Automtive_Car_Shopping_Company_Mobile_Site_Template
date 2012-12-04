<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--<meta http-equiv="pragma" content="no-cache" />-->
    <meta name="viewport" content="width=device-width initial-scale=1 maximum-scale=1 minimum-scale=1 user-scalable=0"/>
    <meta name="HandheldFriendly" content="true" />
    <meta name="apple-mobile-web-app-capable" content="yes"> 
	<title>Automotive Car Dealer</title> 
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/car_deal.min.css" /> <!--Custom theme from themeroller-->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile.structure-1.2.0.min.css" /> 
    <link rel="stylesheet" href="css/style.css" /> <!--Custom Stylsheet-->
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script>  
	$(document).bind('mobileinit',function(){
        $.mobile.selectmenu.prototype.options.nativeMenu = false;
    });
    </script> <!--Custom select Menu-->
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	<script type="text/javascript">
       // configuration of inventory
       var url = "http://multichoice.dealercp.com/inventory/?dealer=90961&format=json&jsoncallback=?";
        /* Initialization */
        var y = new Date().getFullYear();
        /* Count Array Element  */
	</script>
</head> 
<body> 
<div data-role="page" data-add-back-btn="true">
	<div data-role="header" data-theme="b" data-position="inline" id="header">
		<a data-rel="back" data-iconpos="notext" data-icon="back" ></a>
		<h1>
			<a href="index.php" data-transition="slidedown">
			    Car<span>Pursuit</span>
			    <label>Atlanta, GA</label>
		    </a>
	    </h1>
		<a href="call.php" data-transition="slideup" data-icon="top-call" class="ui-btn-right" data-iconpos="notext" id="top_call">Call</a>
	</div><!-- /header -->
