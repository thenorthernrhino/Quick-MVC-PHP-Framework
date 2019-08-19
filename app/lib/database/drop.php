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
class Drop{

	private $_drop;
	private $_$name;
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function static function setQuery($name,$drop = null){
		if(isset($drop) == NULL){
			Drop::$_drop = ' TABLE ' ;
		} else {
			switch(strtolower(trim($name))){
				case 'table':
					Drop::$_drop = ' TABLE ' ;
					break;
				case 'database':
					Drop::$_drop = ' DATABASE ' ;
					break;
			}
		}
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
		$query = ' DROP ';
		$query .= Drop::$_drop .' ';
		$query .= Drop::$_name . ' ';
		$query = trim($query);
		return $query ;
	}
}