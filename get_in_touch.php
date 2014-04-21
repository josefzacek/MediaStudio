<?php

$PHP_SELF = $_SERVER['PHP_SELF'];
$errName = "";
$errPhone = "";
$errEmail = "";
$errmessage = "";

if(isset($_POST['submit'])) {
if($_POST["ac"]=="login"){
$FORMOK = TRUE; 
	
if(preg_match("/^[a-zA-Z -]+$/", $_POST["name"]) === 0) {
$errNam1 = 'Please enter you name.';
$FORMOK = FALSE;
}


if(preg_match("/^[0-9]+$/", $_POST["phone"]) === 0) {
$errPhone = 'Please enter your phone number.';
$FORMOK = FALSE;
}


if(preg_match("/^[a-zA-Z]\w+(\.\w+)*\@\w+(\.[0-9a-zA-Z]+)*\.[a-zA-Z]{2,4}$/", $_POST["email"]) === 0) {
$errEmail = 'Please enter a valid email.';
$FORMOK = FALSE;
}


if(preg_match("/./", $_POST["message"]) === 0) {
$errmessage = 'Please enter a message.';
$FORMOK = FALSE;
}

if($FORMOK) {
	
$to = "joezacek@gmail.com";
$subject = "mediastudio page";

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$referral = $_POST['referral'];
$message = $_POST['message'];

$message = "

<p>Name: $name </p>
<p>Phone: $phone</p>
<p>Email: $email</p>
<p>Referral: $referral</p>
<p>Message: $message </p>

";

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To: info@mediastudio.ie' . "\r\n";
$headers .= 'From: info@mediastudio.ie' . "\r\n";

header("Location: thank_you.php");

mail($to, $subject, $message, $headers);

}}} ?>

<!DOCTYPE HTML>

<html>

<head>

<link rel="icon" type="image/png" href="images/favicon.png"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta charset="utf-8">

<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<title>MediaStudio | Get In Touch</title>

<meta name="description" content="Contact MediaStudio.ie for a free quotation or just get in touch.">

<meta name="keywords" content="Web Design Quotation, Web Design Quote, MediaStudio Contact Details, Contact MediaStudio, Contact Shane Walsh, Josef Zacek, Peter Coughlan">

<!--The Main Stylesheet-->
<link href="css/desktop.css" rel="stylesheet" type="text/css">
<!--The Tablet Stylesheet-->
<link href="css/tablet.css" rel="stylesheet" type="text/css">
<!--The Mobile Stylesheet-->
<link href="css/mobile.css" rel="stylesheet" type="text/css">
<!--Stylesheet for Nivo Slider-->
<link href="css/nivo-slider.css" rel="stylesheet" type="text/css">

<!--jQuery Script-->
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script> 
<!--jQuery Nivo Slider Script-->
<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>

<!--Google Analytics Script-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50246408-1', 'josefzacek.cz');
  ga('send', 'pageview');

</script>

</head>

<body>

<div id="wrapper">
  <header>
    <div id="logo"> <img src="images/logo.jpg" width="319" height="69" alt="MediaStudio Logo">
      <h1>MediaStudio Web Design &amp; Development</h1>
    </div>
    <nav>
      <ul> 
<li><a href="index.php" title="Index Page">Home</a></li> 
<li><a href="services.php" title="Services Page">Services</a></li>
<li><a href="packages.php" title="Packages Page">Packages</a></li>   
<li><a href="testimonials.php" title="Testimonials">Testimonials</a></li>
<li><a href="get_in_touch.php" title="Contact Us Page">Get In Touch</a></li>
</ul>
    </nav>
  </header>
  <!--Optional Banner Or Slideshow-->

<div id="slideshow">

<div class="slider-wrapper theme-default">
<div id="slider" class="nivoSlider">

