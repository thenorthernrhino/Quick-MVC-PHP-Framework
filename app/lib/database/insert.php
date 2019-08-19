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
//Msg Class: I000

class Insert{
     private static $_into;
     private static $_values;
     private static $_table;
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
					case 'into':
						  Self::_into($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'values':
						  Self::_values($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					default:
						Msg::_throw('E','C','000',$key);
				}

			}
		}
		insert::$_queue = $queue;
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
	 private static function _into($into){
		if(!Query::is_table($into)){
			Msg::_throw('E','C','001',$key);
		}
		if($into !== NULL){
			insert::$_into = ' INTO `'.trim($into).'`';
			insert::$_table = trim($into);
		} else {
			Msg::_throw('E','C','002',$into);
		}
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/	
	 private static function _values($values){;
		 $keys = '';
		 $elements = '';

		 $values['created'] = Timestamp::setTime();
		 $values['modified'] = Timestamp::setTime();

			if(is_array($values)){
				foreach($values as $key => $value){
					$keys .= '`'.$key.'`, '; 
					$elements .= "'".$value."'".', '; 
				}
				$keys   = rtrim($keys,', ');
				$elements = rtrim($elements,', ');
				$query = ' ( '.$keys.' ) VALUES ( '.$elements.' ) ';
			} else {
				Msg::_throw('E','C','003');
			}
			insert::$_values = $query ;
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _buildQuery(){
		 $query = 'INSERT ';
		 $query .= insert::$_into; 
		 $query .= insert::$_values;
		 return $query;
	 }
}