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
/*******************List of math function**********************


***************************************************************/
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function absolute($number){
	$return = abs($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function arc_cosine($number){
	$return = acos($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function inverse_hyperbolic_cosine($number){
	$return = acosh($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function arc_sine($number){
	$return = asin($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function inverse_hyperbolic_sine($number){
	$return = asinh($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function arc_tangent($number){
	$return = atan($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function tangent_of_two($number1,$number2){
	$return = atan2($number1,$number2);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function base_to_another($number,$frombase,$tobase){
	$return = base_convert($number,$frombase,$tobase);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function nearest_integer_up($number){
	$return = ceil($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function cosine($number){
	$return = cos($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function hyperbolic_cosine($number){
	$return = cosh($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function dec_2_bin($number){
	$return = decbin($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function dec_2_hex($number){
	$return = dechex($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function dec_2_oct($number){
	$return = decoct($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function deg_2_rad($number){
	$return = deg2rad($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function rad_2_deg($number){
	$return = rad2deg($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function exponent($number){
	$return = exp($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function expm($number){
	$return = expm1($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function nearest_integer_down($number){
	$return = floor($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function remainder($x,$y){
	$return = fmod($x,$y);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function largest_possible_value(){
	$return = getrandmax();
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function hex_2_dec($string){
	$return = hexdec($string);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function oct_2_dec($string){
	$return = octdec($string);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function right_triangle_hypotenuse($x,$y){
	$return = hypot($x,$y);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function finite($value){
	$return = is_finite($value);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function infinite($value){
	$return = is_infinite($value);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function nan($value){
	$return = is_nan($value);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function pseudo_random(){
	$return = lcg_value($value);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function logn($number,$base = 'e'){
	$return = log($number,$base);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function log_base_10($number){
	$return = log10($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function logp(){
	$return = log1p($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function maximum($value){
	$return = max($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function minimum($value){
	$return = min($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function max_rand_value($value){
	$return = mt_getrandmax();
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function random_integer($min = '0',$max = null){
	if($max = null) $max = mt_getrandmax();
	$return = mt_rand($min,$max);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function pi_value(){
	$return = pi();
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function power_of($x,$y){
	$return = pow($x,$y);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function random($x = '0',$y = null){
	if($y = null) $y = mt_getrandmax();
	$return = rand($x,$y);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function round_float($number,$vmode = 'up',$precision = '0'){
	switch(strtolower($vmode)){
		case 'up':
					$mode = PHP_ROUND_HALF_UP;
				    break;
		case 'down':
					$mode = PHP_ROUND_HALF_DOWN;
					break;
		case 'even':
					$mode = PHP_ROUND_HALF_EVEN;
					break;
		case 'odd':
					$mode = PHP_ROUND_HALF_ODD;
					break;
		default:
			trigger_error('Invalid Mode for Round Float.');
	}


	$return = round($number,$precision,$mode);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function sine($number){
	$return = sin($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function hyperbolic_sine($number){
	$return = sinh($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function square_root($number){
	$return = sqrt($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function tangent($number){
	$return = tan($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function hyperbolic_tangent($number){
	$return = tanh($number);
	return $return;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function c_infinite(){
	$r = INF;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function e(){
	$r = M_E;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function euler_constant(){
	$r = M_EULER;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function nlog_e(){
	$r = M_LNPI;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function nlog_e2(){
	$r = M_LN2;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function nlog_e10(){
	$r = M_LN10;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function nlog_2e(){
	$r = M_LOG2E;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function nlog_10e(){
	$r = M_LOG10E;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function c_pi(){
	$r = M_PI;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function pi_2(){
	$r = M_PI_2;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function pi_4(){
	$r = M_PI_4;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function by1_pi(){
	$r = M_1_PI;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function by2_pi(){
	$r = M_2_PI;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function sroot_pi(){
	$r = M_SQRTPI;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function by2_sroot_pi(){
	$r = M_2_SQRTPI;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function sroot_1by2(){
	$r = M_SQRT1_2;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function sroot_2(){
	$r = M_SQRT2;
	return $r;
}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
function sroot_3(){
	$r = M_SQRT3;
	return $r;
}