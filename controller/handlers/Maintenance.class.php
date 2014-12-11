<?php
require_once ('Controller.class.php');

class Controller404 extends Controller {
	public function execute() {
		set_error_handler( array( 'Controller', 'FrameworkZ_Error_Handler' ) );
		trigger_error($_SERVER['SERVER_PROTOCOL'] . ' The web site down for maintenance.', E_USER_ERROR);	
	}
	public function setPageTitle() {
		$this->setTitle('Maintenance Page');
	}
	public function setExtraMetaTags() {}
	public function setCssLinks() {}
	public function setScripts() {}	
}
?>