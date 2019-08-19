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
/****************************** 
 * Exception Functions
 ******************************/
 /***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function writeDBLog($e, $query = null){
		$file = new Files;
		$t = time();
		$ms = ($query!=null) ? $query : " ";
        $location = PROJECT_PATH . Config::get('log/dblog');
		$file->putFileContent($location, ">" . date("Y-m-d",$t). ":" .date("h:i:sa")." " .$ms. " ");
		$file->putFileContent($location,"- " . $e->getMessage());
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function writeFiles($e,$msg){
		$file = new Files;
		$t = time();
		$ms = ($msg!=null) ? $msg : " ";
        $location = PROJECT_PATH . Config::get('log/applog');
		$file->putFileContent($location,"> " . date("Y-m-d",$t). ":" .date("h:i:sa")." ".$ms." ");
		$file->putFileContent($location,"- " . $e->getMessage());
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function deleteLog($query = null,$record){
		$file = new Files;
		$t = time();
		$ms = ($query!=null) ? $query : " ";
        $location = PROJECT_PATH . Config::get('log/auditlog');
		$file->putFileContent($location,"> " . date("Y-m-d",$t). ":" .date("h:i:sa")." ".$ms." ");
		$file->putFileContent($location,"- " .'Existing Old Deleted Record Was '. $record);
	}

/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/

function dbCreateDLog($e, $query_type = null, $query){
		$file = new Files;
		$t = time();
		$ms = ($query!=null) ? $query : " ";
        $location = PROJECT_PATH . Config::get('log/auditlog');
		$file->putFileContent($location, ">" . date("Y-m-d",$t). ":" .date("h:i:sa")." " .$ms. " ");
		$file->putFileContent($location,"- " . $Query_type .": ".$e->getMessage());
	}

?>