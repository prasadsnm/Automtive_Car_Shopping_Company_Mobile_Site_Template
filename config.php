<?php
/* Header Info - Site Title
   This is title of header panel. Fill two titles and it will be merged
*/
$title_first = "Mobile";
$title_second = "Car";

/* This the address or tagline that will be show under the title */
$tagline = "Atlanta, GA"; 

/* This is the inventory link which will be parsed and shown in the application.Use Json invventory. XML is not supported */
$url = "http://multichoice.dealercp.com/inventory/?dealer=90961";

/* This is the vehicle information inventory. Every car's information is stored in it's different inventory script like http://multichoice.dealercp.com/vehicle/?id=***** 
*/
$details_url = "http://multichoice.dealercp.com/vehicle/?id=";


/* facebook share */

/* When anyone share any car for getting recommendation, This will be the title of the post with particular car name-model-brand-year. You can't keep it empty */
$caption = "MultiChoiceApps Car Inventory Apps";

/* When anyone share any car for getting recommendation, This will be the description of the post with particular car information. You can't keep it empty */
$description = "Car pursuit, GA is a mobile apps developed by a leading marketing company,MultichoiceApps from Atlanta.The developer is Kaidul from Bangladesh.";

/* footer Info 
   This information is shown in the footer panel. If you keep any option empty, then it will be not shown.
   $company_name = ""; //empty
   $company_name = "your Company Name"; //with value
*/
$company_name = "Multichoice Group, Inc.";
$address = "3855 Holcomb Bridge Rd.<br/>Suite 300,<br/>Atlanta, GA 30092";
$email = "multichiceapps@gmail.com";
$phone = "404-530-9657";


/* Social network info 
  These are social icons which will be visible in the footer panel. If you keep any value empty, then it will not be shown on the footer panel.
  e.g.
  $facebook = "";  //empty
  $facebook = "http://www.facebook.com/your_url";  //with value 
*/
$facebook = "http://www.facebook.com";
$google = "http://www.facebook.com";
$twitter = "http://www.facebook.com";
$youtube = "http://www.facebook.com";


/* The theme will be shown what will be selected here.
   Currently Four themes are available.
   1. black_default
   2. red_wine
   3. greenish
   4. deep_blue
   Use any of this name here.
 */
$theme = "black_default";

?>