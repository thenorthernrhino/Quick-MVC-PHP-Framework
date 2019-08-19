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
Controller Functions
*********************************/

class Controller
{
	private $_base;
	private $_modelPath  = 'models';
	protected $validator;
	public $url;
	public $view = '';
	public $host;
	public $uri;
	public $reuqest;
	public $route;
	public $validation;
	public $call_name;
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function __construct(){
		session::init();
		$this->view = new view();

		//URI Values;
		$this->host = $_SERVER['HTTP_HOST'];
		$this->uri  = $_SERVER['REQUEST_URI'];
		$this->request = $_SERVER['REQUEST_METHOD']; 
		$this->route = preg_replace('/^url=index.php&url=(.*)/','$1',$_SERVER['QUERY_STRING']);
		$this->url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
    public function loadModel($name, $modelPath){
        $v_path = SRC_PATH.$modelPath.DS. trim($name) . '_model.php';
        if (file_exists($v_path)) {
            require $v_path;
            $modelName = $name . '_Model';
            $this->model   = new $modelName();
        }
    }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	protected function title($name){
		return trim($name);
    }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
    protected function json_out($data,$variable = null){
		//JSON_PRETTY_PRINT
		$jsonData = json_encode($data);
		if($variable == null){
			echo '<script> ';
			echo  $jsonData;
			echo ' </script>';
		}
		else{
			echo '<script> ';
			echo 'var '. $variable .' = '. $jsonData.';';
			echo ' </script>';
		}
	}

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

	//************************
	//COMMON PAGE FUNCTIONS
	//************************

	//Page Base
	public function setBase($base){
		$base = trim($base);
		$lbase = lcfirst($base);
		$this->_base = $lbase;
	}
}
?>