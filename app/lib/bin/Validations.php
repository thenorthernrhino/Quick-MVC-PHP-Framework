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
/********************************************************************************
Validators
********************************************************************************
** int				    257
** boolean				258
** float				259
** validate_regexp		272
** validate_url			273
** validate_email		274
** validate_ip			275
/********************************************************************************
Sanitizer
/********************************************************************************
** string				513
** stripped				513
** encoded				514
** special_chars		515
** full_special_chars	522
** unsafe_raw			516
** email				517
** url					518
** number_int			519
** number_float			520
** magic_quotes			521
********************************************************************************
Function Call Back
********************************************************************************
** callback				1024
********************************************************************************/
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function maxLength($variable,$max){
		if (filter_var($variable, FILTER_VALIDATE_INT, array("options" => array("max_range"=>$max))) === false) {
			return true;
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
	function minLength($variable,$min){
		if (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min))) === false) {
			return true;
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
	function maxMinLength($variable,$max,$min){
		if (filter_var($variable, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
			return true;
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
	function GetFilterID($filterType){
		if($filterType !== null){
			$filterType = strtolower($filterType);
			return filter_id($filterType);
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
	function filter_int($variable,$opt){
		$var = filter_var($variable, FILTER_VALIDATE_INT, $options = $opt);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_boolean($variable,$opt){
		$var = filter_var($variable, FILTER_VALIDATE_BOOLEAN, $options = $opt);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_float($variable,$opt){
		$var = filter_var($variable, FILTER_VALIDATE_FLOAT, $options = $opt);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_validate_regexp($variable,$opt){
		$var = filter_var($variable, FILTER_VALIDATE_REGEXP, $options = $opt);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_validate_url($variable,$opt){
		$var = filter_var($variable, FILTER_VALIDATE_URL, $options = $opt);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_validate_email($variable,$opt){
		$var = filter_var($variable, FILTER_VALIDATE_EMAIL, $options = $opt);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_validate_ip($variable,$opt){
/*
	FILTER_FLAG_IPV4 - The value must be a valid IPv4 address
	FILTER_FLAG_IPV6 - The value must be a valid IPv6 address
	FILTER_FLAG_NO_PRIV_RANGE - The value must not be within a private range
	FILTER_FLAG_NO_RES_RANGE - The value must not be within a reserved range
*/

		$opt = strtolower($opt);
		switch($opt){
			case 'ipv4':     $o = FILTER_FLAG_IPV4;
						     break;
			case 'ipv6':     $o = FILTER_FLAG_IPV6;
						     break;
			case 'private':  $o = FILTER_FLAG_NO_PRIV_RANGE;
						     break;
			case 'reserved': $o = FILTER_FLAG_NO_RES_RANGE;
						     break;
		}

		$var = filter_var($variable, FILTER_VALIDATE_IP, $o);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_string($variable,$opt){
		$var = filter_var($variable, FILTER_SANITIZE_STRING, $options = $opt);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_encoded($variable,$opt){
		$var = filter_var($variable, FILTER_SANITIZE_ENCODED, $options = $opt);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_special_chars($variable,$opt){
		$var = filter_var($variable, FILTER_SANITIZE_SPECIAL_CHARS, $options = $opt);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_full_special_chars($variable,$opt){
		$var = filter_var($variable, FILTER_SANITIZE_FULL_SPECIAL_CHARS, $options = $opt);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_unsafe_raw($variable,$opt){
		/*
		FILTER_FLAG_STRIP_LOW   - Strip characters with ASCII value below 32
		FILTER_FLAG_STRIP_HIGH  - Strip characters with ASCII value above 32
		FILTER_FLAG_ENCODE_LOW  - Encode characters with ASCII value below 32
		FILTER_FLAG_ENCODE_HIGH - Encode characters with ASCII value above 32
		FILTER_FLAG_ENCODE_AMP  - Encode the & character to &amp;
		*/
		switch($opt){
			case 'stripLow':   $o = FILTER_FLAG_STRIP_LOW;
							   break;
			case 'stripLow':   $o = FILTER_FLAG_STRIP_HIGH;
							   break;
			case 'encodeLow':  $o = FILTER_FLAG_ENCODE_LOW;
							   break;
			case 'encodeHigh': $o = FILTER_FLAG_ENCODE_HIGH;
							   break;
			case 'encodeAmp':  $o = FILTER_FLAG_ENCODE_AMP;
							   break;
		}
		$var = filter_var($variable,$o);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_email($variable,$opt = array()){
		$var = filter_var($variable, FILTER_SANITIZE_EMAIL);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_url($variable,$opt = array()){
		$var = filter_var($variable, FILTER_SANITIZE_URL);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_number_int($variable,$opt = array()){
		$var = filter_var($variable, FILTER_VALIDATE_BOOLEAN);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_number_float($variable,$opt = array()){
		$var = filter_var($variable, FILTER_SANITIZE_NUMBER_FLOAT);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_magic_quotes($variable,$opt = array()){
		$var = filter_var($variable, FILTER_SANITIZE_MAGIC_QUOTES);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function filter_callback($variable,$opt = array()){
		$var = filter_var($variable,FILTER_CALLBACK,$opt);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function xint($int){
		if (filter_var($int, FILTER_VALIDATE_INT) === 0 || !filter_var($int, FILTER_VALIDATE_INT) === false) {
			return true;
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
	function xemail($email){
		// Remove all illegal characters from email
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		// Validate e-mail
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			return true;
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
	function xurl($url,$opt = null){
		// Remove all illegal characters from a url
		$url = filter_var($url, FILTER_SANITIZE_URL);
		
		if($opt == null){
			// Validate url
			if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
				return true;
			} else {
				return false;
			}
		} else {
			$opt = strtolower($opt);
			switch($opt){
				case 'scheme':  $o = FILTER_FLAG_SCHEME_REQUIRED;
								break;
				case 'host':    $o = FILTER_FLAG_HOST_REQUIRED;
								break;
				case 'path':    $o = FILTER_FLAG_PATH_REQUIRED;
								break;
				case 'query':   $o = FILTER_FLAG_QUERY_REQUIRED;
								break;
			}

			if (!filter_var($url, FILTER_VALIDATE_URL,$o) === false) {
				return true;
			} else {
				return false;
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
	function xvariable($type,$variable){
		$type = strtolower($type);
		switch($type){
			case 'get': $input    = INPUT_GET;
						break;
			case 'post': $input   = INPUT_POST;
						break;
			case 'cookie': $input = INPUT_COOKIE;
						break;
			case 'server': $input = INPUT_SERVER;
						break;
			case 'env': $input    = INPUT_ENV;
						break;
		}

		$var = filter_has_var($input,$variable);
		return $var;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function _xinput($type,$filters = array()){
		$type = strtolower($type);
		switch($type){
			case 'get': $input    = INPUT_GET;
						break;
			case 'post': $input   = INPUT_POST;
						break;
			case 'cookie': $input = INPUT_COOKIE;
						break;
			case 'server': $input = INPUT_SERVER;
						break;
			case 'env': $input    = INPUT_ENV;
						break;
		}

		$var = filter_input_array($input, $filters);
		return $var;
	}
/******************************************************************************/
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function xinput($match = array(),$filter = array()){
		$f = '';

		foreach($filter as $key => $value){
			$variable = $key;
			$arri = array();
			$arr = array();

			//Extract Values 
			foreach($value as $index => $opt){
				$index = strtolower(trim($index));
				switch($index){
					case 'filter': 
									switch($opt){
										case 'callback':						$f = FILTER_CALLBACK; 
												 break;
										case 'validate_int':				    $f = FILTER_VALIDATE_INT; 
												 break;
										case 'validate_email':				    $f = FILTER_VALIDATE_EMAIL; 
												 break;
										case 'validate_float':					$f = FILTER_VALIDATE_FLOAT; 
												 break;
										case 'validate_boolean':				$f = FILTER_VALIDATE_BOOLEAN; 
												 break;
										case 'validate_ip':						$f = FILTER_VALIDATE_IP; 
												 break;
										case 'validate_regex':					$f = FILTER_VALIDATE_REGEXP; 
												 break;
										case 'validate_url':					$f = FILTER_VALIDATE_URL; 
												 break;
										case 'sanitize_email':					$f = FILTER_SANITIZE_EMAIL; 
												 break;
										case 'sanitize_encoded':				$f = FILTER_SANITIZE_ENCODED; 
												 break;
										case 'sanitize_magic_quotes':           $f = FILTER_SANITIZE_MAGIC_QUOTES; 
												 break;
										case 'sanitize_float':                  $f = FILTER_SANITIZE_NUMBER_FLOAT; 
												 break;
										case 'sanitize_int':                    $f = FILTER_SANITIZE_NUMBER_INT; 
												 break;
										case 'sanitize_special_chars':          $f = FILTER_SANITIZE_SPECIAL_CHARS; 
												 break;
										case 'sanitize_full_special_chars':     $f = FILTER_SANITIZE_FULL_SPECIAL_CHARS; 
												 break;
										case 'sanitize_string':                 $f = FILTER_SANITIZE_STRING; 
												 break;
										case 'sanitize_stripped':               $f = FILTER_SANITIZE_STRIPPED; 
												 break;
										case 'sanitize_url':                    $f = FILTER_SANITIZE_URL; 
												 break;
									}
									break;

					case 'flag': 
									if(is_string($opt)){
										switch($options){
											case 'force_array':  $f = FILTER_FORCE_ARRAY; 
												     break;
										}
									} else {
										Msg::_throw('E','V','000','FLAG:'.$opt);
									}
									break;

					 case 'options': 
									$f = $opt;								
									break;
				}		
				$arri[$index] = $f;
			} //values
			array_push($arr,$arri);
			$var[$variable] = $arr[0];
		}	
		$ret = filter_var_array($match, $var);
		return $ret;
	}
/********************************************************************************/
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
   	function filter($variable,$variableType,$opt = null){
		$id = GetFilterID($variableType);
		switch($id){
			case '257':
				filter_int($variable,$opt);
				break;
			case '258':
				filter_boolean($variable,$opt);
				break;
			case '259':
				filter_float($variable,$opt);
				break;
			case '272':
				filter_validate_regexp($variable,$opt);	
				break;
			case '273':
				filter_validate_url($variable,$opt);
				break;
			case '274':
				filter_validate_email($variable,$opt);
				break;
			case '275':
				filter_validate_ip($variable,$opt);
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
	function sanitize($variable,$variableType,$opt = null){
			$id = $this->GetFilterID($variableType);
			switch($id){		
				case '513':
					filter_string($variable,$opt);
					break;
				case '514':
					filter_encoded($variable,$opt);
					break;
				case '515':
					filter_special_chars($variable,$opt);
					break;
				case '517':
					filter_email($variable,$opt);
					break;
				case '518':
					filter_url($variable,$opt);
					break;
				case '519':
					filter_number_int($variable,$opt);
					break;
				case '520':
					filter_number_float($variable,$opt);
					break;
				case '521':
					filter_magic_quotes($variable,$opt);
					break;
				case '522':
					filter_full_special_chars($variable,$opt);
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
	function callback($variable,$function){
		//case 1024
		filter_callback($variable,['options' => $function]);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	function unsafe_raw($variable,$opt){
		//case 516
		filter_callback($variable,$opt);
	}
/****************************** XINPUT Example for Filters ************************
$filters = [
  "name" => [
    "filter"=>FILTER_CALLBACK,
    "flags"=>FILTER_FORCE_ARRAY,
    "options"=>"ucwords"
    ],

  "age" => [
    "filter"=>FILTER_VALIDATE_INT,
    "options"=>[
      "min_range"=>1,
      "max_range"=>120
      ]
    ],

  "email"=>[ FILTER_VALIDATE_EMAIL ],
  ];
*********************************************************/