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
//Msg Class J000

class Join{
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	//$type,$from,$to,$view = array(),$match = array()
	public static function setQuery($param = array()){
		$type = ' ';
		$query = '';
		$selectBuild = '';
		$to = ' ';
		$from = ' ';
		$views = ' ';
		$match = ' ';

        $build = array();
        $build = $param;
		if(!is_array($build)){
			Msg::_throw('E','C','003');
		}

		$from    = $build["from"];
		$to      = $build["to"];
		$views   = $build["views"];
		$match   = $build["match"];

		if(isset($build["type"]) == NULL){
			$type = 'INNER';
		} else {
			$type = $build["type"];
		}

		if($from == NULL){
			Msg::_throw('E','J','000',$from);
		}

		if($to == NULL){
			Msg::_throw('E','J','001',$to);
		}

		if($match == NULL){
			Msg::_throw('E','J','002');
		}

		if(!is_array($views)){
			Msg::_throw('E','J','003');
		}

		if(empty($views)){
			Msg::_throw('E','J','004');
		}

		$type = strToUpper($type);
		switch($type){
			case 'INNER':
				 $type  = 'INNER';
				 break;

			case 'LEFT':
				 $type  = 'LEFT';
				 break;

			case 'RIGHT':
				 $type  = 'RIGHT';
				 break;

			case 'FULL':
				 $type  = 'FULL';
				 break;

			default:
				Msg::_throw('E','J','005');
		}

            /*
			foreach($views as $view){	
				$table = $view['table'];
				if(!is_array($view['columns'])){
					Msg::_throw('E','J','006');
				} else {
					$columns = $view['columns'];
					foreach($columns as $column){
						$selectBuild .= $table.".".$column.", ";
					}
				}
			} */

            foreach($views as $view){
                $vi = explode('-',$view);
                $selectBuild .= $vi[0].".".$vi[1].", ";
            }
		  
			try{
				$selectBuild = rtrim($selectBuild,", ");
				$query = 'SELECT '. $selectBuild . " FROM " . $from . " " . $type . " JOIN " . $to ;
				$query .= " ON " .$from .".". $match. " = " . $to .".". $match; 

                $db = pdo();
				$statement = $db->prepare($query);
				$statement->execute();
				$view = $statement->fetchAll(PDO::FETCH_ASSOC);
				return $view;
			} catch(PDOException $e){
				writeDBLog($e, $query);
			}
	}
}