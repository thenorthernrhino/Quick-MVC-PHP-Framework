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
class Timestamp{
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function setTime($format = null){
		$time = Time();
		if($format == null){
			$res = date('Y-m-d H:i:s',$time);
		} else {
			$res = date($format,$time);
		}
		return $res;
	}
}