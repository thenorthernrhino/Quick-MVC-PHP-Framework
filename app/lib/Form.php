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
/****************************** 
 * Form Functions
 ******************************/
/*
 *  Fill out the form
 *  - POST to PHP
 *  - Sanitize 
 *  - Validate 
 *  - Return Data
 *  - Write to Database
 *
 */

class Form
{
	/** @var array $_currentItem the immidiately posted data**/
	private $_currentItem = null;
	/** @var array $_postData stores the posted data **/
	private $_postData = array();
	/** @var object $_validator The validator object **/
	private $_validator = array();
 	/** @var object $_error Holds the current forms errors  **/
	private $_error = array();

/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/*
	 *  The Constructor
	 */
	public function __construct(){
		 $this->_validation = new Validator();
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/*
	 *  post - This is to run $_POST 
	 *  @param string $field - The HTML fieldName to post 
	 */
	public function post($field){
		$this->_postData[$field] = $_POST[$field];
		$this->_currentItem = $field;
		return $this;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/*
	 *	fetch - Return the posted data 
	 * 
	 *  @param mixed $fieldName
	 *  @return mixed string or Array 
	 */
	public function fetch($fieldName = false){
		if($fieldName){	
			if(isset($this->_postData[$fieldName])){
				return $this->_postData[$fieldName];
			}
			else {
				return false;
			}
		} 
		
		else { 
			return $this->_postData;
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/*
	 *  validation - This is to validate
	 *  @param string $typeOfValidator A method from the Form/Validation Class
	 *  @param string arg A property to validate against
	 */
	public function validate($typeOfValidator, $arg = null){

		if ($arg == null)
			$error = $this->_validation->{$typeOfValidator}($this->_postData[$this->_currentItem]);
	     else 
			$error = $this->_validation->{$typeOfValidator}($this->_postData[$this->_currentItem], $arg);
		
			if($error)
			$this->_error[$this->_currentItem] = $error;
			
		return $this;
		
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/*
	 *  submit - Handles the form, and throws an exception upon error. 
	 *  @param string $typeOfValidator A method from the Form/Validation Class
	 *  @param string arg A property to validate against
	 */

	public function submit(){
		if(empty($this->_error)){
			return true;
		} else {
			$str = '';
			foreach($this->_error as $key => $value){
				$str .= $key . ' => ' . $value . "\n";
			}
			throw new Exception($str);
		}
	}
}  
?>