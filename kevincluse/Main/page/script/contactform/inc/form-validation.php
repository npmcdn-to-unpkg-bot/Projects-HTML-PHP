<?php

session_start();

require_once('../inc/contactform.config.php');

require_once('../class/class.contactform.php');

$contactform_obj = new contactForm($cfg);

$post_required_element = array('element-6','element-4');

$post_required_email = array('element-3');

if($_SESSION['captcha_img_string'] != $_POST['captcha_input']){$json_error .= '{"elementid":"element-7",  "errormessage": "'.addcslashes($contactform_obj->cfg['form_error_captcha'], '"').'"},';}

?>
<?php

/**
 * required files and elements are written in saveform.php
 * $post_required_element = array...
 * $post_required_email = array...
 * json error message for invalid captcha (captcha_img_string)
 */


if($_POST['form_value_array'])
{
	foreach($_POST['form_value_array'] as $value)
	{
		$contactform_obj->mergePost($value);

	}
}


if($contactform_obj->merge_post)
{
	foreach($contactform_obj->merge_post as $key=>$value)
	{
		$post_element_ids[] = $value['elementid'];
	}
} else {
	exit;
}
//print_r($post_element_id);

if($post_required_element && $contactform_obj->merge_post)
{
	
	foreach($post_required_element as $value)
	{
		foreach($contactform_obj->merge_post as $key=>$vvalue)
		{
			if($vvalue['elementid'] == $value)
			{
				if(!$vvalue['elementvalue'])
				{	//echo $value."\r\n";
					$json_error .= '{"elementid":"'.$value.'",  "errormessage": "'.addcslashes($contactform_obj->cfg['form_error_emptyfield'], '"').'"},';
					
				}
				break;
			}
		}
		
		// for empty checkboxes (checkbox values array not in merge_post)
		if(!in_array($value, $post_element_ids)){
			$json_error .= '{"elementid":"'.$value.'",  "errormessage": "'.addcslashes($contactform_obj->cfg['form_error_emptyfield'], '"').'"},';
		}
	}
}


if($post_required_email)
{
	
	foreach($post_required_email as $value)
	{
		foreach($contactform_obj->merge_post as $key=>$vvalue)
		{
			if($vvalue['elementid'] == $value)
			{
				if(!$contactform_obj->isEmail($vvalue['elementvalue']))
				{
					$json_error .= '{"elementid":"'.$value.'",  "errormessage": "'.addcslashes($contactform_obj->cfg['form_error_invalidemailaddress'], '"').'"},';
	
				}
				break;
			}
		}
		
	}
}


if($json_error)
{
	$json_response = '{'
							.'"status":"nok",'
							.'"message":['.substr($json_error,0,-1).']'
							.'}';
} else{
	
	//print_r($_POST);
	$contactform_obj->sendMail();
	
	if($contactform_obj->cfg['form_emailnotificationinputid'])
	{
		foreach($contactform_obj->merge_post as $key=>$vvalue)
		{
			if($vvalue['elementid'] == $contactform_obj->cfg['form_emailnotificationinputid'])
			{
				$receipt_cfg['email_address'] = $vvalue['elementvalue'];
				//echo $vvalue['elementvalue'];
				break;
			}
		}

		$receipt_cfg['form_emailnotificationtitle'] = $contactform_obj->cfg['form_emailnotificationtitle'];
		$receipt_cfg['form_emailnotificationmessage'] = preg_replace('#<br(\s*)/>|<br(\s*)>#i', "\r\n",$contactform_obj->cfg['form_emailnotificationmessage']);
		$contactform_obj->sendMailReceipt($receipt_cfg);
		
	}
	
	$json_response = '{'
							.'"status":"ok",'
							.'"message":"'.addcslashes($contactform_obj->cfg['form_validationmessage'], '"').'"'
							.'}';
}

echo $json_response;

?>
