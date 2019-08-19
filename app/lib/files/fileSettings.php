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
File Settings
*********************************/

	if(isset($_FILES["file"]["name"])){
		$this->_fileName			= $_FILES["uploaded_file"]["name"];
		$this->_fileTmpLoc			= $_FILES["uploaded_file"]["tmp_name"]; 
		$this->_fileType			= $_FILES["uploaded_file"]["type"]; 
		$this->_fileSize			= $_FILES["uploaded_file"]["size"]; 
		$this->_fileErrorMsg		= $_FILES["uploaded_file"]["error"]; 

		$this->_fileName			= preg_replace('#[^a-z.0-9]#i', '', $this->_fileName);
		$spit_file_name				= explode(".", $this->_fileName); 
		$this->_fileExt				= $spit_file_name[1];

		$folder_root				= config::get('file_config/GRootFolder'); //'folders' .DIRECTORY_SEPARATOR;
		//Public:: Static Method to converts Objects into an Arraya
		$base_folder				= config::get('file_config/GBaseFolder'); //$folder_root. 'upload' .DIRECTORY_SEPARATOR;
		//Public:: Static Method to converts Objects into an Arraya
		$this->target_file			= config::get('file_config/GTargetFileFolder')		   .DS. $this->_fileName;
		//Public:: Static Method to converts Objects into an Arraya
		$this->target_original		= config::get('file_config/GTargetFileFolder')		   .DS. 
									  config::get('file_config/GTargetOriginalFileFolder') .DS. $this->_fileName;
		//Public:: Static Method to converts Objects into an Arraya
		$this->resized_file			= config::get('file_config/GTargetFileFolder')		   .DS. md5(uniqid(rand())) .".". $this->_fileExt;
		//Public:: Static Method to converts Objects into an Arraya
		$this->thumbnail			= config::get('file_config/GTargetFileFolder')		   .DS. 
									  config::get('file_config/GfilePrefix')               . md5(uniqid(rand())) .".". $this->_fileExt;
		//Public:: Static Method to converts Objects into an Arraya
		$this->original_folder		= config::get('file_config/GTargetFileFolder')         .DS. config::get('file_config/GTargetOriginalFileFolder');
	}

	$this->upload_folder		=  isset($folder_root) ? $folder_root .DS. 'upload'   : 'public'.DS.'upload' ;
	$this->download_folder		=  isset($folder_root) ? $folder_root .DS. 'download' : 'public'.DS.'download';
	$this->converted_folder		= 'public'.DS.'upload' .DS.'converted';
	$this->files_upload_folder  = 'public'.DS.'upload' .DS.'files';
?>