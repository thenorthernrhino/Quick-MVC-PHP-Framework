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
//Msg Class S000.
/*
	Wild Card Searches.
	SELECT * FROM Customers WHERE City LIKE 'ber%';
	SELECT * FROM Customers WHERE City LIKE '%es%';
	SELECT * FROM Customers WHERE City LIKE '_erlin';
	SELECT * FROM Customers WHERE City LIKE 'L_n_on';
	SELECT * FROM Customers	WHERE City LIKE '[bsp]%';
	SELECT * FROM Customers WHERE City LIKE '[a-c]%';
	SELECT * FROM Customers WHERE City LIKE '[!bsp]%';
	SELECT * FROM Customers WHERE City NOT LIKE '[bsp]%';
*/

 class Select{
	 private static $_columns;
     private static $_from;
     private static $_where;
     private static $_and;
     private static $_or;
     private static $_query;
     private static $_table;
     private static $_limit;
     private static $_order;
     private static $_offset;
     private static $_top;
     private static $_between;
	 private static $_queue = array();
	 private static $_sym = array(',','"');
	//Other Functions
     private static $_max;
     private static $_min;    
	 private static $_round;
	 private static $_avg;
	 private static $_sum;
	 private static $_count;
	 private static $_groupBy;
	 private static $_having;
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
					case 'columns':
						  Self::_column($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'top':
						  Self::_top($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'from':
						  Self::_from($value);
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
					case 'limit':
						  Self::_limit($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'offset':
						  Self::_offset($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'order':
						  Self::_order($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'between':
						  Self::_between($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
				    // Other Functions
					case 'max':
						  Self::_max($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'min':
						  Self::_min($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'avg':
						  Self::_avg($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'round':
						  Self::_round($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'sum':
						  Self::_sum($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'count':
						  Self::_count($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'groupBy':
						  Self::_groupBy($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					case 'having':
						  Self::_having($value);
					      $queue[$i] = $key;
				          $i = $i + 1;
					break;
					default:
						Msg::_throw('E','C','000',$key);
				}

			}
		}
		select::$_queue = $queue;
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
	 private static function _column($columns){
		 $selectColumn = '';
		 if(isset($columns) == true){
			 if(is_array($columns)){
				foreach($columns as $column){
					$selectColumn .= '`'.$column.'`' . ', ';
				}
				select::$_columns = rtrim($selectColumn,', ');
			 } 
             else { select::$_columns = '*'; }
	     }
     }

	 private static function _from($from){
		if(!Query::is_table($from)){
			Msg::_throw('E','C','001',$from);
		}
		if($from !== NULL){
			select::$_from = ' FROM `'.trim($from).'`';
			select::$_table = trim($from);
		} else {
			Msg::_throw('E','C','002',$from);
		}
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
									if(Query::is_field(select::$_table,$element)){
										$whereBuild .= '`'.$element.'`';
									} else if(in_array($element,select::$_sym)){
										$whereBuild .= $element;
									} else {
										$whereBuild .= '"'.$element.'"';
									}
					}
				}
				select::$_where = $whereBuild;
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
				$and = array_clean($and);
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
									if(Query::is_field(select::$_table,$element)){
										$andBuild .= '`'.$element.'`';
									} else if(in_array($element,select::$_sym)){
										$andBuild .= $element;
									} else {
										$andBuild .= '"'.$element.'"';
									}
					}
				}
				select::$_and = $andBuild;
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
				$or = array_clean($or);
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
									if(Query::is_field(select::$_table,$element)){
										$orBuild .= '`'.$element.'`';
									} else if(in_array($element,select::$_sym)){
										$orBuild .= $element;
									} else {
										$orBuild .= '"'.$element.'"';
									}
					}
				}
				select::$_or = $orBuild;
		}
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _limit($limit){
		 if(!empty($limit)){
			$query = 'LIMIT ';
			if(is_numeric($limit)){
				$query .= ' "'.$limit.'" ';
			} else {
				Msg::_throw('E','S','000','LIMIT');
			}
		}
		select::$_limit = $query;
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _offset($offset){
		 if(!empty($offset)){
			$query = 'OFFSET ';
			if(is_numeric($offset)){
				$query .= ' "'.$offset.'" ';
			} else {
				Msg::_throw('E','S','000','OFFSET');
			}
		}
		select::$_offset = $query;
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _top($top){
		 if(!empty($top)){
		 $query = 'TOP ';
			if(is_numeric($top)){
				$query .= $top.' * ';
			} else if(strpos($top, '%')){
				$query .= $top.' PERCENT ';
			}
			else {
				Msg::_throw('E','S','000','OFFSET');
			}
		}
		select::$_top = $query;
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _between($between){
		 if(!empty($between)){
		 $query = ' BETWEEN ';
			if(is_array($between) && count($between) == '3'){
				$query .= "`".$between[0].'` '.$between[1].' AND '.$between[2];
			} else {
				Msg::_throw('E','S','000','BETWEEN');
			}
		}
		select::$_between = $query;
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _order($order){
	  if(is_array($order)){
		 $query = 'ORDER BY ';
			foreach($order as $elements){
				$element = explode(' ',$elements);
				$element = array_clean($element);
				
				switch($element[1]){
						case 'ASC':
									if(Query::is_field(select::$_table,$element[0])){
										$query .= $element[0].' ASC ';
									} else {
										Msg::_throw('E','F','000',$element[0]);
									}
									break;

						case 'DESC':
									if(Query::is_field(select::$_table,$element[0])){
										$query .= $element[0].' DESC ';
									} else {
										Msg::_throw('E','F','000',$element[0]);
									}
									break; 
				}
			}
			 $query .= ', ';
		} else {
			Msg::_throw('E','S','002');
		}
		$query .= rtrim($query,', ');
		select::$_order = $query;
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _max($max){
		select::$_max = ' MAX('.$max.')';
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _min($min){
		select::$_min = ' MIN('.$min.')';
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _sum($sum){
		select::$_sum = ' SUM('.$sum.')';
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _avg($avg){
		select::$_avg = ' AVG('.$avg.')';
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _round($round){
		if($round = explode(',',$round)){
			select::$_round = ' ROUND('.$round[0].','.$round[1].')';
		} else {
			Msg::_throw('E','S','003');
		}
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _count($count){
			select::$_count = ' COUNT('.$count.')';
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _groupBy($groupby){
			select::$_count = ' GROUP BY '.$groupby;
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _having($having){
			select::$_count = ' HAVING '.$having;
	 }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 private static function _buildQuery(){
		 $query = 'SELECT ';
		 $queue = array();
		 $queue = select::$_queue;
		
		 foreach($queue as $setOrder){
			$order = strtolower(trim($setOrder));
			
			switch($setOrder){
				case 'columns': $query .= select::$_columns;
								break;
				case 'top':     $query .= select::$_top;
								break;
				case 'from':    $query .= select::$_from;
								break;
				case 'where':   $query .= select::$_where;
								break;
				case 'and':     $query .= select::$_and;
								break;
				case 'or':      $query .= select::$_or;
								break;
				case 'limit':   $query .= select::$_limit;
								break;
				case 'offset':  $query .= select::$_offset;
								break;
				case 'order':   $query .= select::$_order;
								break;
				case 'between': $query .= select::$_between;
								break;
				//Other Functions 
				case 'max':     $query .= select::$_max;
								break;
				case 'min':     $query .= select::$_min;
								break;
				case 'sum':     $query .= select::$_sum;
								break;
				case 'avg':     $query .= select::$_avg;
								break;
				case 'round':   $query .= select::$_round;
								break;
				case 'count':   $query .= select::$_count;
								break;
				case 'groupby': $query .= select::$_groupBy;
								break;
				case 'having':  $query .= select::$_having;
								break;
			}
		 }
		 return $query;
	 }
 }