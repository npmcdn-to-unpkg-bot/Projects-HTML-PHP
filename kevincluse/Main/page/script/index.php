<?php 
session_start();
require_once('contactform/inc/contactform.config.php');
require_once('contactform/class/class.contactform.php');
$contactform_obj = new contactForm($cfg);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Contact Form</title>

<link rel="stylesheet" type="text/css" href="contactform/css/contactform.css"/>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script src="contactform/js/contactform.js"></script>


</head>

<body>

<div id="contactform">

<div id="contactform-content">

<div class="element">
	<div class="option-container">
	<span class="title  " style="color:#26ADE4;font-family:Arial;font-size:2.2em;font-weight:bold;">Kontaktieren Sie uns</span></div>
</div>


<div class="element">
	<div class="option-container"><div class="paragraph  " name="element-2" id="element-2" style="color:#000000;font-family:Verdana;font-size:0.8em;font-weight:normal;width:300px;">Um uns zu kontaktieren, verwenden Sie das untenstehende Formular.<br>Wir werden uns so bald wie möglich melden.</div></div>
</div>


<div class="element">

	<label id="label-element-6" class="label" style="color:#4DBCE9;font-family:Trebuchet MS;font-size:1.2em;font-weight:normal;">
	<span class="labelelementvalue">Name</span>
	<span class="required">*</span></label>

	<div class="errormessage" id="errormessage-element-6"></div>

	<div class="option-container">
	<input class="af-inputtext af-formvalue  " type="text" name="element-6" id="element-6" value="" style="color: rgb(0, 0, 0); font-family: Verdana; font-size: 0.8em; font-weight: normal; width: 250px; border: 1px solid rgb(220, 220, 220); border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; padding: 5px; "></div>
	<input type="checkbox" style="display:none" value="6" checked="" name="requiredelement[]" id="requiredelement-6">
</div>


<div class="element">

	<label id="label-element-3" class="label" style="color:#4DBCE9;font-family:Trebuchet MS;font-size:1.2em;font-weight:normal;">
	<span class="labelelementvalue">Email</span>
	<span class="required">*</span></label>

	<div class="errormessage" id="errormessage-element-3"></div>

	<div class="option-container">
	<input class="af-inputtext af-email af-formvalue  " type="text" name="element-3" id="element-3" value="" style="color: rgb(0, 0, 0); font-family: Verdana; font-size: 0.8em; font-weight: normal; width: 250px; border: 1px solid rgb(220, 220, 220); border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; padding: 5px; "></div>
	<input type="hidden" name="form_emailnotificationinputid" id="form_emailnotificationinputid" value="element-3" style="display:none">
	<input type="checkbox" checked="" style="display:none" value="3" name="emailrequiredelement[]" id="emailrequiredelement-3">
</div>


<div class="element">

	<label id="label-element-4" class="label" style="color:#4DBCE9;font-family:Trebuchet MS;font-size:1.2em;font-weight:normal;">
	<span class="labelelementvalue">Nachricht</span>
	<span class="required">*</span></label>

	<div class="errormessage" id="errormessage-element-4"></div>

	<div class="option-container">
	<textarea class="af-textarea af-formvalue  " name="element-4" id="element-4" style="color: rgb(0, 0, 0); font-family: Verdana; font-size: 0.8em; font-weight: normal; width: 250px; border: 1px solid rgb(220, 220, 220); border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; padding: 5px; " rows="5"></textarea></div>
	<input type="checkbox" style="display:none" value="4" checked="" name="requiredelement[]" id="requiredelement-4">
</div>


<div class="element">

	<label id="label-element-7" class="label" style="color:#4DBCE9;font-family:Trebuchet MS;font-size:1.2em;font-weight:normal;">
	<span class="labelelementvalue">Sicherheitscode</span></label>

	<div class="errormessage" id="errormessage-element-7"></div>

	<div class="option-container"><div style="margin-bottom:4px" class="captcha_container"><img src="contactform/inc/captcha.php?length=5&amp;format=lettersandnumbers" class="captcha_img" id="element-7"></div>
	<input type="text" style="color:#000000;font-family:Verdana;font-size:0.8em;font-weight:normal;border-style:solid; border-color:#dcdcdc;-moz-border-radius:5px;-khtml-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;border-width:1px;padding:5px;" id="captcha_input" class=" "></div>
</div>


<div class="element">
	<div class="option-container">
	<input type="submit" name="element-5" id="element-5" value="senden" class="submit  " style="color:#555555;font-family:Arial;font-size:1.3em;font-weight:bold;background-color:#f1f1f1;border:1px solid #cccccc;width:140px;; "></div></div>
	<div id="validation">Validation in progress</div>

<?php
unset($_SESSION['checkform'])
?>

</div><!--contactform-content-->

</div><!--contactform-->

</body>


</html>