<img src="images/index_html5.jpg" alt="We love HTML5 &amp; CSS3" width="1000" height="290" />
<img src="images/index_responsive.jpg" alt="Responsive Web Design" width="1000" height="290" />
<img src="images/index_graphic_design.jpg" alt="Graphic design" width="1000" height="290" />
<img src="images/slideshow_services.jpg" alt="Customer support" width="1000" height="290" />

</div>
</div>

</div>

<!--This is where the content starts and can be cutomized to the clients liking.-->
    
<div id="content">
    
<article id="left_content">

<hgroup>
  <h2>Get In Touch With MediaStudio</h2>
  <h3>Get a quotation or just drop us a mail</h3>
</hgroup>

<form method="post" action="<?php $PHP_SELF ?>" onsubmit="return checkform(this);">

<input type="hidden" name="ac" value="login" />

<table width="100%">
  <tr>
    <td><label>Name:</label> </td>
  </tr>
  <tr>
    <td><input name="name" type="text" id="name" value="<?php if(isset($errName)) echo $errName; ?>"></td>
  </tr>
  <tr>
    <td><label>Email:</label></td>
  </tr>
  <tr>
    <td><input name="email" type="email" id="email" value="<?php if(isset($errEmail)) echo $errEmail; ?>"></td>
  </tr>
  <tr>
    <td><label>Phone:</label></td>
  </tr>
  <tr>
    <td><input name="phone" type="tel" id="phone" value="<?php if(isset($errPhone)) echo $errPhone; ?>"></td>
  </tr>
  <tr>
    <td><label>How did you hear about us?:</label> </td>
  </tr>
  <tr>
    <td><input name="referral" type="text" id="referral"></td>
  </tr>
  <tr>
    <td><label>Message:</label></td>
  </tr>
  <tr>
    <td><textarea name="message" id="message"><?php if(isset($errmessage)) echo $errmessage; ?></textarea></td>
  </tr>
  <tr>
    <td><label>Please Enter Security Code Below: <span id="txtCaptchaDiv" style="color:#F00"></span> </label> <input type="hidden" id="txtCaptcha" /> </td>
  </tr>
  <tr>
    <td><input type="text" name="txtInput" id="txtInput" size="30" /></td>
  </tr>
  <tr>
    <td><input name="submit" type="submit" id="submit" value="submit"></td>
  </tr>
</table>

</form>

</article>

<!--Sidebar-->

<aside id="right_content">

<hgroup>
<h2>Additional Contact Details</h2>
<h3>Team &amp; General Contact Details</h3>
</hgroup>

<h4>Phone Us</h4>

<ul>
<li>Landline: (+00353) 01 - 8438852</li>
<li>Mobile: (+00353) 086 - 3798559</li>
</ul>

<h4>Email Us</h4>

<ul>
<li>General Info: <a href="mailto:info@mediastudio.ie" title="General Info">info@mediastudio.ie</a></li>
<li>Billing: <a href="mailto:billing@mediastudio.ie" title="Billing">billing@mediastudio.ie</a></li>
<li>Support: <a href="mailto:support@mediastudio.ie" title="Support">support@mediastudio.ie</a></li>
</ul>

<h4>Contact Team Members</h4>

<ul>
<li>Shane Walsh: <a href="mailto:shane@mediastudio.ie" title="Shane walsh">shane@mediastudio.ie</a></li>
<li>Josef Zacek: <a href="mailto:josef@mediastudio.ie" title="Josef Zacek">josef@mediastudio.ie</a></li>
<li>Peter Coughlan: <a href="mailto:peter@mediastudio.ie" title="Peter Coughlan">peter@mediastudio.ie</a></li>
</ul>

</aside>
    
</div>

