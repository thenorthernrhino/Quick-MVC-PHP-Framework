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
//Msg Class A000.

 class Alter{
     private static $_table;
     private static $_gtable;
     private static $_field;
     private static $_opr;
     private static $_type;
     private static $_length;
     private static $_add;
     private static $_drop;
     private static $_after;
     private static $_decimal;
     private static $_query;
     private static $_null;
	 private static $_queue = array();
	 private static $_sym = array(',','"');
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 public static function setQuery($param = array()){	
		if(!empty($param) && is_array($param)){	
			$i = 0;
		    $queue = array();
			foreach($param as $key => $value){
				$key = strtolower($key);

				switch($key){
					case 'field':
						  Self::_field($param['field']);
					break;
					case 'operation':
						  Self::_opr($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'table':
						  Self::_table($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'after':
						  Self::_after($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'drop':
						  Self::_after($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'add':
						  Self::_after($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'type':
						  Self::_type($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'key':
						  Self::_key($param['key']);
					break;
					case 'null':
						  Self::_null($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					default:
						  Msg::_throw('E','C','000',$key);
					
				}

			}
		}

		alter::$_queue = $queue;
		$q = self::_buildQuery();
		return $q;
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _table($table){
		if(Query::is_table($table) == false){
			Msg::_throw('E','C','001',$table);
		}

		if($table !== NULL){
			alter::$_table = '`'.trim($table).'`';
			alter::$_gtable = trim($table);
		} else {
			Msg::_throw('E','A','000');
		}
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _opr($opr){
		 $oprBuild = '';
		 switch(strtolower(trim($opr))){
			 case 'add':
				 if(isset(alter::$_key)){
					 $key  = strtolower(alter::$_key);
					 switch($key){
						 case 'primary':
							   $oprBuild = ' ADD PRIMARY KEY ('.alter::$_field.')';
						 break;
						 case 'unique':
							   $oprBuild = ' ADD UNIQUE KEY ('.alter::$_field.')';
						 break;
						 case 'index':
							   $oprBuild = ' ADD INDEX KEY ('.alter::$_field.')';
						 break;
					 }	
				 } else {
					$oprBuild = ' ADD '.alter::$_field;
				 }
			 break;
			 case 'drop': 
					$oprBuild = ' DROP '.alter::$_field;
			 break;
			 case 'change':
					$oprBuild = ' CHANGE '.alter::$_field;
			 break;
			 default: 
				 Msg::_throw('E','A','001',$opr);
		 }
		alter::$_opr = $oprBuild;
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

		$size = get_string_between($type,'(',')');
			$f = explode(',',$size);
			$size = $f[0];
			if(isset($f[1])){
				$decimal = $f[1];
			}

		switch($name){
			case 'i': 
				$t = alter::_datatype('int', $size);
			break;
			case 'c': 
				$t = alter::_datatype('char', $size);
			break;
			case 'vc': 
				$t = alter::_datatype('varchar', $size);
			break;
			case 'd': 
				$t = alter::_datatype('date');
			break;
			default:
				if(isset($decimal)){
					$t = alter::_datatype($name, $size, $decimal);
				} else {
					$t = alter::_datatype($name, $size);
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
	 private static function _datatype($type, $size = null, $decimal = null){
		switch(strtoupper(trim($type))){
			case 'CHAR':	//(size)
				  if($size !== null){
					 $dataType = ' CHAR ('.$size.')';
				  } else {
					  Msg::_throw('E','C','004',$type);
				  }
			break;
			case 'VARCHAR':	//(size)
				  if($size !== null){
					 $dataType = ' VARCHAR ('.$size.')';
				  } else {
					  Msg::_throw('E','C','004',$type);
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
					  Msg::_throw('E','C','004',$type);
				  }
			break;
			case 'SMALLINT':	//(size)
				  if($size !== null){
					 $dataType = ' SMALLINT ('.$size.')';
				  } else {
					  Msg::_throw('E','C','004',$type);
				  }
			break;
			case 'MEDIUMINT':	//(size)
				  if($size !== null){
					 $dataType = ' MEDIUMINT ('.$size.')';
				  } else {
					  Msg::_throw('E','C','004',$type);
				  }
			break;
			case 'INT':  //(size)
				  if($size !== null){
					 $dataType = ' INT ('.$size.')';
				  } else {
					  Msg::_throw('E','C','004',$type);
				  }
			break;
			case 'BIGINT':	//(size)
				  if($size !== null){
					 $dataType = ' BIGINT ('.$size.')';
				  } else {
					  Msg::_throw('E','C','004',$type);
				  }
			break;
			case 'FLOAT':	//(size,d)
				  if($size !== null && $decimal !== null){
					 $dataType = ' FLOAT ('.$size.','.$decimal.')';
				  } else {
					  Msg::_throw('E','C','005',$type);
				  }
			break;
			case 'DOUBLE':	//(size,d)
				  if($size!== null && $decimal !== null){
					 $dataType = ' DOUBLE ('.$size.','.$decimal.')';
				  } else {
					  Msg::_throw('E','C','005',$type);
				  }
			break;
			case 'DECIMAL':	//(size,d)
				  if($size !== null && $decimal !== null){
					 $dataType = ' DECIMAL ('.$size.','.$decimal.')';
				  } else {
					  Msg::_throw('E','C','005',$type);
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
				Msg::_throw('E','C','006',$type);
		 }
		 return alter::$_type = $dataType;
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _field($field){
			alter::$_field = '`'.$field.'`';
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _after($after){
			alter::$_after = ' AFTER `'.$after.'`';
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _key($key){
			alter::$_key = $key;	 
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _add($add){
			$iadd = explode('.',$add);
			alter::$_add = ' '.$iadd[0].' '.$iadd[1] ;	 
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _drop($drop){
			alter::$_drop = ' DROP ' . $drop;	 
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _null($null){
		 if(is_bool($null)){
			 if( $null == false ){
				alter::$_null = ' NOT NULL ';
			 } else {
				alter::$_null = ' NULL ';
			 }
		 } else {
			Msg::_throw('E','A','002');
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
		 $query = 'ALTER TABLE ';
		 $queue = array();
		 $queue = alter::$_queue;
		 foreach($queue as $setOrder){
			$order = strtolower(trim($setOrder));
			switch($setOrder){
				case 'table':		$query .= alter::$_table;
									break;
				case 'field':		$query .= alter::$_field;
									break;
				case 'operation':   $query .= alter::$_opr;
									break;
				case 'type':		$query .= alter::$_type;
									break;
				case 'null':		$query .= alter::$_null;
									break;
				case 'after':		$query .= alter::$_after;
									break;
				case 'add':		    $query .= alter::$_add;
									break;
				case 'drop':		$query .= alter::$_drop;
									break;
			}
		 }
		 return $query;
	 }
 }