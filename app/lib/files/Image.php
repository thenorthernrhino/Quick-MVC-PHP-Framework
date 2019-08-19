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
//----------------------------------------------------------------------------------------------------------------------------------------//
//                          Program Details                                                                                               //
//----------------------------------------------------------------------------------------------------------------------------------------//
// Program Name         :  Kite Project																									  //
// Created By           :  Contemplative Radical Solutions consultants Private Limited.													  //
// Location             :  New Delhi	                         																		  //
// Catagory             :  E-Commerce	                         																		  //
// Project Owner        :  Ankit Kumar                             																		  //
// Idea Owner	        :  Ankit Kumar                             																		  //
// Project Manager      :  Ankit Kumar                             																		  //
// Started On           :  02.02.2015                                  																	  //
// Functional Consultant:  Ankit Kumar                           																		  //
//----------------------------------------------------------------------------------------------------------------------------------------//
// Description
//----------------------------------------------------------------------------------------------------------------------------------------//
// Access the $_FILES global variable for this specific file being uploaded
// and create local PHP variables from the $_FILES array of information

// The file name
// File in the PHP tmp folder
// The type of file it is
// File size in bytes
// 0 = false | 1 = true

// Split file name into an array using the dot
// Now target the last array element to get the file extension
// removed for use when required:  $fileExt = end($spit_file_name); 	
// Place it into your "uploads" folder mow using the move_uploaded_file() function

// START PHP Image Upload Error Handling --------------------------------------------------
// if file not chosen
// if file size is larger than 5 Megabytes
// Remove the uploaded file from the PHP temp folder
// This condition is only if you wish to allow uploading of specific file types 
// Remove the uploaded file from the PHP temp folder
// if file upload error key is equal to 1
// END PHP Image Upload Error Handling ----------------------------------------------------
// For Later Use:
// imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)


/*
 * Class: Image 
 * Image Utility Class 
 */

class Image {

	/**
	* Private Variables 
	**/
		private $_fileName;
		private $_fileTmpLoc; 
		private $_fileType;
		private $_fileSize;
		private $_fileErrorMsg; 
		private $_width;
		private $_height;
		private $_wthumb;
		private $_hthumb;
		private $_fileExt;
		private $moveResult;
		private $original_folder;
		private $target_file;
		private $resized_file;
		private $thumbnail;
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/**
	* Public:: File Constructor  
	**/

