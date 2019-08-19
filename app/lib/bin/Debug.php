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
	function debug($var,$value = null){
	   if(!empty($var)){
		   $details = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
		   $error   = error_get_last();
			echo '<pre>';
			echo '<b>Line Number</b>:'.$details[0]['line'];
			echo '<br/>';
			echo '<b>File</b>:'. $details[0]['file'];
			echo '<br/>'; 
			if(is_object($var)){echo '<b>Type:</b>: Object';}
			if(is_array($var)) {echo '<b>Type:</b>: Array';}
			if(is_string($var)){echo '<b>Type:</b>: String';}
			if(is_bool($var))  {echo '<b>Type:</b>: Boolean';}
			if(is_int($var))   {echo '<b>Type:</b>: Integer';}
			if(is_float($var)) {echo '<b>Type:</b>: Float';}
			echo '<br />'; 
			if(!empty($error)){
				echo 'Error Log: <br/>';
				echo '<b>File</b>:'. $error['file'].'<br/>';
				echo '<b>Line Number</b>:'.$error['line'].'<br/>';
				echo '<b>Message</b>:'.$error['message'].'<br/>';
			}
			if(strtolower($value) == 'session'){
				$isSessionActive = (session_status() == PHP_SESSION_ACTIVE);
				if ($isSessionActive) {
					echo '<b>Sessions</b> :: Active Sessions Exist!<br/>';
					echo '<b>Sessions</b> :: Found Session Values::<br/>';
						print_r($_SESSION);
					echo '<b>Session Method</b> :: '. $_SERVER['REQUEST_METHOD'] .'<br/>';
				} else echo '<b>Sessions</b> :: No Sessions Active!<br/>';
			}

			if(is_array($var)){
			echo '<b>Array Results</b>:<br/>';
				print_r($var);
			} else if(is_object($var)){
			echo '<b>Object Results</b>:<br/>';
				print_r($var);
			} else echo '<b>Result</b>: '.$var;
			if($value == 'backtrace'){
				var_dump(debug_print_backtrace());
			}

			echo '<br/><b>----------------------------------------------------------------------------------</b><br/>' ;
			echo '<b>Back Tracing / Debug Values [<i>Syntax </i> debug($variables,$options = null)]</b><br/>' ;
			echo '<i>Debug Parameter Options</i><br/>' ;
			echo '<ul>';
			echo '<li><i>Pass Value "backtrace" for backtracing the application</i></li>' ;
			echo '<li><i>Pass Value "session" for session variables</i></li>' ;
			echo '</ul>';
			echo '</pre>';
	   }
   }  
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
   function declared_classes(){
	   echo '<pre>';
	   print_r(get_declared_classes());
	   echo '</pre>';
   }