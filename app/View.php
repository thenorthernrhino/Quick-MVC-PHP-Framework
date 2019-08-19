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
class View {

	protected $title;
	protected $validator;
	protected $_bodyContent;

	private $_variable;

	public $host;
	public $uri;
	public $reuqest;
	public $route;
	public $validation;
	public $url;
    public $viewPath;
    public $section = array();
    public $layout;
	public $page;
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function __construct(){
		$this->host       = $_SERVER['HTTP_HOST'];
		$this->uri        = $_SERVER['REQUEST_URI'];
		$this->request    = $_SERVER['REQUEST_METHOD']; 
		$this->route      = preg_replace('/^url=index.php&url=(.*)/','$1',$_SERVER['QUERY_STRING']);
		$this->url        = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];   
	}

//--------------------------------------------------------------------------------
// PUBLIC PAGE FUNCTIONS
//--------------------------------------------------------------------------------
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function is_Page_name($name){
        return $this->page = $name;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function title($name){
		return $this->title = $name;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function inc($page){
		$this->pageRender($page,'common');
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function render($page){
		$this->pageRender($page,'pages');
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function layout($name, $noInclude = false,$header = NULL, $footer = NULL){
		if($noInclude == true){
            $this->pageRender($header,'common');
			$this->pageRender($name, 'pages');
			$this->pageRender($footer,'common');
		}
		else{	 
			$this->pageRender($name,'pages');
		}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function __toString(){
        $this->pageRender();
        return '';
    }

//--------------------------------------------------------------------------------
// PUBLIC FOLDER FUNCTIONS
//--------------------------------------------------------------------------------
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function css($link,$extra = array()){
		$env = strtolower(ENVIRONMENT);
			if($env == 'production' || $env == 'testing'){
				$css = '<link href="/public/'. trim($link) .'.css' .'" rel="stylesheet"/>';
			}

			if($env == 'production' || $env == 'testing' && !empty($extra)){
					$css = '<link href="/public/'. trim($link) .'.css' .'" rel="stylesheet"';
					foreach($extra as $key => $value){
						$css .= " ".$key .'="'. $value .'" ';
					}
					$css .='/>';
				}

			if($env == 'development' && $extra == NULL){
				$css = '<link href="'.url::base().'public/'. trim($link) .'.css' .'" rel="stylesheet"/>';
			}

			if($env == 'development' && $extra !== NULL){
				$css = '<link href="'.url::base().'public/'. trim($link) .'.css' .'" rel="stylesheet"';
					foreach($extra as $key => $value){
						$css .= " ".$key .'="'. $value .'" ';
					}
					$css .='/>';
			}
		 return $css;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function js($link,$extra = array()){
		$env = strtolower(ENVIRONMENT);
			if($env == 'production' || $env == 'testing' && $extra == NULL){
				$js = '<script src="/public/'. trim($link) .'.js"></script>';
			}

			if($env == 'production' || $env == 'testing' && $extra != NULL){
				$js = '<script src="/public/'. trim($link) .'.js"';
				foreach($extra as $key => $value){
						$js .= " ".$key .'="'. $value .'" ';
					}
				$js .= '></script>';
			}

			if($env == 'development' && $extra == NULL){
				$js = '<script src = "'.url::base().'public/'. trim($link) .'.js "></script>';
			}

			if($env == 'development' && $extra !== NULL){
				$js = '<script src = "'.url::base().'public/'. trim($link) .'.js" '; 
					foreach($extra as $key => $value){
						$js .= " ".$key .'="'. $value .'" ';
					}
					$js .= '></script>';
			}
		 return $js;

	}

//--------------------------------------------------------------------------------
// PUBLIC LINK FUNCTIONS
//--------------------------------------------------------------------------------
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function API($component_path,$async = false, $defer = false){
		$js = '<script ';
		if($async == true){
			$js .= 'async '; 
		}
		if($defer == true){
			$js .= 'defer '; 
		}
		$js .= 'src="'.trim($component_path).'"></script>';
		return $js;
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function cdn($componentType,$component_path, $extra = array()){
		$cdn = '';
		if(trim($componentType) == 'css'){
		 $cdn = '<link href="' . trim($component_path);
			 
		  if(!empty($extra) && is_array($extra)){
			foreach($extra as $key => $value){
				$cdn .= " ".$key .'="'. $value .'" ';
			}
		 }
		  $cdn .=	'" />';
		 return $cdn;
        }

        if(trim($componentType) == 'js'){
         $cdn = '<script src="' . trim($component_path);
		 
		 if(!empty($extra) && is_array($extra)){
			foreach($extra as $key => $value){
				$cdn .= " ".$key .'="'. $value .'" ';
			}
		 }
		 
		 $cdn .= '"></script>';
		 return $cdn;
        }
	}

//--------------------------------------------------------------------------------
// PUBLIC PAGE OBJECT FUNCTIONS
//--------------------------------------------------------------------------------
	/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	public function img($name, $extra=array()){
		$env = strtolower(ENVIRONMENT);
		if($env == 'production' || $env == 'testing'){
				$img = '<img src="public/' .trim($name). '"';
				if (!empty($extra)){
					foreach($extra as $key => $value){
						$img .= ' ' . $key . '="' . $value .'"'; 
					}
				}	
				$img .= ' />';
				return $img;
			}

			if($env == 'development'){
				$img = '<img src="'.url::base().'public/' .trim($name). '"';
				if (!empty($extra)){
					foreach($extra as $key => $value){
						$img .= ' ' . $key . '="' . $value .'"'; 
					}
				}	
				$img .= ' />';
				return $img;
			}
	}
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/

	public function icon($path,$extra = array()){
		$env = strtolower(ENVIRONMENT);
			$icon = '';
			if($env == 'production' || $env == 'testing'){
				if($size != null){
					$icon = '<link href="/public/'. trim($path) .'"';
					  if(!empty($extra) && is_array($extra)){
							foreach($extra as $key => $value){
								$icon .= " ".$key .'="'. $value .'" ';
							}
					  }
					$icon .= ' />';
				 return $icon;
				}
			}

			if($env == 'development'){
				 if($size != null){
					$icon = '<link href="'.url::base().'/public/'. trim($path) .'"';
					  if(!empty($extra) && is_array($extra)){
							foreach($extra as $key => $value){
								$icon .= " ".$key .'="'. $value .'" ';
							}
					  }
					$icon .= ' />';
				 return $icon;
				}
			}
	}

//--------------------------------------------------------------------------------
// PUBLIC PAGE VARIABLE FUNCTIONS
//--------------------------------------------------------------------------------
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
	// Example: $this->view->set('res',$arr); //Within the controller;
	public function set($name,$value){
		$this->_variables[$name] = $value;
	}

	// Example: $this->get('res'); //Within the View;
	public function get($name){
		if(isset($this->_variables[$name])){
		    return $this->_variables[$name];
        } else {
            $this->_variables[$name] = NULL;
            return $this->_variables[$name];
        }
	}

//--------------------------------------------------------------------------------
// PUBLIC PAGE META FUNCTIONS
//--------------------------------------------------------------------------------
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/

	public function meta($extra = array()){
		$meta = '';
			$meta = '<meta ';
			 if(!empty($extra) && is_array($extra)){
				foreach($extra as $key => $value){
					$meta .= " ".$key .'="'. $value .'" ';
				}
			  }
			 $meta .= '">';
			return $meta;
	}


//--------------------------------------------------------------------------------
// PRIVATE FUNCTIONS
//--------------------------------------------------------------------------------
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
    private function pageRender($name,$subFolder = NULL) {		
        // extract the variables for view pages
		if(!empty($this->variables)){
			extract($this->variables,EXTR_PREFIX_SAME,"wddx");
		}
        // the view path
		if($subFolder != NULL){
		   $path = Page::UrlContent('~/'.trim($subFolder).'/'.trim($name).'.php');
		} else {
		   $path = Page::UrlContent('~/'.trim($name).'.php');
		}
        // start buffering
        ob_start();
        // render page content
        require_once($path);
        // get the body contents
        $this->_bodyContent = ob_get_contents();
		// clean the buffer
        ob_end_clean();
        // check if we have any layout defined
        if(!empty($this->layout) && (Page::isAjax())){
            // we need to check the path contains app prefix (~)
            $this->layout = Page::UrlContent($this->layout);
            // start buffer 
            ob_start();
            // include the template
            require_once($this->layout);
        }else{
            ob_start();
            // just output the content
            echo $this->_bodyContent;
        }
        // end buffer
        ob_end_flush();
    }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
    private function renderBody(){
    	// if we have content, then deliver it
        if(!empty($this->_bodyContent)){
            echo $this->_bodyContent;
        }
    }
/***************************************************************
Function Name:
Type: 
Inputs: 

Outputs:

Description
***************************************************************/
    private function renderSection($section){
        if(!empty($this->section) && array_key_exists($section, $this->section)){
            echo $this->section[$section];
        }
    }
}