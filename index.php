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

/***************************************************************/
//QMVC Entry Point 
require 'project/config.php';
Defined("ENVIRONMENT") || Define('ENVIRONMENT', $environment);
Defined("SCRIPT") || Define('SCRIPT', $_SERVER['SCRIPT_NAME']);
/***************************************************************
Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
//Autoload Class Locations
spl_autoload_register(function($class){

	$parts = explode('\\', $class);
	$class = end($parts);


	//LEVEL 1 - app
	if (file_exists(FOLDER_PATH. 'app' .DS. $class .'.php'))
	require_once FOLDER_PATH. 'app' .DS. $class .'.php';

	//LEVEL 2 - database
	if (file_exists(FOLDER_PATH. 'app' .DS. 'lib' .DS. 'database'. DS. $class .'.php'))
	require_once FOLDER_PATH. 'app' .DS. 'lib'  .DS. 'database'. DS. $class .'.php';

	//LEVEL 3 - App/library
	if (file_exists(FOLDER_PATH. 'app' .DS. 'lib' .DS. $class .'.php'))
	require_once FOLDER_PATH. 'app' .DS. 'lib' .DS. $class .'.php';

	//LEVEL 3 - App/library/Files
	if (file_exists(FOLDER_PATH. 'app'. DS. 'lib' .DS. 'files' .DS. $class .'.php'))
	require_once FOLDER_PATH. 'app'. DS. 'lib' .DS. 'files' .DS. $class .'.php';

	//LEVEL 2 - project/template
	if (file_exists(FOLDER_PATH. 'project'. DS. 'templates' .DS. $class .'.php'))
	require_once FOLDER_PATH. 'project'. DS. 'templates' .DS. $class .'.php';
});
//Set Base Path
//$url = $_SERVER['HTTP_HOST'].
/***************************************************************
Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
//Global Application Configurations
	$GLOBALS['config'] = [
		//Database Configurations
		'database_credits' => array(
				'persistent' => true,                   
				'datasource' => $datasource,
				'host'       => $host,
				'port'       => $port,
				'database'   => $database,
				'login'      => $login,
				'password'   => $password,
				'charset'    => $charset,
				'collation'  => $collation,
				'prefix'     => $prefix,
		 'mailer_transport'  => $mailer_transport,
		 'mailer_host'       => $mailer_host,
		 'mailer_user'       => $mailer_user,
		 'mailer_password'   => $mailer_password,
		 'mailer_template'   => $template_folder,
		 'locale'            => $language,
		 'security_function' => $security_function,
		 'security_salt'     => $security_salt,
		 ),

		//Cookie Configurations
		 'remember' => array(
			'cookie_name'   => $cookie_name, 
			'cookie_expiry' => $expiry,
		 ),

		//Session Configurations
		 'session' => array(
			'session_name'  => $session_name,
			'token_name'    => $token_name,
		 ),

		 'imports' => array(
			'xml' => $xml_location,
			'csv' => $csv_location,
			'text' => $text_location,
		 ),

		//Page Configurations
		 '404_error' => array(
			'404_url' => $file404,
		 ),

		//Log Configurations
		 'log' => array(
			'enable_app_err' => strtoupper($application_error),
			'dblog'          => $db_log,
			'applog'         => $app_log,
			'appErrorLog'    => $app_error_log,
			'auditlog'       => $audit_log,
			'phplog'         => $php_log,
		 ),

		//File Configurations
		 'file_config' => array(
			'GTargetFileFolder'	        => $TargetFileFolder,
			'GTargetOriginalFileFolder' => $OriginalFileFolder,
			'GResizedFileFolder'        => $ResizedFileFolder,
			'GThumbnailFileFolder'      => $ThumbnailFileFolder,
			'GfilePrefix'				=> $filePrefix,
			'GRootFolder'		        => $RootFolder,
			'GBaseFolder'				=> $BaseFolder,
		 ),
	];
/***************************************************************
Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	//Initialize Application
/***************************************************************

/***************************************************************/
	if (file_exists(FOLDER_PATH. 'app'. DS. 'lib' .DS. 'database' .DS. 'connect.php')){
	   require_once FOLDER_PATH. 'app'. DS. 'lib' .DS. 'database' .DS. 'connect.php';
	}
/***************************************************************

/***************************************************************/
	if (file_exists(FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'Debug.php')){
	   require_once FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'Debug.php';
	}
/***************************************************************

/***************************************************************/
	if (file_exists(FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'Browser.php')){
	   require_once FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'Browser.php';
	}
/***************************************************************

/***************************************************************/
	if (file_exists(FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'Utility.php')){
	   require_once FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'Utility.php';
	}
/***************************************************************

/***************************************************************/
	if (file_exists(FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'Validations.php')){
	   require_once FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'Validations.php';
	} 
/***************************************************************

/***************************************************************/
	if (file_exists(FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'Exceptions.php')){
	   require_once FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'Exceptions.php';
	} 
