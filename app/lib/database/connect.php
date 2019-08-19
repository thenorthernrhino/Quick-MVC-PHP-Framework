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
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function pdo(){
	try{    
		$obj = new PDO(DNS(),Config::get('database_credits/login'),Config::get('database_credits/password'));
		$obj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $obj;
	} catch(PDOException $e){ 
		writeDBLog($e); 
	}
}
