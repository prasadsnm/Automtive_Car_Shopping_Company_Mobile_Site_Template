<link href="css/mobiscroll-2.1.custom.min.css" rel="stylesheet" type="text/css" />
<script src="js/mobiscroll-2.1.custom.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	 $('#details_date').scroller({
        preset: 'datetime',
        theme: 'android-ics',
        display: 'modal',
        animate: 'flip',
        mode: 'scroller',
        dateFormat : "mm-dd-y",
        dateOrder: 'mmD ddy'
    });

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};

$('#ssubmit').click(function(){
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var service1 = $('#type_of_service').val();
    var service2 = $('#type_of_service2').val();
    var carDetails = $('#details_car').val();
    var flag = 0;
    if(fname == ""){
        flag = 1;
        $('#fn').html("You have to enter first name");
    } else $('#fn').html("");
    if(lname == ""){
        flag = 1;
        $('#ln').html("You have to enter last name");
    } else $('#ln').html("");
    if(email == ""){
        flag = 1;
        $('#mail').html("");
        $('#mail').html("You have to enter email address");
    } else if(email.length > 0 && !isValidEmailAddress(email)){
        flag = 1;
        $('#mail').html("");
        $('#mail').html("Invalid email address");
    } else $('#mail').html("");  
    if(phone == ""){
        flag = 1;
        $('#ph').html("You have to enter phone number");
    } else $('#ph').html("");   
    if(service1 == ""){
        flag = 1;
        $('#s1').html("You have to select a type");
    } else $('#s1').html(""); 
    if(service2 == ""){
        flag = 1;
        $('#s2').html("You have to select a type");
    } else $('#s2').html("");   
    if(carDetails == ""){
        flag = 1;
        $('#cm').html("You have to enter Car details");
    } else $('#cm').html("");             
    if(flag) return false;  
});  

    var now = new Date();

    $('#car_year').scroller({
        preset: 'date',
        theme: 'default',
        display: 'modal',
        animate: 'flip',
        mode: 'scroller',
        dateFormat: 'yy',
        dateOrder: 'yy',
        width: 150
    });    

$('#tsubmit').click(function(){
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var year = $('#car_year').val();
    var make = $('#car_make').val();
    var model = $('#car_model').val();
    var vin = $('#car_vin').val();
    var mileage = $('#car_mileage').val();
    var flag = 0;
    if(fname == ""){
        flag = 1;
        $('#fn').html("You have to enter first name");
    } else $('#fn').html("");
    if(lname == ""){
        flag = 1;
        $('#ln').html("You have to enter last name");
    } else $('#ln').html("");
    if(email == ""){
        flag = 1;
        $('#mail').html("");
        $('#mail').html("You have to enter email address");
    } else if(email.length > 0 && !isValidEmailAddress(email)){
        flag = 1;
        $('#mail').html("");
        $('#mail').html("Invalid email address");
    } else $('#mail').html("");  
    if(phone == ""){
        flag = 1;
        $('#ph').html("You have to enter phone number");
    } else $('#ph').html("");   
    if(year == ""){
        flag = 1;
        $('#cy').html("You have to enter year");
    } else $('#cy').html(""); 
    if(make == ""){
        flag = 1;
        $('#cm').html("You have to enter make");
    } else $('#cm').html(""); 
    if(model == ""){
        flag = 1;
        $('#cmod').html("You have to enter model");
    } else $('#cmod').html("");
    if(vin == ""){
        flag = 1;
        $('#cvin').html("");
        $('#cvin').html("You have to enter VIN");
    } else if (vin.length>0 && vin.length != 17){ 
        flag = 1;
        $('#cvin').html("");
        $('#cvin').html("VIN shuold not exceed or less than 17 characters");
    } else $('#cvin').html("");   
    if(mileage == ""){
        flag = 1;
        $('#cmil').html("You have to enter mileage");
    } else $('#cmil').html("");                       
    if(flag) return false;  
});  


$('#lsubmit').click(function(){
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var flag = 0;
    if(fname == ""){
        flag = 1;
        $('#fn').html("You have to enter first name");
    } else $('#fn').html("");
    if(lname == ""){
        flag = 1;
        $('#ln').html("You have to enter last name");
    } else $('#ln').html("");
    if(email == ""){
        flag = 1;
        $('#mail').html("");
        $('#mail').html("You have to enter email address");
    } else if(email.length > 0 && !isValidEmailAddress(email)){
        flag = 1;
        $('#mail').html("");
        $('#mail').html("Invalid email address");
    } else $('#mail').html("");  
    if(phone == ""){
        flag = 1;
        $('#ph').html("You have to enter phone number");
    } else $('#ph').html("");                      
    if(flag) return false;  
}); 

});
</script>