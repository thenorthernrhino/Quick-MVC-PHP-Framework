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
//Msg class T000

class Table{

	private static $_table;
	private static $_fields;
	private static $_primary;
	private static $_foreign;
	private static $_unique;
	private static $_keyField;
	private static $_query;
	private static $_auto;
	private static $_check;
	private static $_queue = array();
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 public static function setQuery($table,$param = array(),$check = null){
			Table::$_check = $check;
			if(Query::is_table($table) == false){;
				Table::$_table  = $table;
				Table::$_fields = Field::setQuery($param);

				//foreach key values
				foreach($param as $key => $value){
					
				 $i = 0;
				 $queue = array();
					$key = strtolower(trim($key));
					switch($key){
						case 'primary':
							  Self::_primarykey($value);
						break;
						case 'unique':
							  Self::_uniquekey($value);
						break;
						case 'foreign':
							  Self::_foreignkey($value);
						break;
						
					} 
				}

				//Table::$_queue = $queue;
				Self::_buildQuery();
				return Table::$_query;
			} 
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	private static function _primarykey($value){
		Table::$_primary = ' PRIMARY KEY ('.$value.')';
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function auto($type){
		if(is_bool($type)){
			if($type == true) { Table::$_auto = $type; }
			Self::_primarykey(Table::$_auto);
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function _uniquekey($type){
			Table::$_unique = ' UNIQUE KEY ('.$type.')';
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function _foreignkey($type){
		$f = explode(',',$type);
		$reference = $f[1];
		if(isset($reference)){
			Table::$_foreign = ' FOREIGN KEY ('.$type.') REFERENCES('.$reference.')';
		} else {
			Msg::_throw('E','T','000');
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	private static function _buildQuery(){
		 $query = 'CREATE TABLE '. Table::$_table .' ( ';
		 foreach(Table::$_fields as $fieldset){
			$query .= $fieldset . ', ';
		 }

		$queue = array();
		$queue = Table::$_queue;
		foreach($queue as $setOrder){
			switch($setOrder){
				case 'primary':		$query .= Table::$_primary;
									break;
				case 'unique':		$query .= Table::$_unique;
									break;
				case 'foriegn':     $query .= Table::$_foriegn;
									break;
			}
		}

		if(Table::$_check != null){
			$query .= ' CHECK ( '.Table::$_check.' )';
		}

		if($query = rtrim($query,', ')){
			$query = rtrim($query,', ');
		}
		$query .= ' ) ';

		Table::$_query = $query;
	 }
}