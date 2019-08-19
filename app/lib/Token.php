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
Token Functions 
*********************************/
class Token{

	public static function generate(){
		return Session::set(Config::get('session/session_name'), md5(uniqid(rand())));
	}

	public static function check(){
		$tokenName = Config::get('session/session_name');

		if(Session::exists($tokenName) && $token === Session::get($tokenName)){
			Session::delete($tokenName);
		}
		return false;
	}
}
?>