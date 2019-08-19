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
Hash Functions
*********************************/
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
 function hash_encrypt($data){
	 $context = hash_init(config::get('database_credits/security_function'), 
						  HASH_HMAC, 
						  config::get('database_credits/security_salt')
						);

	 hash_update($context, $data);
	 return hash_final($context);
 }
 /***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/

function hash_token($type = 'md5'){
	 $data1 = rand();
	 $data2 = rand();
	 $context = hash_init($type, HASH_HMAC, $data2);

	 hash_update($context, $data1);
	 return hash_final($context);
 }
?>