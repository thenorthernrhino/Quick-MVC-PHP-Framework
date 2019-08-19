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
class Min {

	private static $_name;
	private static $_table;
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function setQuery($name,$table){
		Min::$_name = $name;
		Min::$_table = $table;
		$q = Min::_buildQuery();
		return $q;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function _buildQuery(){
		$query = '';
		$query = 'SELECT MIN('.Avg::$_name.') FROM '.$table;
	}

}