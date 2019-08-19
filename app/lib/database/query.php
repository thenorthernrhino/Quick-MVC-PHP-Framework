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
//Techincal Information 
//Msg Class: Q000

class Query{
	private static $_sym = array(',','"','[',']','{','}','?','/','`',';',':','-','+',
								 '_','|','\\','*','@','!','#','$','%','^','&','(',')','<','>','.');
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function is_field($table,$field,$fetchMode = PDO::FETCH_ASSOC){
		$con = pdo();
		if(!in_array($field,Query::$_sym)){
		$query = 'SELECT * FROM information_schema.COLUMNS  WHERE TABLE_NAME = "'.$table.'" AND 
		TABLE_SCHEMA = "'.config::get('database_credits/database').'" AND COLUMN_NAME = "'.$field.'"';
			try{
				if($db = $con->prepare($query)){
					if($db->execute()){
						$result = $db->fetchAll($fetchMode);
						if(count($result) > 0){
							return true;
						} else return false;
					}
				} 
			} catch(PDOException $e){ writeDBLog($e, $query); }
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function is_table($table,$fetchMode = PDO::FETCH_ASSOC){
		$con = pdo();
		if(!in_array($table,Query::$_sym)){
		$query = 'SELECT * FROM information_schema.COLUMNS WHERE TABLE_NAME = "'.$table.'" AND TABLE_SCHEMA = "'.config::get('database_credits/database').'"';
			try{
				if($db = $con->prepare($query)){
					if($db->execute()){
						$result = $db->fetchAll($fetchMode);
						if(count($result) > 0){
							return true;
						} else return false;
					}
				} 
			} catch(PDOException $e){ writeDBLog($e, $query); }
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function is_db($db,$fetchMode = PDO::FETCH_ASSOC){
		$con = pdo();
		if(!in_array($db,Query::$_sym)){
		$query = 'SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = "'.$db.'"';
			try{
				if($db = $con->prepare($query)){
					if($db->execute()){
						$result = $db->fetchAll($fetchMode);
						if(count($result) > 0){
							return true;
						} else return false;
					}
				} 
			} catch(PDOException $e){ writeDBLog($e, $query); }
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function forceCreateDB($db,$fetchMode = PDO::FETCH_ASSOC){
		$con = pdo();
		if(!in_array($db,Query::$_sym)){
		$query = 'CREATE DATABASE IF NOT EXISTS "'.$db.'"';
			try{
				if($db = $con->prepare($query)){
					if($db->execute()){
						$result = $db->fetchAll($fetchMode);
						if(count($result) > 0){
							return true;
						} else return false;
					}
				} 
			} catch(PDOException $e){ writeDBLog($e, $query); }
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function checkKeywords($query,$array){
		switch($query){
	
			case 'select':
							if(array_key_exists('columns',$array) == false){
								Msg::_throw('E','Q','000','SELECT: columns/upto');
							} 

							if(array_key_exists('from',$array) == false){
								Msg::_throw('E','Q','000','SELECT: from');
							}
							break; 

			case 'update':
							if(array_key_exists('set',$array) == false){
								Msg::_throw('E','Q','000','UPDATE: set');
							} 
							break;

			case 'delete':
							if(array_key_exists('from',$array) == false){
								Msg::_throw('E','Q','000','DELETE: from');
							} 
							break;

			case 'insert':
							if(array_key_exists('into',$array) == false){
								Msg::_throw('E','Q','000','INSERT: into');
							} 

							if(array_key_exists('values',$array) == false){
								Msg::_throw('E','Q','000','INSERT: set');
							} 
							break;

			case 'alter':
							if(array_key_exists('table',$array) == false){
								Msg::_throw('E','Q','000','ALTER: table');
							} 

							if(array_key_exists('field',$array) == false){
								Msg::_throw('E','Q','000','ALTER: field');
							} 

							if(array_key_exists('operation',$array) == false){
								Msg::_throw('E','Q','000','ALTER: operation');
							} 

							if(array_key_exists('type',$array) == false){
								Msg::_throw('E','Q','000','ALTER: type');
							} 
							break;

			case 'join':
							if(array_key_exists('from',$array) == false){
								Msg::_throw('E','Q','000','JOIN: from');
							} 

							if(array_key_exists('to',$array) == false){
								Msg::_throw('E','Q','000','JOIN: to');
							} 

							if(array_key_exists('views',$array) == false ){
								Msg::_throw('E','Q','000','JOIN: view');
							} 

							if(array_key_exists('match',$array) == false){
								Msg::_throw('E','Q','000','JOIN: match');
							} 
							break;
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function checkSyntax($query,$array){
		switch($query){

				case 'select': 
								if(array_search('columns', array_keys($array)) != '0' || array_search('top', array_keys($array)) != '0' ){
									Msg::_throw('E','Q','001','SELECT: \'columns\'');
								}

								if(array_search('from', array_keys($array)) != '1'){
									Msg::_throw('E','Q','001','SELECT: \'from\'');
								}
								
								if(in_array('where',$array) == true){
									if(array_search('where', array_keys($array)) != '2'){
										Msg::_throw('E','Q','001','SELECT: \'where\'');
									}
								}
								break; 

				case 'update':
								if(array_search('into', array_keys($array)) != '0'){
									Msg::_throw('E','Q','001','UPDATE: \'into\'');
								}

								if(array_search('set', array_keys($array)) != '1'){
									Msg::_throw('E','Q','001','UPDATE: \'set\'');
								}
								
								if(in_array('where',$array) == true){
									if(array_search('where', array_keys($array)) != '2'){
										Msg::_throw('E','Q','001','UPDATE: \'where\'');
									}
								}
								break;

				case 'delete':
								if(array_search('from', array_keys($array)) != '0'){
									Msg::_throw('E','Q','001','DELETE: \'from\'');
								}
								
								if(in_array('where',$array) == true){
									if(array_search('where', array_keys($array)) != '2'){
										Msg::_throw('E','Q','001','DELETE: \'where\'');
									}
								}
								break;

				case 'insert':
								if(array_search('into', array_keys($array)) != '0'){
									Msg::_throw('E','Q','001','INSERT: \'into\'');
								}

								if(array_search('set', array_keys($array)) != '0'){
									Msg::_throw('E','Q','001','INSERT: \'set\'');
								}
								break;

				case 'alter':
								if(array_search('table', array_keys($array)) != '0'){
									Msg::_throw('E','Q','001','ALTER: \'table\'');
								}

								if(array_search('field', array_keys($array)) != '1'){
									Msg::_throw('E','Q','001','ALTER: \'field\'');
								}	

								if(array_search('operation', array_keys($array)) != '2'){
									Msg::_throw('E','Q','001','ALTER: \'operation\'');
								}

								if(array_search('type', array_keys($array)) != '3'){
									Msg::_throw('E','Q','001','ALTER: \'type\'');
								}
								break;

				case 'join': 
								if(array_search('from', array_keys($array)) != '0'){
									Msg::_throw('E','Q','001','JOIN: \'from\'');
								}

								if(array_search('to', array_keys($array)) != '1'){
									Msg::_throw('E','Q','001','JOIN: \'to\'');
								}
                
                                if(array_search('match', array_keys($array)) != '2'){
									Msg::_throw('E','Q','001','JOIN: \'match\'');
								}
                
								if(array_search('views', array_keys($array)) != '3'){
									Msg::_throw('E','Q','001','JOIN: \'view\'');
								}

								
								break;
		}
	}
}