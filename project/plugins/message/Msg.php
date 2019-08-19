<?php

//Technical Information
// E - Error
// W - Warning
// I - Information
// A - Application
// D - Database
// U - User

class Msg{

	private static function content($class,$number,$data){
		$msgc = '';
		switch($class){
			case 'A': //Alter
					 switch($number){
						case '000':
									$msgc = 'Incomplete information provided to Alter. table => MISSING.';
									return $msgc;
									break;
						case '001':
									$msgc = 'Operation'.$data.'Does not exist.';
									return $msgc;
									break;
						case '002':
									$msgc = 'The value can either be true or false.';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;
						
						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'B': 
					 switch($number){
						case '000':
									$msgc = '';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'C': //Common Class 
					 switch($number){
						case '000':
									$msgc = 'INVALID Keyword '.$data.'.';
									return $msgc;
									break;
						case '001':
									$msgc = 'No such table exist '.$data.'.';
									return $msgc;
									break;
						case '002':
									$msgc = 'Incomplete information provided. '.$data.' => MISSING';
									return $msgc;
									break;
						case '003':
									$msgc = 'information without array => []';
									return $msgc;
									break;
						case '004':
									$msgc = 'Length not defined for '.$data.'.';
									return $msgc;
									break;
						case '005':
									$msgc = 'Length not defined properly for '.$data.'.';
									return $msgc;
									break;
						case '006':
									$msgc = 'INVALID data type '.$data.'.';
									return $msgc;
									break;
						case '007':
									$msgc = $data.' does not exist.';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'D': //Delete
					 switch($number){
						case '000':
									$msgc = '';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;
							
						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'E': 
					 switch($number){
						case '000':
									$msgc = '';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;
						
						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'F': //Field
					 switch($number){
						case '000':
									$msgc = 'Parameter 1 is not boolean.';
									return $msgc;
									break;
						case '001':
									$msgc = 'FIELD: '.$data.' Does not exist.';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;
								
						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'G': 
					 switch($number){
						case '000':
									$msgc = '';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'H': 
					 switch($number){
						case '000':
									$msgc = '';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'I': //Insert
					 switch($number){
						case '000':
									$msgc = '';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'J': // Join
					switch($number){
						case '000':
									$msgc = 'Joining (FROM '.$data.') Table value Missing.';
									return $msgc;
									break;
						case '001':
									$msgc = 'Joining (FROM '.$to.') Table value Missing.';
									return $msgc;
									break;
						case '002':
									$msgc = 'Match Value Empty.';
									return $msgc;
									break;
						case '003':
									$msgc = 'View must be an array.';
									return $msgc;
									break;
						case '004':
									$msgc = 'View must NOT be empty.';
									return $msgc;
									break;
						case '005':
									$msgc = 'Join type invalid.';
									return $msgc;
									break;
						case '006':
									$msgc = 'Table Columns must be in array as [].';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'K': 
					 switch($number){
						case '000':
									$msgc = '';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'L': 
					 switch($number){
						case '000':
									$msgc = '';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'M': 
					 switch($number){
						case '000':
									$msgc = $data.' has to be in the array format.';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'N': //Table Index
					 switch($number){
						case '000':
									$msgc = '';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'O': 
					 switch($number){
						case '000':
									$msgc = '';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'P': 
					 switch($number){
						case '000':
									$msgc = '';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'Q': //Query
					 switch($number){
						case '000':
									$msgc = $data.' Keyword Missing. Check Query Manual.';
									return $msgc;
									break;
						case '001':
									$msgc = $data. 'Misplaced. Invalid Query Build. Check Query Manual';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'R': 
					 switch($number){
						case '000':
									$msgc = '';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'S': //Select
					 switch($number){
						case '000':
									$msgc = 'Non-Integer Value Passed to '.$data.'.';
									return $msgc;
									break;
						case '001':
									$msgc = 'Non-Array passed to '.$data.', Follow Example: between => [fieldname,a,b].';
									return $msgc;
									break;
						case '002':
									$msgc = 'Given value has to be in array Example: [ID ASC]';
									return $msgc;
									break;
						case '003':
									$msgc = 'Round Format invalid. Enter the CSV comma separated values (example: a1,a2,a3)';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'T': //Table
					 switch($number){
						case '000':
									$msgc = 'INVALID Foreign Key, Enter CSV (Comma Separate Values), Example a1,a2,a3.';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'U': //Update
					 switch($number){
						case '000':
									$msgc = '';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;

						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'V': //Average
					 switch($number){
						case '000':
									$msgc = $data.' Invalid. The entered value must be a string.';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;
					
						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'W': 
					 switch($number){
						case '000':
									$msgc = '';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;
												
						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'X': 
					 switch($number){
						case '000':
									$msgc = '';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;
						
						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'Y': 
					 switch($number){
						case '000':
									$msgc = '';
									return $msgc;
									break;
						case '001':
									$msgc = '';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;
												
						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;

			case 'Z': //File Related Errors
					 switch($number){
						case '000':
									$msgc = 'INVALID Entry, Array Required.';
									return $msgc;
									break;
						case '001':
									$msgc = 'INVALID Input, Array Required.';
									return $msgc;
									break;
						case '002':
									$msgc = '';
									return $msgc;
									break;
						case '003':
									$msgc = '';
									return $msgc;
									break;
						case '004':
									$msgc = '';
									return $msgc;
									break;
						case '005':
									$msgc = '';
									return $msgc;
									break;
						case '006':
									$msgc = '';
									return $msgc;
									break;
						case '007':
									$msgc = '';
									return $msgc;
									break;
						case '008':
									$msgc = '';
									return $msgc;
									break;
						case '009':
									$msgc = '';
									return $msgc;
									break;
						case '010':
									$msgc = '';
									return $msgc;
									break;
						case '011':
									$msgc = '';
									return $msgc;
									break;
						case '012':
									$msgc = '';
									return $msgc;
									break;
						case '013':
									$msgc = '';
									return $msgc;
									break;
						case '014':
									$msgc = '';
									return $msgc;
									break;
						case '015':
									$msgc = '';
									return $msgc;
									break;
												
						default: trigger_error('Undefined/Invalid Error Number', E_USER_WARNING);
			         }
					 break;
		}
	}

	public static function _throw($type,$class,$number,$data = null){
		if(Config::get('log/enable_app_err') == 'ON'){
			Self::raise($type,$class,$number,$data = null);
			Self::wlog($type,$class,$number,$data = null);
		} 
		
		if(Config::get('log/enable_app_err') == 'OFF'){
			Self::wlog($type,$class,$number,$data = null);
		}
	}

	private static function raise($type,$class,$number,$data = null){
		$caller =  next(debug_backtrace());
		switch($type){
			case 'E': 
						$content = Self::content($class,$number,$data = null);
						trigger_error($class.':'.$number.':'.$content.' in <strong>'.$caller['function'].'</strong> called from <strong>'.$caller['file'].'</strong> on line <strong>'.$caller['line'].'</strong>'."\n<br />error handler",E_USER_ERROR);
						exit;
						break;
			case 'W': 
						$content = Self::content($class,$number,$data = null);
						trigger_error($class.':'.$number.':'.$content.' in <strong>'.$caller['function'].'</strong> called from <strong>'.$caller['file'].'</strong> on line <strong>'.$caller['line'].'</strong>'."\n<br />error handler",E_USER_WARNING);
						break;
			case 'I': 
						$content = Self::content($class,$number,$data = null);
						trigger_error($class.':'.$number.':'.$content.' in <strong>'.$caller['function'].'</strong> called from <strong>'.$caller['file'].'</strong> on line <strong>'.$caller['line'].'</strong>'."\n<br />error handler",E_USER_NOTICE);
						break;
			case 'A': 
						$content = Self::content($class,$number,$data = null);
						trigger_error($class.':'.$number.':'.$content.' in <strong>'.$caller['function'].'</strong> called from <strong>'.$caller['file'].'</strong> on line <strong>'.$caller['line'].'</strong>'."\n<br />error handler",E_USER_ERROR);
						exit;
						break;
			case 'D': 
						$content = Self::content($class,$number,$data = null);
						trigger_error($class.':'.$number.':'.$content.' in <strong>'.$caller['function'].'</strong> called from <strong>'.$caller['file'].'</strong> on line <strong>'.$caller['line'].'</strong>'."\n<br />error handler",E_USER_ERROR);
						exit;
						break;
			case 'U': 
						$content = Self::content($class,$number,$data = null);
						trigger_error($class.':'.$number.':'.$content.' in <strong>'.$caller['function'].'</strong> called from <strong>'.$caller['file'].'</strong> on line <strong>'.$caller['line'].'</strong>'."\n<br />error handler",E_USER_ERROR);
						exit;
						break;
			default: 
						trigger_error('Invalid Massage Type!');
		}
	}

	private static function wlog($type,$class,$number){
		switch($type){
			case 'E': 
						$content = Self::content($class,$number);
						Self::file_write($content.' in <strong>'.$caller['function'].'</strong> called from <strong>'.$caller['file'].'</strong> on line <strong>'.$caller['line'].'</strong>'."\n<br />error handler",'Error');
						exit;
						break;
			case 'W': 
						$content = Self::content($class,$number);
						Self::file_write($content.' in <strong>'.$caller['function'].'</strong> called from <strong>'.$caller['file'].'</strong> on line <strong>'.$caller['line'].'</strong>'."\n<br />error handler",'Warning');
						break;
			case 'I': 
						$content = Self::content($class,$number);
						Self::file_write($content.' in <strong>'.$caller['function'].'</strong> called from <strong>'.$caller['file'].'</strong> on line <strong>'.$caller['line'].'</strong>'."\n<br />error handler",'Information');
						break;
			case 'A': 
						$content = Self::content($class,$number);
						Self::file_write($content.' in <strong>'.$caller['function'].'</strong> called from <strong>'.$caller['file'].'</strong> on line <strong>'.$caller['line'].'</strong>'."\n<br />error handler",'Application Error');
						exit;
						break;
			case 'D': 
						$content = Self::content($class,$number);
						Self::file_write($content.' in <strong>'.$caller['function'].'</strong> called from <strong>'.$caller['file'].'</strong> on line <strong>'.$caller['line'].'</strong>'."\n<br />error handler",'Database Error');
						exit;
						break;
			case 'U': 
						$content = Self::content($class,$number);
						Self::file_write($content.' in <strong>'.$caller['function'].'</strong> called from <strong>'.$caller['file'].'</strong> on line <strong>'.$caller['line'].'</strong>'."\n<br />error handler",'User Error');
						exit;
						break;
			default: 
						trigger_error('Invalid Massage Type!');
		}
	}

	private static function file_write($content,$type){
			$file = new Files;
			$t = time();
			$ms = ($msg!=null) ? $msg : " ";
			$location = FOLDER_PATH . Config::get('log/appErrorLog');
			$file->putFileContent($location,$type .":> " . date("Y-m-d",$t). ":" .date("h:i:sa")." ".$ms." ");
			$file->putFileContent($location,"- " . $content);
	}
}