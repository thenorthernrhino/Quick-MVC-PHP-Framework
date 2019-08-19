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
class Truncate{

	private $_$name;
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function static function setQuery($name){
		Drop::$_drop = $name;	
		$q = Drop::_buildQuery();
		return $q;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	private static function _buildQuery(){
		$query = ' TRUNCATE TABLE ';
		$query .= Drop::$_name;
		$query = trim($query);
		return $query ;
	}
}