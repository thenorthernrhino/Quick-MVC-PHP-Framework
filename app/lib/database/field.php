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
//Technical Information
//Msg Class F000
// i,c,n,text,

class Field{
	
	private static $_fieldname;
	private static $_increment;
	private static $_increment_limit;
	private static $_increment_set;
	private static $_type;
	private static $_dataType;
	private static $_constraint;
	private static $_default;
	private static $_value;
	private static $_length;
	private static $_decimal;
	private static $_queue = array();
	private static $_result = array();
	private static $_minLength;
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function setQuery($param){
		if(is_array($param)){
			foreach($param as $key => $value){
				$key = strtolower(trim($key));
				Field::$_fieldname = $key;

				 $i = 0;
				 $queue = array();

				//Get Rest of the Details
				if(is_array($value)){
					foreach($value as $char => $property){
						$char = strtolower(trim($char));
							switch($char){
								case 'type':
										  Self::_type($property);
										  $queue[$i] = $char;
										  $i = $i + 1;
								break;
								case 'increment':
									  Self::_increment($property);
									  $queue[$i] = $char;
									  $i = $i + 1;
								break;
								case 'constraint':
									  Self::_constraint($property);
									  $queue[$i] = $char;
									  $i = $i + 1;
								break;
								case 'value':
									  Self::_value($property);
									  $queue[$i] = $char;
									  $i = $i + 1;
								break;
								case 'default':
									  Self::_default($property);
									  $queue[$i] = $char;
									  $i = $i + 1;
								break;
								//default: 
								//	  Msg::_throw('E','C','000',$key);
							}
					}
				}

				Field::$_queue = $queue;
				$q = self::_buildQuery();
				array_push(self::$_result,$q);	
			}
		return self::$_result;
		} else {
			Msg::_throw('E','C','003');
		} 
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function _datatype($type, $size = null, $decimal = null){
		 switch(strtoupper(trim($type))){
			case 'CHAR':	//(size)
				  if($size !== null){
					 $dataType = ' CHAR ('.$size.')';
				  } else {
					  Msg::_throw('E','C','003',$type);
				  }
			break;
			case 'VARCHAR':	//(size)
				  if($size !== null){
					 $dataType = ' VARCHAR ('.$size.')';
				  } else {
					  Msg::_throw('E','C','003',$type);
				  }
			break;
			case 'TINYTEXT':	
				  $dataType = ' TINYTEXT ';
			break;
			case 'TEXT':
				  $dataType = ' TEXT ';
			break;
			case 'BLOB':
				  $dataType = ' BLOB ';
			break;
			case 'MEDIUMTEXT':
				  $dataType = ' MEDIUMTEXT ';
			break;
			case 'MEDIUMBLOB':	
				  $dataType = ' MEDIUMBLOB ';
			break;
			case 'LONGTEXT':
				  $dataType = ' LONGTEXT ';
			break;
			case 'LONGBLOB':
				  $dataType = ' LONGBLOB ';
			break;
			case 'TINYINT':	//(size)
				  if($size !== null){
					 $dataType = ' TINYINT ('.$size.')';
				  } else {
					 Msg::_throw('E','C','003',$type);
				  }
			break;
			case 'SMALLINT':	//(size)
				  if($size !== null){
					 $dataType = ' SMALLINT ('.$size.')';
				  } else {
					 Msg::_throw('E','C','003',$type);
				  }
			break;
			case 'MEDIUMINT':	//(size)
				  if($size !== null){
					 $dataType = ' MEDIUMINT ('.$size.')';
				  } else {
					  Msg::_throw('E','C','003',$type);
				  }
			break;
			case 'INT':  //(size)
				  if($size !== null){
					 $dataType = ' INT ('.$size.')';
				  } else {
					  Msg::_throw('E','C','003',$type);
				  }
			break;
			case 'BIGINT':	//(size)
				  if($size !== null){
					 $dataType = ' BIGINT ('.$size.')';
				  } else {
					  Msg::_throw('E','C','003',$type);
				  }
			break;
			case 'FLOAT':	//(size,d)
				  if($size !== null && $decimal !== null){
					 $dataType = ' FLOAT ('.$size.','.$decimal.')';
				  } else {
					  Msg::_throw('E','C','004',$type);
				  }
			break;
			case 'DOUBLE':	//(size,d)
				  if($size!== null && $decimal !== null){
					 $dataType = ' DOUBLE ('.$size.','.$decimal.')';
				  } else {
					  Msg::_throw('E','C','004',$type);
				  }
			break;
			case 'DECIMAL':	//(size,d)
				  if($size !== null && $decimal !== null){
					 $dataType = ' DECIMAL ('.$size.','.$decimal.')';
				  } else {
					 Msg::_throw('E','C','004',$type);
				  }
			break;
		    case 'DATE':
				  $dataType = ' DATE ';
			break;
			case 'DATETIME':
				  $dataType = ' DATETIME ';
			break;
			case 'TIMESTAMP':
				  $dataType = ' TIMESTAMP ';
			break;
			case 'TIME':	
				  $dataType = ' TIME ';
			break;
			case 'YEAR':
				  $dataType = ' YEAR ';
			break;
			case 'REAL':	
				  $dataType = ' REAL ';
			break;
			default: 
				 Msg::_throw('E','C','005',$type);
		 }
		 return field::$_type = $dataType;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function _type($type){
		$typeName = explode('(',$type);
		$name = $typeName[0];
		$name = strtolower($name);

		$size = Utility::get_string_between($type,'(',')');
			$f = explode(',',$size);
			$size = $f[0];
			if(isset($f[1])){
				$decimal = $f[1];
			}

		switch($name){
			case 'i': 
				Field::_datatype('int', $size);
			break;
			case 'c': 
				Field::_datatype('char', $size);
			break;
			case 'vc': 
				Field::_datatype('varchar', $size);
			break;
			case 'd': 
				Field::_datatype('date');
			break;
			default:
				if(isset($decimal)){
					Field::_datatype($name, $size, $decimal);
				} else {
					Field::_datatype($name, $size);
				}
		}		
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function _increment($type){
		Field::$_increment_set = '';
		if(is_array($type) && count($type) == '2'){
			Field::$_increment = $type[0];
			Field::$_increment_limit = $type[1];

			if(is_bool(Field::$_increment)){
				if (Field::$_increment == true || isset(Field::$_increment_limit)){
					if( !isset($param['null']) && $type[0] == true ){
							Field::$_increment_set = ' NOT NULL '; 
					}
					Field::$_increment_set .= ' AUTO_INCREMENT = '.Field::$_increment_limit;
				} 
			} else {
				Msg::_throw('E','F','000');
			}
		} else {
			if( !isset($param['null']) && $type == true ){
				Field::$_increment_set = ' NOT NULL '; 
			}
			if($type == true){
				Field::$_increment_set .= ' AUTO_INCREMENT '; 
			}
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function _constraint($type){
		$type = strtolower($type);
		switch($type){
			case 'not_null': 
				Field::$_constraint = ' NOT NULL ';
				break;
			case 'null': 
				Field::$_constraint = ' NULL ';
				break;
			case 'foreign': 
				Field::$_constraint = ' FOREIGN KEY ';
				break;
			case 'primary': 
				Field::$_constraint = ' PRIMARY KEY ';
				break;
			case 'unique': 
				Field::$_constraint = ' UNIQUE KEY ';
				break;
			default:

		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function _value($type){
		Field::$_value = ' VALUE = "'.$type.'"';
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function _default($type){
		Field::$_default = ' DEFAULT = "'.$type.'"';
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _buildQuery(){
		 $fieldname = strtolower(trim(Field::$_fieldname));

		 $query = $fieldname . ' ';
		 $queue = array();
		 $queue = field::$_queue;
		 foreach($queue as $setOrder){
			switch($setOrder){
				case 'type':		$query .= field::$_type;
									break;
				case 'increment':	$query .= field::$_increment_set;
									break;
				case 'constraint':  $query .= field::$_constraint;
									break;
				case 'value':		$query .= field::$_value;
									break;
				case 'default':		$query .= field::$_defualt;
									break;
			}
		 }
		 
		 return $query;
	 }

}