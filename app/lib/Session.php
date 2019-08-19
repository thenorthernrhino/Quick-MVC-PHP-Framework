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
Session Functions
*********************************/
class Session
{
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function init(){
		@session_start();
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function set($key, $value){
		$_SESSION[$key] = $value;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function get($key){
		if(isset($_SESSION[$key]))
		return $_SESSION[$key];
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function exists($key){
		if(isset($_SESSION[$key])){
		return true;
		} else { return false; }
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function destroy(){
		//unset($_SESSION);
		session_destroy();
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function delete($key){
		if(self::exists($key)){
			unset($_SESSION[$key]);
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function flash($key, $string = ''){
		if(self::exists($key)){
			$session = self::get($key);
					   self::delete($key);
			return $session;
		} else {
			self::put($name, $string);
		}
	}
}

?>