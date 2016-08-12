<?php

class contactForm{
	
		
	function contactForm($cfg)
	{
		
		/***********************************************************************************************************************************
		 * CONFIGURATION 
		 *
		 * $this->cfg['emailaddress']: the email address on which you want to receive the messages from users through your website
		 * $this->cfg['confirmation_email_subject']: the subject of the email containing the message sent by users through your website
		 * 
		 */
		$this->cfg['captacha_length'] = 6;
		
		$this->cfg['emailaddress'] = $cfg['email'];
		
		$this->cfg['confirmation_email_subject'] = 'New message sent from your website';
		
		$this->cfg['form_validationmessage'] = $cfg['form_validationmessage'];
		
		$this->cfg['form_error_captcha'] = $cfg['form_error_captcha'];
		$this->cfg['form_error_emptyfield'] = $cfg['form_error_emptyfield'];
		$this->cfg['form_error_invalidemailaddress'] = $cfg['form_error_invalidemailaddress'];
		$this->cfg['form_validationmessage'] = $cfg['form_validationmessage'];
		$this->cfg['form_emailnotificationinputid'] = $cfg['form_emailnotificationinputid'];
		$this->cfg['form_emailnotificationtitle'] = $cfg['form_emailnotificationtitle'];
		$this->cfg['form_emailnotificationmessage'] = $cfg['form_emailnotificationmessage'];
		
		
		$this->mailheaders_brut  = "From: ".$this->cfg['emailaddress']."<".$this->cfg['emailaddress'].">\r\n";
		$this->mailheaders_brut .= "Reply-To: ".$this->cfg['emailaddress']."<".$this->cfg['emailaddress'].">\r\n";
		$this->mailheaders_brut .= "MIME-Version: 1.0\r\n";
		$this->mailheaders_brut .= "Content-type: text/plain; charset=utf-8\r\n";
		$this->mailheaders_brut .= "X-Mailer: PHP/".phpversion()."\r\n";
		
		$this->demo = 0;
		$this->envato_link = 'http://codecanyon.net/item/contact-form-generator/1719810';
	}
	
	
	function sendMail()
	{
		$mail_body .= 'You received a new message: '.date("F j, Y, g:i A")
					."\r\n"."--------------------------------------------------------";

		if($this->merge_post)
		{
			foreach($this->merge_post as $value)
			{
				$mail_body .= "\r\n\r\n".$this->quote_smart($value['elementlabel']).': '.$this->quote_smart($value['elementvalue']);
			}
		}
		
		$mail_body .= "\r\n\r\n"."--------------------------------------------------------";
		$mail_body .= "\r\n".'IP address: '.$_SERVER['REMOTE_ADDR'];
		$mail_body .= "\r\n".'Host: '.gethostbyaddr($_SERVER['REMOTE_ADDR']);
		
		if($this->demo != 1)
		{
			mail($this->cfg['emailaddress'], $this->cfg['confirmation_email_subject'], $mail_body, $this->mailheaders_brut);
		}
	}
	
	
	function sendMailReceipt($value)
	{
		if($this->demo != 1)
		{
			mail($value['email_address'], $value['form_emailnotificationtitle'], $value['form_emailnotificationmessage'], $this->mailheaders_brut);
		}
	}
	
	function mergePost($value)
	{
		$this->merge_post[$this->merge_post_index]['elementid'] = $value['elementid'];
		$this->merge_post[$this->merge_post_index]['elementvalue'] = trim($value['elementvalue']);
		$this->merge_post[$this->merge_post_index]['elementlabel'] = trim($value['label']);
		$this->merge_post_index++;
	}
	

	function isEmail($email)
	{
		$atom   = '[-a-z0-9\\_]';   // authorized caracters before @
		$domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // authorized caracters after @
									   
		$regex = '/^' . $atom . '+' .   
		'(\.' . $atom . '+)*' .         
										
		'@' .                           
		'(' . $domain . '{1,63}\.)+' .  
										
		$domain . '{2,63}$/i';          
		
		// test de l'adresse e-mail
		return preg_match($regex, trim($email)) ? 1 : 0;
		
	}
	
	
	function quote_smart($value)
	{
		if(get_magic_quotes_gpc())
		{
			$value = stripslashes($value);
		}
		
		return $value;
	}

	
	
}
?>