<!--Content Ends Here-->
<footer>
  <div class="footerbox">
    <h3>Responsive Design</h3>
    <img src="images/responsive.jpg" width="290" height="97" alt="Responsive Design">
    <p>With the rise of handheld devices and the mobile web Mediastudio can develop websites which look and perform great on all mobile devices.</p>
    <p> Whether your on your desktop, iPad or Smart Phone your website will look professional.</p>
  </div>
  <div class="footerbox">
    <h3>HTML5 &amp; CSS3</h3>
    <img src="images/html5.jpg" width="290" height="97" alt="HTML5 CSS3">
    <p>At Mediastudio we develop our websites using the newest standard in web design HTML5. HTML5 is the fifth revision of HTML and is set to change how the world wide web looks and feels. </p>
    <p>With HTML5 the possibilites are endless.</p>
  </div>
  <div class="footerbox">
    <h3>Contact MediaStudio</h3>
    <img src="images/contact_us.jpg" width="290" height="97" alt="Contact MediaStudio">
    <p><strong>E-mail:</strong> <a href="mailto:info@mediastudio.ie" title="Email Us">info@mediastudio.ie</a></p>
    <p><strong>Support:</strong> <a href="mailto:support@mediastudio.ie" title="Customer Support">support@mediastudio.ie</a></p>
    <p><strong>Landline:</strong> 01 - 8438852</p>
    <p><strong>Mobile:</strong> 086 - 3798559</p>
  </div>
  <div class="clear"></div>
  <div id="copyright">
   <ul>
<li><a href="get_in_touch.php" title="Contact Media Studio" >Contact Us</a></li>
<li><a href="testimonials.php" title="Client Testimonials">Testimonials</a></li>
<li>Copyright 2012 © Media Studio | All Rights Reserved.</li>
</ul>
  </div>
  <div id="social">
	<a href="https://www.facebook.com/MediaStudio.ie" title="Facebook Fan Page"> <img src="images/facebook_dark.png" width="35" height="35" alt="Facebook"></a>
	<a href="https://twitter.com/#!/MediaStudioie" title="Follow Us On twitter"> <img src="images/twitter_dark.png" width="35" height="35" alt="Twitter"> </a>
  </div>
</footer>
</div>

<script type="text/javascript">
	function checkform(theform){
		var why = "";
		 
		if(theform.txtInput.value == ""){
			why += "Security code should not be empty.\n";
		}
		if(theform.txtInput.value != ""){
			if(ValidCaptcha(theform.txtInput.value) == false){
				why += "Security code did not match.\n";
			}
		}
		if(why != ""){
			alert(why);
			return false;
		}
	}
   
	var a = Math.ceil(Math.random() * 9)+ '';
	var b = Math.ceil(Math.random() * 9)+ '';       
	var c = Math.ceil(Math.random() * 9)+ '';  
	var d = Math.ceil(Math.random() * 9)+ '';  
	var e = Math.ceil(Math.random() * 9)+ '';  
	  
	var code = a + b + c + d + e;
	document.getElementById("txtCaptcha").value = code;
	document.getElementById("txtCaptchaDiv").innerHTML = code;	
  
function ValidCaptcha(){
	var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
	var str2 = removeSpaces(document.getElementById('txtInput').value);
	if (str1 == str2){
		return true;	
	}else{
		return false;
	}
}

function removeSpaces(string){
	return string.split(' ').join('');
}
</script>

<!--jQuery Functions For NivoSlider-->
<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider({
        effect: 'fold',
        slices: 15,
        boxCols: 8,
        boxRows: 4,
        animSpeed: 500,
        pauseTime: 5000,
        startSlide: 0,
        directionNav: true,
        directionNavHide: true,
        controlNav: true,
        controlNavThumbs: false,
        controlNavThumbsFromRel: false,
        controlNavThumbsSearch: '.jpg',
        controlNavThumbsReplace: '_thumb.jpg',
        keyboardNav: true,
        pauseOnHover: true,
        manualAdvance: false,
        captionOpacity: 0.8,
        prevText: 'Prev',
        nextText: 'Next',
        randomStart: false,
        beforeChange: function(){},
        afterChange: function(){},
        slideshowEnd: function(){},
        lastSlide: function(){},
        afterLoad: function(){}
    });
});
</script>

</body>

</html>
