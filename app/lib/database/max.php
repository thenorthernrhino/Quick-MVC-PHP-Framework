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
class Max {
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
		Max::$_name = $name;
		Max::$_table = $table;
		$q = Max::_buildQuery();
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
		$query = 'SELECT MAX('.Avg::$_name.') FROM '.$table;
	}

}