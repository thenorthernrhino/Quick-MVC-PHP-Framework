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
class CreateDB{
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function run(){
		$con = pdo();
		if(!in_array($db,Query::$_sym)){
		$query = 'CREATE DATABASE "'.$db.'"';
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
}