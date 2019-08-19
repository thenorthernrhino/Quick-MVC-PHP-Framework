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
Browser Functions 
*********************************/
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/

function check($pattern){
	$agent = $_SERVER['HTTP_USER_AGENT'];
	$match = preg_match($pattern, strtolower($agent));
	return !empty($match);
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isOpera(){
	check("/opera/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isOpera10_5(){
	return isOpera() && check("/version\/10\.5/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isChrome(){ 
	return check("/\bchrome\b/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isWebKit(){
	return check("/webkit/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isAndroid(){
	return check("/android/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isSafari(){
	return !isChrome() && check("/safari/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isSafari2(){
	return isSafari() && check("/applewebkit\/4/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
// unique to Safari 2
function isSafari3(){
	return isSafari() && check("/version\/3/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isSafari4(){
	return isSafari() && check("/version\/4/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isSafari5(){
	return isSafari() && check("/version\/5/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isiPhone(){
	return isSafari() && check("/iphone/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isiPod(){
	return isSafari() && check("/ipod/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isiPad(){
	return isSafari() && check("/ipad/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isIE(){
	return !isOpera() && check("/msie/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isGecko(){
	return !isWebKit() && check("/gecko/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isGecko3(){
	return isGecko() && check("/rv:1\.9/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isGecko4(){
	return isGecko() && check("/rv:2\.0/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isGecko5(){
	return isGecko() && check("/rv:5\./");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isFF(){
	return isGecko() && check("/firefox/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isFF3_0(){
	return isGecko3() && check("/rv:1\.9\.0/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isFF3_5(){
	return isGecko3() && check("/rv:1\.9\.1/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isFF3_6(){
	return isGecko3() && check("/rv:1\.9\.2/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isWindows(){
	return check("/windows|win32/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isWindowsCE(){
	return check("/windows ce/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isMac(){
	return check("/macintosh|mac os x/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isLinux(){
	return check("/linux/");
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isiOS(){
	return isiPhone() || isiPod() || isiPad();
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function isMobile(){
	return isiOS() || isAndroid();
}

?>