<?php 

/***************************************************************
Application Name: 
Application Version
Author:
Company:
File/Class Name:
File/Class Version:
Type: 

Description
*******************CHANGE LOGS*********************************/
/***************************************************************



***************************************************************/
class Template{
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function get_template($name){
		$msg = file_get_contents(TEMPLATE_PATH.$name.'.php');
		return $msg;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function mail_header($array = array()){	
		if(!empty($array)){
			$header = '';
			$from = '';
			$bcc = '';
			$cc = '';

 			foreach($array as $key => $value){
				switch(strtolower($key)){
					case 'from':
								$from = $value;
								break;

					case 'cc':
								if(is_array($value)){
								 $email = '';
								 foreach($value as $email){
									$cc .= $email.'; ';
								 } 
								} else {
									$cc .= $value.'; ';
								}
								break;

					case 'bcc':
								if(is_array($value)){
								 $email = '';
								 foreach($value as $email){
									$bcc .= $email.'; ';
								 } 
								} else {
									$bcc .= $value.'; ';
								}
								break;
				}
			}

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
			if($from != ''){
				$headers .= 'From: '.$from. "\r\n";
			} else {
				echo 'error';
			}
			if($cc != ''){
				$headers .= 'Cc: '.$cc. "\r\n";
			}

			if($bcc != ''){
				$headers .= 'Bcc: '.$bcc. "\r\n";
			}
		}
		return $headers;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function send_mail($array = array()){
		$to = '';
		$subject = '';
		$header = '';
		$message = '';

		//Check Required Keywords
		if(array_key_exists('to',$array) == false){
			echo 'error';
			exit;
		} 

		if(array_key_exists('subject',$array) == false){
			echo 'error';
			exit;
		} 

		if(array_key_exists('message',$array) == false){
			echo 'error';
			exit;
		} 

		if(array_key_exists('header',$array) == false){
			echo 'error';
			exit;	
		} 

		foreach($array as $key => $value){
			switch(strtolower($key)){
				case 'to':	
							if(is_array($value)){
							 $email = '';
							 foreach($value as $email){
								$to .= $email.'; ';
							 } 
							} else {
								$to .= $value.'; ';
							}
							break;
				case 'subject':
							$subject = $value;
							break;
				case 'header':
							$header = $value;
							break;
				case 'message':
							$message = $value;
							break;
							
			}
		}
			if($to != ''){
				$i_to = $to;
			} else {
				echo 'error';
				exit;
			}

			if($subject != ''){
				$i_subject = $subject;				
			} else {
				echo 'error';
				exit;
			}

			if($header != ''){
				$i_header = $header;
			} else {	
				echo 'error';
				exit;
			}

			if($message != ''){
				$i_message = $message;
			} else {
				echo 'error';
				exit;
			}

			try{
				mail($i_to,$i_subject,$i_message,$i_header);
			} catch (exception $e){
				var_dump($e);
			}
	}
}