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
//Msg Class V000.

class Avg {
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
		Avg::$_name = $name;
		Avg::$_table = $table;
		$q = Avg::_buildQuery();
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
		$query = 'SELECT AVG('.Avg::$_name.') FROM '.$table;
	}

}