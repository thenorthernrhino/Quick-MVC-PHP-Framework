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
class Page {
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/**
	 * resolves a virtual path into an absolute path
	 */

    public static function UrlContent($path, $sub='views'){
        if(self::startsWith($path, '~')){
			$path = str_replace('/', DS, $path);
			$appPath = SRC_PATH . $sub . (self::startsWith($path, '~/') ? '' : DS);
			$result = str_replace('~', $appPath, $path);
			$result = str_replace(DS.DS, DS, $result);
			//die($result);
            return $result;
        }else{
            return $path;
        }
    }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	 public static function startsWith($haystack, $needle) {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function endsWith($haystack, $needle){
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        $start  = $length * -1; //negative
        return (substr($haystack, $start) === $needle);
    }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function trimStart($prefix, $string) {
        
        if (substr($string, 0, strlen($prefix)) == $prefix) {
            $string = substr($string, strlen($prefix), strlen($string));
        }
        
        return $string; 
    }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public static function trimEnd($suffix, $string) {        
        if (substr($string, (strlen($suffix) * -1)) == $suffix) {
            $string = substr($string, 0, strlen($string) - strlen($suffix));
        }  
        return $string; 
    }

}