/***************************************************************

/***************************************************************/
	if (file_exists(FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'Hash.php')){
	   require_once FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'Hash.php';
	} 
/***************************************************************

/***************************************************************/
	if (file_exists(FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'Redirect.php')){
	   require_once FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'Redirect.php';
	} 
/***************************************************************

/***************************************************************/
	if (file_exists(FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'System.php')){
	   require_once FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'System.php';
	} 
/***************************************************************

/***************************************************************/
	if (file_exists(FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'Math.php')){
	   require_once FOLDER_PATH. 'app'. DS. 'lib' .DS. 'bin' .DS. 'Math.php';
	} 
/***************************************************************
Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
    ini_set('max_execution_time', $maximum_execution_time); 
	date_default_timezone_set($date_timezone);
	if(isset($short_open_tag)==true)
	ini_set('short_open_tag', $short_open_tag); 
	if(isset($safe_mode)==true)
	ini_set('safe_mode', $safe_mode); 
	if(isset($safe_mode_allowed_env_vars)==true)
	ini_set('safe_mode_allowed_env_vars', $safe_mode_allowed_env_vars); 
	if(isset($safe_mode_protected_env_vars)==true)
	ini_set('safe_mode_protected_env_vars', $safe_mode_protected_env_vars);
	if(isset($disable_functions)==true)
	ini_set('disable_functions', $disable_functions);
	if(isset($safe_mode_exec_dir)==true)
	ini_set('safe_mode_exec_dir', $safe_mode_exec_dir); 
	if(isset($magic_quotes_runtime)==true)
	ini_set('magic_quotes_runtime', $magic_quotes_runtime); 
	if(isset($magic_quotes_gpc)==true)
	ini_set('magic_quotes_gpc', $magic_quotes_gpc); 
	if(isset($include_path)==true)
	ini_set('include_path', $include_path); 
	if(isset($file_uploads)==true)
	ini_set('file_uploads', $file_uploads);
	if(isset($doc_root)==true)
	ini_set('doc_root', $doc_root);
    if(isset($upload_tmp_dir)==true)
	ini_set('upload_tmp_dir', $upload_tmp_dir);
	if(isset($ignore_user_abort)==true)
	ini_set('ignore_user_abort', $ignore_user_abort);
	if(isset($mysql_default_host)==true)
	ini_set('mysql.default_host', $mysql_default_host);
	if(isset($mysql_default_user)==true)
	ini_set('mysql.default_user', $mysql_default_user);
	if(isset($mysql_default_password)==true)
	ini_set('mysql.default_password', $mysql_default_password);
	if(isset($magic_quotes_sybase)==true)
	ini_set('magic_quotes_sybase', $$magic_quotes_sybase);
	if(isset($auto_prepend_file)==true)
	ini_set('auto-prepend-file', $auto_prepend_file);
	if(isset($auto_append_file)==true)
	ini_set('auto-append-file', $auto_append_file);
	if(isset($session_save_handler)==true)
	ini_set('session.save-handler', $session_save_handler);
	if(isset($warn_plus_overloading)==true)
	ini_set('warn_plus_overloading', $warn_plus_overloading);
	if(isset($error_prepend_string)==true)
	ini_set('error_prepend_string', $error_prepend_string);
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
/******************************
 * Setting Env for error reporting. 
 * executes important processes before the controller is created. 
 * In this case, it sets proper error reporting values, unregisters globals and escapes all input (GET, POST and COOKIE variables).
 ******************************/
$error_reporting = strtolower($error_reporting);
if($error_reporting == 'automatic'){
	 if (ENVIRONMENT == 'development' || ENVIRONMENT == 'testing') { 
		 error_reporting(E_ALL); 
		 ini_set('display_errors','On'); 
	 } else { 
		 error_reporting(E_STRICT); 
		 ini_set('display_errors','Off'); 
		 ini_set('log_errors', 'On'); 
		 ini_set('error_log', $error_log); 
	} 
} elseif($error_reporting == 'manual'){

	error_reporting($set_error_reporting_manual);
	
	//Set Display Error Option
	$display_errors = strtolower($display_errors);
	$display_errors = ucfirst($display_errors);
	ini_set('display_errors',$display_errors);

	$log_errors = strtolower($log_errors);
	$log_errors = ucfirst($log_errors);
	ini_set('log_errors', $log_errors);

	ini_set('error_log', $error_log); 
} else {
	trigger_error('Invalid Error Reporting Configured. Check Manual and File <b>Project->Config.php</b>.');
}

/***************************************************************
Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	$application = new App();
	$application->setControllerPath($controllerFolder);
	$application->setModelPath($modelFolder);
	$application->setErrorPath($errorFolder);
	$application->setErrorFile($errorFile);
	$application->setDefaultFile($defaultFile);
	$application->setPluginPath($pluginPath);
    $application->setErrorPage($Error_Controller);
	$application->dispatch();
?>