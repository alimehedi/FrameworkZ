<?php
require_once ('Controller.class.php');

/*
 * Error reporting: trigger_error("Vectors need to be of the same size", E_USER_ERROR);
 * data_array['ERROR'] = array(
			"TYPE" => "[]",
			"DATE" => $dt,
			"FILENAME" => $filename,
			"LINE" => $linenum,
			"MESSAGE" => $errmsg
		);
			E_ERROR              => 'error',
			E_WARNING            => 'warning',
			E_PARSE              => 'parsing_error',
			E_NOTICE             => 'notice',
			E_CORE_ERROR         => 'core_error',
			E_CORE_WARNING       => 'core_warning',
			E_COMPILE_ERROR      => 'compile_error',
			E_COMPILE_WARNING    => 'compile_warning',
			E_USER_ERROR         => 'user_error',
			E_USER_WARNING       => 'user_warning',
			E_USER_NOTICE        => 'user_notice',
			E_STRICT             => 'runtime_notice',
			E_RECOVERABLE_ERROR  => 'catchable_fatal_error'
 */
class Controller400 extends Controller {
	public function execute() {		
		$this->data_array = array_merge($this->data_array, array("A" => "64", "B" => "65"));
	}
	
	// use parent::setTitle($new_title) function to set page title
	public function setPageTitle() {
		parent::setTitle("FrameworkZ - home page");
	}
	
	// use parent::addMetaTag($name, $value) function to add meta tag line for this page
	public function setExtraMetaTags() {}
	
	// use parent::addLink($url) function to add css link for this page
	public function setCssLinks() {
		parent::addLink('view/templates/'.parent::getTemplateName().'/common.css');
		parent::addLink('view/templates/'.parent::getTemplateName().'/style.css');
	}
	
	// use parent::addScript($url) function to add script link for this page
	public function setScripts() {}
}
?>