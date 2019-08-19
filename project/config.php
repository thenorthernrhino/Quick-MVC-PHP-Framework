<?php
//Quick MVC file configuration

//-------------------DO NOT CHANGE--------------------------------------------------------------//
	Defined("DS") || Define('DS', DIRECTORY_SEPARATOR);
	$settings_file = realpath(dirname(dirname(__file__))).DS.'settings.php';
	require $settings_file;
//-------------------DO NOT CHANGE--------------------------------------------------------------//
/***************************************************************
Description: 
/***************************************************************/
	//Project Name: 
	$project = 'Director';
/***************************************************************
Description: 
/***************************************************************/
	//Set Your Environment
	$environment = 'development';
	$error_reporting = 'Automatic';
/***************************************************************
Description: 
/***************************************************************/
	//Set Application Error 
	// 'ON' will through error on screen. 'OFF' will create a log and exit
	$application_error = 'ON';
/***************************************************************
Description: 
/***************************************************************/
	//Database Settings
	$persistent = false;                   
	$datasource = 'mysql';
	$host       = 'localhost';
	$port       = '3306';
	$database   = 'fixopr_events';
	$login      = 'root';
	$password   = '';
	$charset    = 'utf8';
	$collation  = 'utf8_unicode_ci';
	$prefix     = '';
	//Set Up Mail
	$mailer_transport  = 'smtp';
	$mailer_host       = 'localhost';
	$mailer_user       = '';
	$mailer_password   = '';
	$template_folder   = 'templates';
/***************************************************************
Description: 
/***************************************************************/
	$language  = ''; 
/***************************************************************
Description: 
/***************************************************************/
	//Security Settings
	$security_function = 'md5';
	$security_salt     = '_%%#fix@opr!23';

	//Folder Setting
	$TargetFileFolder	    = 'upload';
	$OriginalFileFolder     = 'original';     
	$ResizedFileFolder	    = 'upload';
	$ThumbnailFileFolder    = 'upload';
	$filePrefix				= 'thumb_';
	$BaseFolder				= '';
	$RootFolder				= '';
/***************************************************************
Description: 
/***************************************************************/
	//Log File Setup - starts from root folder
	$db_log          = 'logs'.DS.'database'.DS.'db-log.txt';
	$app_log         = 'logs'.DS.'application'.DS.'app-log.txt';
	$app_error_log   = 'logs'.DS.'application'.DS.'app-error-log.txt';
	$audit_log		 = 'logs'.DS.'audit'.DS.'audit-log.txt';
	$php_log         = 'logs'.DS.'php'.DS.'php-log.txt';
/***************************************************************
Description: 
/***************************************************************/
	//Set Up Error File
	$file404 = 'error.php';
    $Error_Controller = 'rejected';
/***************************************************************
Description: 
/***************************************************************/
	//File Read Write. 
	$xml_location  = 'imports'.DS.'xml';
	$csv_location  = 'imports'.DS.'csv';
	$text_location = 'imports'.DS.'text';
/***************************************************************
Description: 
/***************************************************************/
	//Router Settings
	$controllerFolder = 'controllers';
	$modelFolder	  = 'models';
	$errorFolder	  = 'error';
	$errorFile		  = 'rejected';
	$defaultFile	  = 'index';
	$pluginPath	      = 'plugins';
/***************************************************************
Description: 
/***************************************************************/
	//Cookie Settings
	$cookie_name = 'user';
	$expiry = 604800;
/***************************************************************
Description: 
/***************************************************************/
	//Session Settings
	$session_name = 'user';
	$token_name = 'token';
/***************************************************************
Description: 
/***************************************************************/
	//PHP Settings
	$maximum_execution_time = '100';
	$date_timezone          = 'Asia/Kolkata';
	$short_open_tag         = 'Off';
	$safe_mode              = 'Off';

/***************************************************************
Description: 
/***************************************************************/

//Manual error Settings
/***************************************************************
Description: 
/***************************************************************/
	$display_errors = 'on';
	$set_error_reporting_manual = E_ALL;
	$log_errors = 'on';
	$error_log = FOLDER_PATH. DS .'config'.DS.'logs'.DS.'php'.DS.'error.log';
/***************************************************************
Description: 
/***************************************************************/
	//$safe_mode_allowed_env_vars = [PHP_];
	//$safe_mode_protected_env_vars = [LD_LIBRARY_PATH];
	//$safe_mode_exec_dir = [DIR];
/***************************************************************
Description: 
/***************************************************************/
	//$disable_functions = [function1, function2...];
/***************************************************************
Description: 
/***************************************************************/
	//$magic_quotes_runtime = Off;
	//$magic_quotes_gpc = On;
	//$magic_quotes_sybase = Off;
/***************************************************************
Description: 
/***************************************************************/
	//$include_path = [DIR];
/***************************************************************
Description: 
/***************************************************************/
	//$file_uploads = [on/off];
	//$upload_tmp_dir = [DIR];
/***************************************************************
Description: 
/***************************************************************/
	//$doc_root = [DIR];
	//$ignore_user_abort = [On/Off];
/***************************************************************
Description: 
/***************************************************************/
	//$mysql_default_host = hostname;
	//$mysql_default_user = username;
	//$mysql_default_password = password;
/***************************************************************
Description: 
/***************************************************************/
	//$auto_prepend_file = [path/to/file]
	//$auto_append_file = [path/to/file]

//$session_save_handler = files;
//$warn_plus_overloading = Off;
//$error_prepend_string = [""];
?>
