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
//Msg Class U000.
/*
	Wild Card Searches.
	WHERE City LIKE 'ber%';
	WHERE City LIKE '%es%';
	WHERE City LIKE '_erlin';
	WHERE City LIKE 'L_n_on';
	WHERE City LIKE '[bsp]%';
	WHERE City LIKE '[a-c]%';
	WHERE City LIKE '[!bsp]%';
	WHERE City NOT LIKE '[bsp]%';
*/

 class Update{
     private static $_into;
     private static $_where;
     private static $_and;
     private static $_or;
     private static $_set;
     private static $_query;
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
					case 'set':
						  Self::_set($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'where':
						  Self::_where($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'and':
						  Self::_and($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'or':
						  Self::_or($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					default:
						Msg::_throw('E','C','000',$key);
				}

			}
		}
		update::$_queue = $queue;
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
			Msg::_throw('E','C','001',$into);
		}

		if($into !== NULL){
			update::$_into = '`'.trim($into).'`';
			update::$_table = trim($into);
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
	 private static function _set($set){
		 $elements = '';
			$set['modified'] = Timestamp::setTime();
			if(is_array($set)){
				foreach($set as $key => $value){ 
					$setKey = '`'.$key.'`';
					$setValue = '"'.$value.'"';				
					$elements .= $setKey.' = '. $setValue.', '; 
				}
				$elements = rtrim($elements,', ');
				$query = ' SET '.$elements.' ';
			} else {
				Msg::_throw('E','C','003');
			}
			update::$_set = $query ;
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _where($where){
		if(!empty($where)){
				$whereBuild = ' WHERE ';
				$where = explode(' ',$where);
				$where = array_clean($where);
				foreach($where as $element){
					$element = strtolower(trim($element));
					switch($element){
						case 'and' : 
							         $whereBuild .= ' AND ';
									 break;
						case 'or' :
							         $whereBuild .= ' OR ';
									 break;
						case '(' :
							         $whereBuild .= ' ( ';
									 break;
						case ')' :
							         $whereBuild .= ' ) ';
									 break;		
						case '=' : 
							         $whereBuild .= ' = ';
									 break;
						case '<' :
							         $whereBuild .= ' < ';
									 break;
						case '>' :
							         $whereBuild .= ' > ';
									 break;
						case '<=' :
							         $whereBuild .= ' <= ';
									 break;	
						case '>=' :
							         $whereBuild .= ' >= ';
									 break;	
						case 'lt' :
							         $whereBuild .= ' < ';
									 break;	
						case 'gt' :
							         $whereBuild .= ' > ';
									 break;	
						case 'le' :
							         $whereBuild .= ' >= ';
									 break;	
						case 'ge' :
							         $whereBuild .= ' <= ';
									 break;	
						case 'eq' :
							         $whereBuild .= ' = ';
									 break;	
						case 'ne' :
							         $whereBuild .= ' != ';
									 break;
						case '<>' :
							         $whereBuild .= ' != ';
									 break;	
						case '!=':
							         $whereBuild .= ' != ';
									 break;	
						case 'like':
							         $whereBuild .= ' LIKE ';
									 break;	
						case '!like':
							         $whereBuild .= ' NOT LIKE ';
									 break;
						case 'in':
							         $whereBuild .= ' IN ';
									 break;
						case 'not':
							         $whereBuild .= ' NOT ';
									 break;
						default: 
									if(Query::is_field(update::$_table,$element)){
										$whereBuild .= '`'.$element.'`';
									} else if(in_array($element,update::$_sym)){
										$whereBuild .= $element;
									} else {
										$whereBuild .= '"'.$element.'"';
									}
					}
				}
				update::$_where = $whereBuild;
		}

	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _and($and){
		if(!empty($and)){
				$andBuild = ' AND ';
				$and = explode(' ',$and);
				$and = Utility::array_clean($and);
				foreach($and as $element){
					$element = strtolower(trim($element));
					switch($element){
						case 'and' : 
							         $andBuild .= ' AND ';
									 break;
						case 'or' :
							         $andBuild .= ' OR ';
									 break;
						case '(' :
							         $andBuild .= ' ( ';
									 break;
						case ')' :
							         $andBuild .= ' ) ';
									 break;		
						case '=' : 
							         $andBuild .= ' = ';
									 break;
						case '<' :
							         $andBuild .= ' < ';
									 break;
						case '>' :
							         $andBuild .= ' > ';
									 break;
						case '<=' :
							         $andBuild .= ' <= ';
									 break;	
						case '>=' :
							         $andBuild .= ' >= ';
									 break;	
						case 'lt' :
							         $andBuild .= ' < ';
									 break;	
						case 'gt' :
							         $andBuild .= ' > ';
									 break;	
						case 'le' :
							         $andBuild .= ' >= ';
									 break;	
						case 'ge' :
							         $andBuild .= ' <= ';
									 break;	
						case 'eq' :
							         $andBuild .= ' = ';
									 break;	
						case 'ne' :
							         $andBuild .= ' != ';
									 break;
						case '<>' :
							         $andBuild .= ' != ';
									 break;	
						case '!=':
							         $andBuild .= ' != ';
									 break;	
						case 'like':
							         $andBuild .= ' LIKE ';
									 break;	
						case '!like':
							         $andBuild .= ' NOT LIKE ';
									 break;	
						case 'in':
							         $andBuild .= ' IN ';
									 break;
						case 'not':
							         $andBuild .= ' NOT ';
									 break;
						default: 
									if(Query::is_field(update::$_table,$element)){
										$andBuild .= '`'.$element.'`';
									} else if(in_array($element,update::$_sym)){
										$andBuild .= $element;
									} else {
										$andBuild .= '"'.$element.'"';
									}
					}
				}
				update::$_and = $andBuild;
		}
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _or($or){
		if(!empty($or)){
			    $orBuild = ' OR ';
				$or = explode(' ',$or);
				$or = Utility::array_clean($or);
				foreach($or as $element){
					$element = strtolower(trim($element));
					switch($element){
						case 'and' : 
							         $orBuild .= ' AND ';
									 break;
						case 'or' :
							         $orBuild .= ' OR ';
									 break;
						case '(' :
							         $orBuild .= ' ( ';
									 break;
						case ')' :
							         $orBuild .= ' ) ';
									 break;		
						case '=' : 
							         $orBuild .= ' = ';
									 break;
						case '<' :
							         $orBuild .= ' < ';
									 break;
						case '>' :
							         $orBuild .= ' > ';
									 break;
						case '<=' :
							         $orBuild .= ' <= ';
									 break;	
						case '>=' :
							         $orBuild .= ' >= ';
									 break;	
						case 'lt' :
							         $orBuild .= ' < ';
									 break;	
						case 'gt' :
							         $orBuild .= ' > ';
									 break;	
						case 'le' :
							         $orBuild .= ' >= ';
									 break;	
						case 'ge' :
							         $orBuild .= ' <= ';
									 break;	
						case 'eq' :
							         $orBuild .= ' = ';
									 break;	
						case 'ne' :
							         $orBuild .= ' != ';
									 break;
						case '<>' :
							         $orBuild .= ' != ';
									 break;	
						case '!=':
							         $orBuild .= ' != ';
									 break;	
						case 'like':
							         $orBuild .= ' LIKE ';
									 break;	
						case '!like':
							         $orBuild .= ' NOT LIKE ';
									 break;
						case 'in':
							         $orBuild .= ' IN ';
									 break;
						case 'not':
							         $orBuild .= ' NOT ';
									 break;
						default: 
									if(Query::is_field(update::$_table,$element)){
										$orBuild .= '`'.$element.'`';
									} else if(in_array($element,update::$_sym)){
										$orBuild .= $element;
									} else {
										$orBuild .= '"'.$element.'"';
									}
					}
				}
				update::$_or = $orBuild;
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
		 $query = 'UPDATE ';
		 $queue = array();
		 $queue = update::$_queue;
		 foreach($queue as $setOrder){
			$order = strtolower(trim($setOrder));
			switch($setOrder){
				case 'into':    $query .= update::$_into;
								break;
				case 'set':     $query .= update::$_set;
								break;
				case 'where':   $query .= update::$_where;
								break;
				case 'and':     $query .= update::$_and;
								break;
				case 'or':      $query .= update::$_or;
								break;
			}
		 }
		 return $query;
	 }
 }