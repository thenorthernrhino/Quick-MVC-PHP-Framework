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
File Functions
*********************************/

class Files{

	private $path;
	private $upload_folder;
	private $download_folder;
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function __construct(){
		require 'fileSettings.php';
		$this->checkFolderExists($this->upload_folder);
		$this->checkFolderExists($this->download_folder);
		$this->checkFolderExists($this->files_upload_folder);		
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/**
	* Public:: Get File Name
	* @param  string $path   File path  
	* @param  string $suffix File Suffix (Example & Default = ".php")
	* @return string Base File Name. 
	**/

	public function getFileName($path, $suffix = ".php"){
		return basename($path, $suffix);
	}

/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/**
	* Public:: Change File Group
	* @param  string $path   File path  
	* @param  string $group  Change File Group (Example & Default = "admin")
	* @return boolean true/false    
	**/

	public function getChangeGroup($path, $group = "admin"){
        $location = FOLDER_PATH."logs".DS."app-log".DS."app-log.txt";
		if(!chgrp($path, $group)){ 
			putFileContent($location,date("Y-m-d",$t).":" .date("h:i:sa"). $this->_fileName.":group changed to".$group); 
		} else {
			putFileContent($location,date("Y-m-d",$t).":" .date("h:i:sa"). $this->_fileName."ERROR: $group change FAILED!"); 

		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/**
	* Public:: Change File Mode
	* @param  string  $path   File path  
	* @param  string  $mode   Change File Mode (Example = "0777")
	* @return boolean true/false    
	**/

	public function getChangeMode($path, $mode){
		return chmod($path, $mode);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/**
	* Public:: Check if the File Exists
	* @param  string  $path   File path  
	* @return boolean true/false    
	**/

	public function checkFolderExists($path){
		if(file_exists($path)){
			return true;
		} else {
			if (!mkdir($path, 0777, true)) {
				 //die('Failed to create folders...');
                 $location = FOLDER_PATH."logs".DS."app-log".DS."app-log.txt";
				 putFileContent($location, date("Y-m-d",$t).":" .date("h:i:sa") . ">ERROR: Failed to create folders...");
				 die(date("Y-m-d",$t).":" .date("h:i:sa").'check "file-error-log" with your log Folder!');
			}
		}
		return true;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/**
	* Public:: File Upload 
	* @return boolean true/false and Confirm Msg    
	**/

	public function fileUpload(){
		if($this->putFile($this->uploaded_file)){
			$this->removeTempFile($this->_fileTmpLoc);
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
	/**
	* public:: Remove the temporary file.
	* @param  string  $path   File path  
	* @return boolean true/false    
	**/

	public function removeTempFile($path){
		// Remove the uploaded file from the PHP temp folder
		if(file_exists($path)){
			unlink($path);
		}
		return true;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/**
	* Public:: Put the file to the desired locations
	* @param  string  $location   File path 
	*				  Place it into your "uploads" folder mow using the move_uploaded_file() function
	* @return boolean true/false    
	**/

	public function putFile($location){
		$this->moveResult = move_uploaded_file($this->_fileTmpLoc, $location);
		if ($this->moveResult != true) {
			echo "ERROR: File not uploaded. Try again.";
            $location = FOLDER_PATH."logs".DS."app-log".DS."app-log.txt";
			putFileContent($location,date("Y-m-d",$t).":" .date("h:i:sa")."ERROR: File not uploaded.");
		}
		$this->validateFile();
		return true;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/**
	* Public:: Write the text content to a file.
	* @param  string   $path          File path 
	* @param  array    $args		  Array of Content 
	* @param  boolean  $$dateflag	  flag (Example & Default = false) 
	* @param  boolean  $noAppendFlag  flag (Example & Default = false)  
	* @return boolean true/false       
	**/

	public function putFileContent($path, $args, $dateflag = false, $noAppendFlag = false){
		$args = func_get_args();
		$path = str_replace(array('/','\\'), DIRECTORY_SEPARATOR, $args[0]);
		
		$parts = explode(DIRECTORY_SEPARATOR, $path);
		array_pop($parts);
		$directory =  '';
		foreach($parts as $part):
			$check_path = $directory.$part;
				if( is_dir($check_path.DIRECTORY_SEPARATOR) === FALSE) {
					echo $check_path;
					mkdir($check_path, 0755);
				}
				$directory = $check_path.DIRECTORY_SEPARATOR;
		endforeach; 
		 
		if ($noAppendFlag == true){
			if($dateflag == true){
				$date = 'date:';
				file_put_contents($path, $date, LOCK_EX);
			}
			file_put_contents($path, trim($args[1]).PHP_EOL , LOCK_EX);
			return true;
			
		} else {
			if($dateflag == true){
				$date = 'date:';
				file_put_contents($path, $date, FILE_APPEND | LOCK_EX);
			}
			file_put_contents($path, trim($args[1]).PHP_EOL , FILE_APPEND | LOCK_EX);
			return true;
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/**
	* Public:: File Validation and Error Msgs.
	* @param  string   $path          File path 
	* @return boolean true/false       
	**/

	public function validateFile(){
		return true;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function upload($input = array()){
		$return = array();
		$keywords = array('location','size','types','name');

		if(array_key_exists('location',$input) == true){
			//good to go
		}else {
			//throw error;
			exit;
		}
		if(array_key_exists('size',$input) == true){
			//good to go
		}else {
			//throw error;
			exit;
		}
		if(array_key_exists('types',$input) == true){
			//good to go
		}else {
			//throw error;
			exit;
		}
		if(array_key_exists('name',$input) == true){
			//good to go
		}else {
			//throw error;
			exit;
		}

		if(is_array($input)){
			foreach($input as $key => $value){
				if(in_array($key,$keywords)){
				} else {
					//throw error;
					exit;
				}

				switch($key){
					case 'location':
							if($value == ''){
								$location	= $this->files_upload_folder;	
							} else {
								$location	= $value;
							}	
							$return['location'] = $location;
						  break;
							
					case 'size':
							if($value == ''){
								$size = '';
							} else {
								$size = $value;
							}
							$return['size'] = $size;
						  break;

					case 'name':
							$name = $value;
							$return['name'] = $name;
						  break;

					case 'types':
							if(is_array($value)){
								$type = $value;
							} else {
								//throw error msg
							}
						  break;
				}
			}

			$target_dir = $location;
			$target_file = $target_dir .DS. basename($_FILES[$name]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$return['type'] = $imageFileType;
			$return['filename'] = basename($_FILES[$name]["name"]);
			$return['mime'] = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$uploadOk = 1;
			}
			// Check if file already exists
			if (file_exists($target_file)) {
				$return['reason'] = 'Sorry, File already exists.';
				$uploadOk = 0;
			}
			// Check file size
			if ($size !== ''){
				if ($_FILES["fileToUpload"]["size"] > $size) {
					$return['reason'] = 'file is too large';
					$uploadOk = 0;
					exit;
				}
			}
			// Allow certain file formats
			$check = strtolower($imageFileType);
			if(in_array($check,$type) == true){
			} else {
				$return['reason'] = 'File type not allowed';
				$uploadOk = 0;
				exit;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$return['upload']  = 'false';
				$return['messege'] = "File was not Uploaded";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$return['messege'] = "File uploaded successfully";
					$return['upload'] = 'true';
				} else {
					$return['messege'] = "File was not Uploaded";
					$return['upload']  = 'false';
				}
			}

		} else { 
			// throw error
		}

		return $return;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function rename_file($old,$new){
		if(rename($old,$new)){
			return true;
		}else {
			//write error log
			return false;
		}
	}
}
?>