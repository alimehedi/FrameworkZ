<?php
require_once('MainModel.class.php');

class HomeModel extends MainModel
{
    public function __construct($args) {
    	$tmp = array(
 			'PageName' => 'Home',
 			'Message' => 'Success!',
 			'List' => array('A' => 1, 'B' => 2, 'C' => 3)
		);
		$this->vars = array_merge($this->vars, $tmp);		
    }
}
?>