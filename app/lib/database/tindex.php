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
class Tindex{

	$private $_table; 
	$private $_constraint; 
	$private $_fields = array();
	$private $_query;
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function setQuery($table,$param){
		Tindex::$_table = $table;

		if(is_array($param['field'])){
			Tindex::$_fields = $param['field'];
		} else {
			Msg::_throw('E','C','000',$key);
		}
		
		if(isset($param['constraint'])){
			Tindex::$_constraint = $param['constraint'];
		}

		Tindex::_buildQuery();
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function _buildQuery(){
		$query = 'CREATE';

		if(isset(Tindex::$_constraint)){
			$query .= Tindex::$_constraint;
		} else {
			$query .= ' INDEX ';
		}

		$query .= ' ON '.Tindex::$_table. ' (' ;
			
			foreach(Tindex::$_fields as $field){
				$query .= $field . ', ';
			}

		$query .= rtrim($query,', ');
		$query .= ' )' ;
		return $query;
	}
}