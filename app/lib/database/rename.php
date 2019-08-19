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
class Rename{
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
		Sum::$_name = $name;
		Sum::$_table = $table;
		$q = Sum::_buildQuery();
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
		$query = 'RENAME TABLE `'.$table.'` TO `.'.$name.'`';
	}


}