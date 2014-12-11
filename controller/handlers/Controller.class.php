<?php
abstract class Controller
{
	/*
	 * A multidimensional array containing all
	 * values related to this page
	 */
	public $data_array;
	public $template;
	public $page;
	
	// Not much to do but need this
	public function __construct($page, $template) {
		$this->page = $page;
		$this->template = $template;
		$this->data_array = array();
		$this->data_array['ERROR'] = array(
			"TYPE" => "",
			"DATE" => date("Y-m-d H:i:s (T)"),
			"FILENAME" => "",
			"LINE" => "",
			"MESSAGE" => ""
		);
		$this->data_array['PAGE'] = array();
		$this->data_array['PAGE']['TEMPLATE'] = $template;
		$this->data_array['PAGE']['NAME'] = $page;
		$this->data_array['PAGE']['META'] = array();
		$this->data_array['PAGE']['LINK'] = array();
		$this->data_array['PAGE']['SCRIPT'] = array();
		
		set_error_handler( array( $this, 'FrameworkZ_Error_Handler' ) );
	}
	
	public function getTemplateName() {
		return $this->template;
	}
	
	public function getPageName() {
		return $this->page;
	}

	/*
	 * Just returns $data_array
	 */
	public function get() {return $this->data_array;}

	public function FrameworkZ_Error_Handler($errno, $errmsg, $filename, $linenum, $vars) {
		// timestamp for the error entry
		$dt = date("Y-m-d H:i:s (T)");

		// define an assoc array of error string
		// in reality the only entries we should
		// consider are E_WARNING, E_NOTICE, E_USER_ERROR,
		// E_USER_WARNING and E_USER_NOTICE
		$errortype = array (
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
		);
		
		// set of errors for which a var trace will be saved
		$user_errors = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE);

		$err = "<errorentry>\n";
		$err .= "\t<datetime>" . $dt . "</datetime>\n";
		$err .= "\t<errornum>" . $errno . "</errornum>\n";
		$err .= "\t<errortype>" . $errortype[$errno] . "</errortype>\n";
		$err .= "\t<errormsg>" . $errmsg . "</errormsg>\n";
		$err .= "\t<scriptname>" . $filename . "</scriptname>\n";
		$err .= "\t<scriptlinenum>" . $linenum . "</scriptlinenum>\n";

		if (in_array($errno, $user_errors)) {
			$err .= "\t<vartrace>" . wddx_serialize_value($vars, "Variables") . "</vartrace>\n";
		}
		$err .= "</errorentry>\n\n";
		
		$this->data_array['ERROR'] = array(
			"TYPE" => $errortype[$errno],
			"DATE" => $dt,
			"FILENAME" => $filename,
			"LINE" => $linenum,
			"MESSAGE" => $errmsg
		);

		// save to the error log, and e-mail me if there is a critical user error
		error_log($err, 3, $_REQUEST['_BASE_DIRECTORY_'].'/log/FrameworkZ_Error.log');
	}
	
	public function setTitle($page_title) {
		$this->data_array['PAGE']['TITLE'] = $page_title;
	}
	
	public function addMetaTag($name, $value) {
		$tag = '<meta name="'.$name.'" content="'.$value.'">';
		array_push($this->data_array['PAGE']['META'], $tag);
	}
	
	public function addLink($url) {
		$link = '<link rel="stylesheet" href="'.$url.'">';
		array_push($this->data_array['PAGE']['LINK'], $link);
	}
	
	public function addScript($url) {
		$script = '<script type="text/javascript" src="'.$url.'"></script>';
		array_push($this->data_array['PAGE']['SCRIPT'], $script);
	}
	
	/*
	 * This where things happens :). The function of chain functions
	 * adds values into to the multidimensional array: $data_array with
	 * unique keys. You can create separate functions and switch according to
	 * $_REQUEST[].
	 */
	abstract function execute();
	
	// use parent::setTitle($new_title) function to set page title
	abstract function setPageTitle();
	
	// use parent::addMetaTag($name, $value) function to add meta tag line for this page
	abstract function setExtraMetaTags();
	
	// use parent::addLink($url) function to add css link for this page
	abstract function setCssLinks();
	
	// use parent::addScript($url) function to add script link for this page
	abstract function setScripts();
}
?>