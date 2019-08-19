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
class URL{
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function go($in = null){
		if(isset($_SERVER['HTTPS'])){
			$http = 'https://';
		}else{
			$http = 'http://';
		}
		if(isset($_GET['url']) == true && !empty($_GET['url'])){
			$e = explode($_GET['url'],$_SERVER['REQUEST_URI']);		
			$base = $http.$_SERVER['HTTP_HOST'].$e[0];
			if($in !== null){
				$base .= $in;
			}
			return $base;
		} else {
			$base = $http.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			if($in !== null){
				$base .= $in;
			}

			return $base;
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function get($name){
		$parts = parse_url($_SERVER['QUERY_STRING']);
		parse_str($parts['path'], $query);
		if(isset($query[$name]) == true){
			return $query[$name];
		} else {
			return false;
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
    public static function base(){
		if(isset($_SERVER['HTTPS'])){
			$http = 'https://';
		}else{
			$http = 'http://';
		}
        if(!empty($_GET['url'])){	
            $e = explode($_GET['url'],$_SERVER['REQUEST_URI']);
            $base = $http.$_SERVER['HTTP_HOST'].$e[0];	
		    return $base;
        } else{
            $base = $http.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];	
		    return $base;
        }
    }

/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
    public static function absolute_base(){
		if(isset($_SERVER['HTTPS'])){
			$http = 'https://';
		}else{
			$http = 'http://';
		}
        if(!empty($_GET['url'])){	
            $e = explode($_GET['url'],$_SERVER['REQUEST_URI']);
            $base = $http.$_SERVER['HTTP_HOST'].$e[0];	
		    return $base;
        } else{
            $base = $http.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];	
		    return $base;
        }


    }
}
