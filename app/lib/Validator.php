<?php 
/****************************** 
 * Common Functions
 ******************************/

class Validator{
	protected $errorHandler;
	protected $items;

	/**************************************************************************************************************************************/
	/* ALL USER MODIFICATION RELATED TO THE VALIDATIONS  - Add to the rules
	/**************************************************************************************************************************************/
	protected $rules = 
		[ 'required', 
		  'minlength', 
		  'maxlength', 
		  'email',
		  'alphanum',
		  'match',
		  'checked',
		  'unique',
		];

	public $messages = 
		[   'required'  => 'The :field field is required!',
			'minlength' => 'The :field field must be a minimum of :satisfier length!',
			'maxlength' => 'The :field field must be a maximum of :satisfier length!',
		    'email'     => 'This is an invalid Email Address!',
		    'alphanum'  => 'The :field field must be Alpha Numeric',	
		    'match'     => 'The :field field must match the :satisfier field',
		    'checked'   => 'You must agree to the terms and conditions!',
		    'unique'    => 'That :field is already taken!'
        ];


	***************************************************************************************************************************************/
	public function __construct(ErrorHandler $errorHandler = null){
		$this->errorHandler = $errorHandler;
	}

	**************************************************************************************************************************************/
	/* ALL USER MODIFICATION RELATED TO THE VALIDATIONS
	/**************************************************************************************************************************************/

	protected function required($field, $value, $satisfier){
		return !empty($value);
	} 

	protected function minlength($field, $value, $satisfier){
		return mb_strlen($value) >= $satisfier;
	} 


	protected function maxlength($field, $value, $satisfier){
		return mb_strlen($value) <= $satisfier;
	} 

	protected function email($field, $value, $satisfier){
		return filter_var($value, FILTER_VALIDATE_EMAIL );
	} 

	protected function alphanum($field, $value, $satisfier){
		return ctype_alnum($value);
	} 

	protected function match($field, $value, $satisfier){
		return $value === $this->items[$satisfier];
	} 

	protected function checked($field, $value, $satisfier){
		return $value === 'ON';
	} 

	protected function unique($field, $value, $satisfier){
        $db  = Data::constructDB();
		return !$db->exists($satisfier,[$field => $value]);
	} 

	public function check($items, $rules){
		$this->items = $items;
		foreach($items as $item => $value){
			if(in_array($item, array_keys($rules))){
				$this->validate([
					'field' => $item,
					'value' => $value,
					'rules' => $rules[$item]
				]);
			}
		}
		return $this;
	}

	public function fails(){
		return $this->errorHandler->hasErrors();
	}

	public function errors(){
		return $this->errorHandler;
	}

	protected function validate($item){
		$field = $item['field']; 
		foreach($item['rules'] as $rule => $satisfier){
			if(in_array($rule, $this->rules)){
				if(!call_user_func_array([$this, $rule], [$field, $item['value'], $satisfier])){
					$this->errorHandler->addError(
						str_replace([':field', ':satisfier'], 
									[$field, $satisfier], 
						             $this->messages[$rule]), 
									 $field);
				}
			}
		}
	}
} 