	public function __construct() {
		$folder = new Files();
		require 'fileConfig.php';
		$folder->checkFolderExists($this->original_folder);
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/**
	* Public:: Image Upload - Puts the file into the file location
	*		   Set $this->target_original into the configuration file
	* @return boolean true/false  
	**/

	public function imgUpload(){
		try{ 
			$upload = new Files();
			$upload->putFile($this->target_original);
			return true;
		} catch (Exception $e){
			return $e;
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
	* Public:: File Delete - Deletes the file from the location.
	* @param  string $$fileToDelete   File path  
	* @return boolean true/false  
	**/

	public function fileDelete($fileToDelete){
		if(file_exists($fileToDelete)){
		if (!unlink($fileToDelete)){
		  //return ("Error deleting $fileToDelete");
		  putFileContent(date("Y-m-d",$t).":" .date("h:i:sa")."logs/app-log/system-log.txt","Error deleting $fileToDelete");
		  return false;
		} else {
		  //return ("Original File: $fileToDelete Deleted");
		  putFileContent(date("Y-m-d",$t).":" .date("h:i:sa")."logs/app-log/system-log.txt","Original File: $fileToDelete Deleted");
		  return true;
		}
	}
		//return ("File Does Not Exist!");
		putFileContent(date("Y-m-d",$t).":" .date("h:i:sa")."logs/app-log/system-log.txt","File Does Not Exist!");
		return false;
	}

/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	/**
	* Public:: Resize Image File. 
	* @param  int	  $w	  Image Maximum Width  
	* @param  int	  $h	  Image Maximum Height
	* @param  boolean $state  Upload original file or not. (Example & Default = false)
	* @return mixed Error Msg. or
	* @return boolean true. 
	**/

	public function imgResize($w, $h, $state = false){
		$folder = new files();
		if($state == true){
			$folder->putFile($this->target_original);
		} else {
			$folder->putFile($this->target_file); 
		}

		if($state == true){
			$target  = $this->target_original; 
		} else {
			$target  = $this->target_file; 
		}

		try {
			$newcopy = $this->resized_file;
			$ext	 = $this->_fileExt;
			$this->reCreateFile($target, $newcopy, $w, $h, $this->_fileExt, 'resize');
			$this->saveOriginal(false);
			return true;
		} catch (Exception $e){
			return $e;
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
	* Public:: Crop Image File. 
	* @param  int	  $w	  Image Maximum Width  
	* @param  int	  $h	  Image Maximum Height
	* @param  boolean $state  Upload original file or not. (Example & Default = false)
	* @return mixed Error Msg. or
	* @return boolean true. 
	**/

	public function imgCrop($w, $h, $state = false){
		$folder = new files();
		if($state == true){
			$folder->putFile($this->target_original);
		} else {
			$folder->putFile($this->target_file); 
		}

		if($state == true){
			$target  = $this->target_original; 
		} else {
			$target  = $this->target_file; 
		}
		try{
			$newcopy = $this->thumbnail;
			$ext	 = $this->_fileExt;
			$this->reCreateFile($target, $newcopy, $w, $h, $this->_fileExt, 'crop');
			$this->saveOriginal(false);
		} catch(Exception $e) {
			return $e;
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
	* Public:: Crop Image File. 
	* @param  int	  $w	  Image Maximum Width  
	* @param  int	  $h	  Image Maximum Height
	* @param  boolean $state  Upload original file or not. (Example & Default = false)
	* @return mixed Error Msg. or
	* @return boolean true. 
	**/

	public function reCreateFile($target_file, $resized_file, $w, $h, $ext, $activity = null){
		list($w_orig, $h_orig) = getimagesize($target_file);
		if($activity == 'resize'){
			$scale_ratio = $w_orig / $h_orig;
				if (($w / $h) > $scale_ratio) {
					   $w = $h * $scale_ratio;
				} else {
					   $h = $w / $scale_ratio;
				}
		}

		if($activity == 'crop'){
			$src_x = ($w_orig / 2) - ($w / 2);
			$src_y = ($h_orig / 2) - ($h / 2);
		}

		$img = "";
		$ext = strtolower($ext);
		if ($ext == "gif"){ 
			$img = imagecreatefromgif($target_file);
		} else if($ext =="png"){ 
			$img = imagecreatefrompng($target_file);
		} else { 
			$img = imagecreatefromjpeg($target_file);
		}

		$tci = imagecreatetruecolor($w, $h);
		if($activity == 'resize'){
			imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
		}

		if($activity == 'crop'){
			imagecopyresampled($tci, $img, 0, 0, $src_x, $src_y, $w, $h, $w, $h);
		}

		if ($ext == "gif"){ 
			imagegif($tci, $resized_file);
		} else if($ext =="png"){ 
			imagepng($tci, $resized_file);
		} else { 
			imagejpeg($tci, $resized_file, 84);
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
	* Public:: Crop Image File. 
	* @param  boolean $state  Upload original file or not. (Example & Default = false)
	* @return mixed Error Msg. or
	* @return boolean true. 
	**/
	private function saveOriginal($state = true){
		if($state == false){
			$this->fileDelete($this->target_file);
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

	   /*
		*   Contruct the Bootstrap.
		*   @return boolen|String
		*/
		public function confirmMsg(){		
			$folder = new Files();
			$folder->removeTempFile($this->_fileTmpLoc);
		}

		public function convert_to_jpg(){
			 $target  = $this->target_file;
			 $newcopy = 'conv_'.$this->target_file;
			 $ext     = $this->_fileExt;

			 list($w_orig, $h_orig) = getimagesize($target);
			 $ext = strtolower($ext);
			 $img = "";

				 if ($ext == "gif"){ 
					$img = imagecreatefromgif($target);
				} else if($ext =="png"){ 
					$img = imagecreatefrompng($target);
				}

			$tci = imagecreatetruecolor($w_orig, $h_orig);
			imagecopyresampled($tci, $img, 0, 0, 0, 0, $w_orig, $h_orig, $w_orig, $h_orig);
			imagejpeg($tci, $newcopy, 84);
		}

/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	   /*
		*   Contruct the Bootstrap.
		*   @return boolen|String
		*/
		public function imgWatermark($wtrmrk_file) { 

			$target    = $this->target_file;
			$newcopy   = 'conv_'.$this->target_file;
			$watermark = imagecreatefrompng($wtrmrk_file); 

			imagealphablending($watermark, false); 
			imagesavealpha($watermark, true); 
			$img = imagecreatefromjpeg($target);
			$img_w = imagesx($img); 
			$img_h = imagesy($img); 
			$wtrmrk_w = imagesx($watermark); 
			$wtrmrk_h = imagesy($watermark); 
			$dst_x = ($img_w / 2) - ($wtrmrk_w / 2); // For centering the watermark on any image
			$dst_y = ($img_h / 2) - ($wtrmrk_h / 2); // For centering the watermark on any image
			imagecopy($img, $watermark, $dst_x, $dst_y, 0, 0, $wtrmrk_w, $wtrmrk_h); 
			imagejpeg($img, $newcopy, 100); 
			imagedestroy($img); 
			imagedestroy($watermark); 
		} 
		
}
?>