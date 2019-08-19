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
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function dbcount($arr = array()){
	if(is_array($arr)){
		$num = count($arr);
		return $num;
	} else {
		return null;
	}
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function sytime($format = "h:i:sa"){
	$time = date($format);
	return $time;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function sydate($format = "Y-m-d"){
	$t = time();
	$date = date($format,$t);
	return $date;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function timestamp($dateformat = "Y-m-d",$timeformat = "H:i:sa", $sparator = ":"){
	$t = time();
	$ts = date($dateformat,$t). $sparator .date($timeformat);
	return $ts;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function getFileStructure($location,$resource = false){
	$result = array();
	if ($handle = opendir($location)) {
		if($resource == true){
			array_push($result,$handle);
		}

		/* This is the correct way to loop over the directory. */
		while (false !== ($entry = readdir($handle))) {
			array_push($result,$entry);
		}

		closedir($handle);
	}
	return $result;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function readFileStructure($location,$reverse = false){
	$result = array();
	if(!empty($location) == true){
		if($result == true){
			$result = scandir($location,1);
		} else {
			$result = scandir($location);
		}
	}
	return $result;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function list_directory($location){
	$result = array();
	$dir = array();
	if(!empty($location) == true){
		if($result == true){
			$result = scandir($location,1);
		} else {
			$result = scandir($location);
		}

		 foreach($result as $res){
			 if(is_dir($location.DS.$res)){
				 array_push($dir,$res);
			 }
		 }
	}

	return $dir;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function list_files($location){
	$result = array();
	$files = array();
	if(!empty($location) == true){
		if($result == true){
			$result = scandir($location,1);
		} else {
			$result = scandir($location);
		}

		 foreach($result as $res){
			 if(is_file($location.DS.$res)){
				 array_push($files,$res);
			 }
		 }
	}
	return $files;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function read_file($location){
	$file_content = file($location);
	return $file_content;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function read_file_content($location){
	$file_content = file_get_contents($location);
	return $file_content;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function session($name){
	if(isset($_SESSION) == true){
		$variable = $_SESSION[$name];
		return $variable;
	} else {
		return null; 
	}
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function json($arr = array()){
	if(is_array($arr) == true){
		return json_encode($arr);
	} else {
		return null;
	}
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isAssoc(array $arr){
    if (array() === $arr) return false;
    return array_keys($arr) !== range(0, count($arr) - 1);
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function array_sort($array, $opt = null, $by = null){
	$ret = array();
	if(isAssoc($array) == true){
		switch(strtolower($opt)){
			case 'ascending':
					if($by == 'value'){
						$ret = asort($array);
					} else if ($by == 'key'){
						$ret = ksort($array);
					} else {
						$ret = ksort($array);
					}
					break;
			case 'descending':
					if($by == 'value'){
						$ret = arsort($array);
					} else if ($by == 'key'){
						$ret = krsort($array);
					} else {
						$ret = krsort($array);
					}
					break;
			default:
				$ret = ksort($array);
		}
	} else {
		switch(strtolower($opt)){
			case 'ascending':
					$ret = sort($array);
					break;	
			case 'descending':
					$ret = rsort($array);
					break;	
			default:
				$ret = sort($array);
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
function arfind($array,$where,$value){
	if(isAssoc($array)){
		$key = array_search($where, array_column($array,$value));
		return $key;
	} else {
		return null;
	}
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function arintersect($array1,$array2){
	$r = array_intersect($array1,$array2);
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function ardifference($array1,$array2){
	$r = array_diff($array1,$array2);
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function arunique($array1,$array2){
	$r = array_unique(array_merge($array1, $array2));
	return $r;
}

