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
//Msg Class : D000

class Database{

	private $_db;
    private $_lid;
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function __construct(){
		try{    
            $this->_db = new PDO(DNS(),Config::get('database_credits/login'),Config::get('database_credits/password'));
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function select($param = array()){
		Query::checkKeywords('select',$param);
		Query::checkSyntax('select',$param);
		$query = Select::setQuery($param);
		$ret = $this->query($query);
		return $ret;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	//Insert
	public function insert($param = array()){
		Query::checkKeywords('insert',$param);
		Query::checkSyntax('insert',$param);
		$this->checkCreateFields($param['into']);
		$query = Insert::setQuery($param);
		$ret = $this->activity($query);
        return $this->_lid;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	//Delete
	public function delete($param = array()){
		Query::checkKeywords('delete',$param);
		Query::checkSyntax('delete',$param);
		$query = Delete::setQuery($param);
		$rec = $this->_deletedRecored($param);
		Exceptions::deleteLog($query,$rec);
		$ret = $this->activity($query);
        return $ret;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	//Update
	public function update($param = array()){
		Query::checkKeywords('update',$param);
		Query::checkSyntax('update',$param);
		$this->checkCreateFields($param['into']);
		$query = Update::setQuery($param);
		$ret = $this->activity($query);
        return $ret;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function alter($param = array()){
		Query::checkKeywords('alter',$param);
		Query::checkSyntax('alter',$param);
		$query = ALter::setQuery($param);
		$this->query($query);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function join($param = array()){
		Query::checkKeywords('join',$param);
		Query::checkSyntax('join',$param);
		$view = Join::setQuery($param);
		return $view;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function createTABLE($table,$param = array(),$check = null){
		$createTable = Table::setQuery($table,$param,$check);
		$this->query($createTable);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function createINDEX($table,$param = array()){
		Query::checkKeywords('createIndex',$param);
		Query::checkSyntax('createIndex',$param);
		$createIndex = Tindex::setQuery($table,$param);
		$this->query($createIndex);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function dropTable($table){
		$drop = drop::setQuery($table);
		$this->query($drop);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function truncate($table){
		$truncate = Truncate::setQuery($table);
		$this->query($truncate);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function avg($table,$column){
		$avg = Avg::setQuery($column,$table);
		$this->query($avg);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function max($table,$column){
		$avg = Max::setQuery($column,$table);
		$this->query($avg);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function min($table,$column){
		$avg = Min::setQuery($column,$table);
		$this->query($avg);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function sum($table,$column){
		$avg = Sum::setQuery($column,$table);
		$this->query($avg);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function round($table,$column){
		$avg = Round::setQuery($column,$table);
		$this->query($avg);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function rename($table,$name){
		$rn = Rename::setQuery($table,$name);
		$this->query($rn);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function query($query){
		try{
			$fetchMode = PDO::FETCH_ASSOC;
			$query = trim($query);
			$statement = $this->_db->prepare($query);
			if($statement->execute()){
				$result = $statement->fetchAll($fetchMode);
				return $result;
			}	
		} catch(PDOException $e){
			writeDBLog($e, $query);
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function activity($query){
		try{
			$fetchMode = PDO::FETCH_ASSOC;
			$query = trim($query);
			$statement = $this->_db->prepare($query);
			$statement->execute();
			if($this->_db->lastInsertId() != NULL){
				$this->_lid = $this->_db->lastInsertId();
			}
		} catch(PDOException $e){
			writeDBLog($e, $query);
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/**
	* insert 
	* @param string $table A name of table to insert into
	* @param string $data An associative array
	**/

	public function push($table,$data){
		$this->checkCreateFields($table);
		try{
				ksort($data);
				$fieldNames  = implode('`,`',array_keys($data));
				$fieldValues = ':'.implode(',:',array_keys($data));
				$DATABASE = config::get('database_credits/database');
				$statement = $this->_db->prepare("INSERT INTO $DATABASE.`$table` (`$fieldNames`)
												  VALUES ($fieldValues)");
				foreach($data as $key => $value){
					$statement->bindValue(":$key", $value);
				}	
				if($statement->execute()){
					return $this->_db->lastInsertId();
				}else {
						echo "\nPDO::errorInfo():\n"; 
						print_r($statement->errorInfo());
				}
		} catch(PDOException $e){
			writeDBLog($e, $statement);
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function changeRecord($table,$data,$where){
		$this->checkCreateFields($table);		
		try{
			ksort($data);
			$fieldDetails  = NULL;
			foreach($data[1] as $key => $value){
				$fieldDetails .= "`$key`='$value',";
			}
			$fieldDetails = rtrim($fieldDetails,',');
			$DATABASE = config::get('database_credits/database'); 
			$statement = $this->_db->prepare("UPDATE `$DATABASE`.`$table` SET $fieldDetails WHERE $where");
			foreach($data as $key => $value){
				$statement->bindValue(":$key", $value);
			}
			$statement->execute();	
		}catch(PDOException $e){
			writeDBLog($e, $statement);
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function remove($table,$data){
		try {
				ksort($data);
				$fieldNames  = implode('`,`',array_keys($data));
				$fieldValues = ':'.implode(',:',array_keys($data));
				$DATABASE = config::get('database_credits/database');
				$statement = $this->_db->prepare("DELETE FROM `$DATABASE`.`$table` WHERE `$table`.`$fieldNames` = $fieldValues" );
				foreach($data as $key => $value){
					$statement->bindParam(":$key", $value, PDO::PARAM_INT);
				}	
				if($statement->execute()){
					return true;
				} else {
					echo "\nPDO::errorInfo():\n"; 
					print_r($statement->errorInfo());
				}
		}catch(PDOException $e){
			writeDBLog($e, $statement);
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	private function checkCreateFields($table){
		if(!Query::is_field($table,'modified')){
			$this->alter([
				'table' => $table,
				'field' => 'modified',
				'operation' => 'add',
				'type'  => 'datetime',
				'null'  => false,
 			]);
		}

		if(!Query::is_field($table,'created')){
			$this->alter([
				'table' => $table,
				'field' => 'created',
				'operation' => 'add',
				'type'  => 'datetime',
				'null'  => false,
 			]);
		}

		if(!Query::is_field($table,'modifiedBy')){
			$this->alter([
				'table' => $table,
				'field' => 'modifiedBy',
				'operation' => 'add',
				'type'    => 'i(11)',
				'null'    => false,
 			]);
		}

		if(!Query::is_field($table,'createdBy')){
			$this->alter([
				'table' => $table,
				'field' => 'createdBy',
				'operation' => 'add',
				'type'    => 'i(11)',
				'null'    => false,
 			]);
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function _deletedRecored($table,$param = array()){
		if(!empty($param['where'])){
			$record = $this->select([
				'columns' => '*',
				'from'	  => $param['from'],
				'where'   => $param['where']
			]);	
			
			deleteLog('DELETE:'.$param,$record);
		} 
	}

}