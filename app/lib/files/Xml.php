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
class Xml{

	private static $_location ;
	public static function read($filename){	
		libxml_use_internal_errors(true);
		//Self::$_location = PUBLIC_PATH.Config::get('imports/xml').DS.$filename.'.xml';
		Self::$_location = PROJECT_PATH.'tables'.DS.$filename.'.xml';
		$xml=simplexml_load_file(Self::$_location) or die("Error: Unable to read/or create objects for the file: ".$filename.'.xml');
		return $xml;
	}

	public static function readXMLArray($filename){
		$xmlfile = Self::$_location = PROJECT_PATH.'tables'.DS.$filename.'.xml';
		$xmlparser = xml_parser_create();
		    xml_parser_set_option($xmlparser, XML_OPTION_CASE_FOLDING, 0);
			xml_parser_set_option($xmlparser, XML_OPTION_SKIP_WHITE, 1);

			// open a file and read data
			$fp = fopen($xmlfile, 'r');
			$xmldata = fread($fp, 4096);
			xml_parse_into_struct($xmlparser,$xmldata,$values,$tags);
			xml_parser_free($xmlparser);

			
			echo '<pre>';
			print_r($values);
			echo '</pre>';

	}
}