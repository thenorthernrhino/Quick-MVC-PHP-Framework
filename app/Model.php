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
/********************************
Model Functions
*********************************/

class Model extends Database{

	public $host;
	public $uri;
	public $reuqest;
	public $route;
	public $validation;
	public $email;
	public $file;
	public $template;
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
    public function __construct(){
        parent::__construct();
		
		//URI Values;
		$this->host = $_SERVER['HTTP_HOST'];
		$this->uri  = $_SERVER['REQUEST_URI'];
		$this->request = $_SERVER['REQUEST_METHOD']; 
		$this->route = preg_replace('/^url=index.php&url=(.*)/','$1',$_SERVER['QUERY_STRING']);
		$this->file = new files();
		$this->template = new Template();
    }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	//=============================
	// URL/URI FUNCTIONS
	//=============================

	protected function getUrlValues(){
		if($this->request == 'GET' && !empty($this->route) ){
			$result = explode('&',$this->route);
			unset($result[0]);
			$result = array_values($result);
			return $result;
		} elseif($this->request == 'POST'){
			$result = $_POST;
			return $result;
		} else { return NULL; }
	}
}
?>