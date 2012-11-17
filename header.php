<!DOCTYPE html> 
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Multi-page template</title> 
	<link rel="stylesheet" href="css/car_deal.min.css" />
    <link rel="stylesheet" href="css/jquery.mobile.structure-1.2.0.min.css" /> 
    <link rel="stylesheet" href="css/style.css" /> 
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/jquery.mobile-1.2.0.min.js"></script>
</head> 

<body> 

<div data-role="page">

	<div data-role="header" data-theme="b" id="header">
		<h1><a href="index.php">Car<span>Pursuit</span></a></h1>
	    <div data-role="navbar" class="nav_glyphish_example" data-grid="b" data-theme="b">
           <ul>
               <li><a href="index.php" data-ajax="false" rel="external" class="search" data-icon="custom">Search</a></li>
               <li><a href="call.php" class="call" data-icon="custom">Call</a></li>
               <li><a href="inquire.php" class="inquire" data-icon="custom">Inquire</a></li>
           </ul>
        </div>
	</div><!-- /header -->
