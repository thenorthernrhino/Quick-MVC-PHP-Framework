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
//Technical Details
//Msg Class: Z000

/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
//Clean Array
function array_clean($arr = array()){
	if(!empty($arr)){
		if(is_array($arr)){
			$arr = array_filter($arr);
			$arr = array_values($arr);
			return $arr;
		} else {
			Msg::_throw('E','Z','000');
		}
	} else {
		Msg::_throw('E','Z','001');
	}
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function get_string_between($string, $start, $end){
	$string = ' ' . $string;
	$ini = strpos($string, $start);
	if ($ini == 0) return '';
	$ini += strlen($start);
	$len = strpos($string, $end, $ini) - $ini;
	return substr($string, $ini, $len);
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
// Name DNS name for Databse Connection
function DNS(){
	$server   = config::get('database_credits/datasource').':host='. config::get('database_credits/host').
				';dbname=' . config::get('database_credits/database');
	return $server;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
// if this is localhost
function isLocalhost(){
	return $_SERVER['SERVER_ADDR'] == '127.0.0.1' || $_SERVER['SERVER_ADDR'] == '::1';
}    
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/

//Get client IP address
function getClientIP() {
	$ip = "127.0.0.1";
	if (getenv("HTTP_CLIENT_IP")){
		$ip = getenv("HTTP_CLIENT_IP");
	}	else if(getenv("HTTP_X_FORWARDED_FOR")){
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	}	else if(getenv("REMOTE_ADDR")){
		$ip = getenv("REMOTE_ADDR");
	}	else{
		$ip = "UNKNOWN";
	} 
	
	if($ip=="::1"){
		$ip = "127.0.0.1";
	}
	return $ip;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
// Check if the action is AJAX request
function isAjax(){
	return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'));
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
//Gets server url path
function getServerUrl(){
	$port = $_SERVER['SERVER_PORT'];
	$http = "http";
	
	if($port == "80"){
	  $port = "";  
	}
	
	if(!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on"){
	   $http = "https";
	}
	if(empty($port)){
	   return $http."://".$_SERVER['SERVER_NAME'];
	}else{
	   return $http."://".$_SERVER['SERVER_NAME'].":".$port; 
	}        
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
/*
function get_current_user(){
	return get_current_user();
}
*/
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function get_uid(){
	return getmyuid();
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function get_pid(){
	return getmypid();
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function UniqueMachineID($salt = "") {
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
	$temp = sys_get_temp_dir().DIRECTORY_SEPARATOR."diskpartscript.txt";
	if(!file_exists($temp) && !is_file($temp)) file_put_contents($temp, "select disk 0\ndetail disk");
	$output = shell_exec("diskpart /s ".$temp);
	$lines = explode("\n",$output);
	$result = array_filter($lines,function($line) {
		return stripos($line,"ID:")!==false;
	});
	if(count($result)>0) {
		$result = array_shift(array_values($result));
		$result = explode(":",$result);
		$result = trim(end($result));       
	} else $result = $output;       
} else {
	$result = shell_exec("blkid -o value -s UUID");  
	if(stripos($result,"blkid")!==false) {
		$result = $_SERVER['HTTP_HOST'];
	}
}   
	return md5($salt.md5($result));
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function homepath(){
	return getenv("HOMEPATH");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function homedrive(){
	return getenv("HOMEDRIVE");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function username(){
	return getenv("username");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function get_mac_address(){
$ipAddress=$_SERVER['REMOTE_ADDR'];
	$macAddr=false;

	#run the external command, break output into lines
	$arp=`arp -a $ipAddress`;
	$lines=explode("\n", $arp);

	#look for the output line describing our IP address
	foreach($lines as $line)
	{
	   $cols=preg_split('/\s+/', trim($line));
	   if ($cols[0]==$ipAddress)
	   {
		   $macAddr=$cols[1];
	   }
	}
}
