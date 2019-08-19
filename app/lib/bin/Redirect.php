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
/********************************
Redirect Functions
*********************************/
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function redirect($location = null){
	if(is_numeric($location)){
		switch($location){
			case 404:
				$redirection = url::go() . Config::get('404_error/404_url');
				header('Location:' . $redirection);
			break;

			case 999: //to be used for testing purpose only
				$redirection = url::go() . 'dashboard';
				header('Location:' . $redirection);
			break;

			default:
				$redirection = url::go() . Config::get('404_error/404_url');
				header('Location:' . $redirection);
			break;
		}
	} else {
		$redirection = url::go() . $location;
		header('Location:' . $redirection);
	}
}