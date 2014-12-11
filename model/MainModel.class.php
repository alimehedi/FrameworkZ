<?php 
/*
 * Model is application business layer that represents the 
 * business entities such as customers, employee, 
 * products, sales etc
 */

abstract class MainModel {
	public $vars = array();	
	
	/*
	 * Only implement this function and appent values into $vars;
	 */
    abstract protected function __construct($args);

    public function set($key, $value, $overwrite) {
    	if(array_key_exists($key, $this->vars)) {
    		if($overwrite) {
    			$this->vars[$key] = $var;
    		} else { 
    			return false; 
    		}
    	} else {
    		$this->vars[$key] = $var;
    	}
    	return true;
    }
    
    public function get() {
        return $this->vars;
    }
}
?>