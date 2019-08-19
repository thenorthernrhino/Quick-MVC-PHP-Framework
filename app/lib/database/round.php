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
class Round {

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
		Round::$_name = $name;
		Round::$_table = $table;
		$q = Round::_buildQuery();
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
		$query = 'SELECT ROUND('.Avg::$_name.') FROM '.$table;
	}

}