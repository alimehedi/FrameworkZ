<?php
/*
 * Controller is user action. It manages events that processed 
 * in application. In practical, controller choose 
 * which method & view to build a page.
 */
class ControllerRouter {
	public static function RouteRequest($page, $template) {
		$page = str_replace('-', ' ', strtolower($page));
    	$page = str_replace(' ', '', ucwords($page));
    	$object = 'Controller'.$page;
    	$server = 'controller/handlers/'.$page.'.class.php';    	
    	try {
    		if(file_exists($server)) {
    			include($server);
    			$instance = new $object($page, $template);
    			$instance->setPageTitle();
    			$instance->setExtraMetaTags();
    			$instance->setCssLinks();
    			$instance->setScripts();
    			$instance->execute();
    			$data = $instance->get();
    			extract($data, EXTR_PREFIX_SAME, "wddx");
    			header("GeneratedBy: Ali Mehedi");
				header("Framework: FrameworkZ");
    			include($_REQUEST['_BASE_DIRECTORY_']."/view/MainView.php");
    		} else if($page != "404") {
    			self::RouteRequest("404", $template);
    		}
    	} catch(Exception $zex) {
    		self::RouteRequest("down", $template);
    	}
    }
}
?>