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
class App{
	private $_url = NULL;
	private $_uri;
	private $_host;
	private $_request;
	private $_route;
	private $_controller = NULL; 

	public $uri;

	//Paths
	private $_errorPath = 'error'; 
	private $_controllerPath = 'controllers';
	private $_modelPath = 'models'; 
	private $_pluginPath = 'plugins';

	//Files
	private $_controllerFile = 'controller.php';
	private $_modelFile = 'model.php'; 
	private $_errorFile = 'error.php'; 
	private $_defaultFile = 'index.php'; 

    //Pages
    private $_errorPage = 'rejected';
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function dispatch(){
		Sanitizr::removeMagicQuotes();
		Sanitizr::unregisterGlobals();
		$this->_initialize();
		$this->_getURI();
		$this->_getControllerMethod();
		$this->_callControllerMethod();
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	private function _getURI(){
		if(isset($_GET['url'])){
			$url = $_GET['url'];
			$url = rtrim($url,'/');
		    $url = filter_var($url, FILTER_SANITIZE_URL);
            $this->_url = explode('/', $url);
		} else {
			return NULL;
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	private function _initialize(){
		//Root Folders
		Defined("SRC_PATH") || Define('SRC_PATH', realpath(dirname(dirname(__file__))).DS.'src'.DS);
		Defined("DB_PATH")  || Define('DB_PATH', realpath(dirname(__file__)).DS.'database'.DS);
		Defined("PROJECT_PATH") || Define('PROJECT_PATH', FOLDER_PATH.'project'.DS);
		Defined("PUBLIC_PATH") || Define('PUBLIC_PATH', FOLDER_PATH.'public'.DS);
		//$dir = array_filter(glob('*'),'is_dir');
		//print_r($dir);

		spl_autoload_register(function($class){
		$folders = scandir(PROJECT_PATH.$this->_pluginPath);
		$remove = array('.','..');
		$folders = array_diff($folders,$remove);
		$folders = array_clean($folders);
			foreach($folders as $folder){		
				if (file_exists(PROJECT_PATH. $this->_pluginPath. DS. $folder .DS. $class .'.php'))
					require_once PROJECT_PATH. $this->_pluginPath. DS.  $folder .DS. $class .'.php';
			}
		});

		$this->_host = $_SERVER['HTTP_HOST'];
		$this->_uri  = $_SERVER['REQUEST_URI'];
		$this->_request = $_SERVER['REQUEST_METHOD']; 
		$this->_route = preg_replace('/^url=index.php&url=(.*)/','$1',$_SERVER['QUERY_STRING']);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	private function _getControllerMethod(){
		if(empty($this->_url[0]) || $this->_url[0] == NULL){
			$this->_loadDefaultController();	
			return false;
		} else {
			$this->_callExistingController();	
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	private function _loadDefaultController(){
		$defaultPath = SRC_PATH.$this->_controllerPath.DS.$this->_defaultFile;
		if(is_file($defaultPath)){
			 require $defaultPath;
			 $this->_controller = new Index();
		} else { $this->_error(); }	
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	private function _callExistingController(){
		$this->_controllerFile = $this->_url[0].'.php';
		$controllerPath = SRC_PATH.$this->_controllerPath.DS.$this->_controllerFile;
		if(file_exists($controllerPath)){
			 require $controllerPath;
			 $this->_controller = new $this->_url[0];
			 //load the Model
			 $this->_controller->loadModel($this->_url[0], $this->_modelPath);
		} else { $this->_error(); return false; }
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	private function _error(){
        $error_page = $this->_errorPage;
		$errorPath = SRC_PATH.$this->_controllerPath.DS.$this->_errorFile;
		if(file_exists($errorPath)){
			require $errorPath;
			$this->_error_o = new $error_page();
			$this->_error_o->index();
            $this->_controller = $this->_error_o;
            //load the Model
			 $this->_controller->loadModel($this->_errorPage, $this->_modelPath);
			exit;
		} else { 
			PROJECT_PATH.DS.$this->_errorPath.DS.$this->_errorFile;
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	private function _callControllerMethod(){
		$length = count($this->_url);
		if($length > 1){
			if(!method_exists($this->_controller,$this->_url[1])){
				$this->_error();
			}
		} 

		switch($length){
			case 6: 
					$this->_controller->{$this->url[1]}($this->url[2],$this->url[3],$this->url[4],$this->url[5]);
					break;
			case 5: 
					$this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3],$this->_url[4]);
					break;
			case 4: 
					$this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3]);
					break;
			case 3: 
					$this->_controller->{$this->_url[1]}($this->_url[2]);
					break;
		    case 2: 
				   $this->_controller->{$this->_url[1]}();
				   break;
			default: 
				   $this->_controller->index();
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function setControllerPath($path){
			$this->_controllerPath = trim($path,DS);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function setModelPath($path){
			$this->_modelPath = trim($path,DS);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function setErrorPath($path){
			$this->_errorPath = trim($path,DS);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function setErrorFile($file){
			$this->_errorFile = trim($file).'.php';
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function setDefaultFile($file){
			$this->_defaultFile = trim($file).'.php';
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function setPluginPath($folder){
			$this->_pluginPath = trim($folder);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function setErrorPage($page){
			$this->_errorPage= trim($page);
	}
}