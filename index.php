<?php
/**
 *  Auther: Ali Mehedi
 *	index.php. all
 */
$_REQUEST['_DEBUG'] = false;
$_REQUEST['_BASE_DIRECTORY_'] = dirname(__FILE__);
$_REQUEST['_HOME_DIRECTORY_'] = '/fz-beta';
	
if(!isset($_REQUEST['__page']) || $_REQUEST['__page'] == '') {
	header("Location: ".$_REQUEST['_HOME_DIRECTORY_']."/index.php?__page=home"); 
} else {	
	require_once ($_REQUEST['_BASE_DIRECTORY_'].'/controller/ControllerRouter.class.php');	
	ob_end_clean();
	ob_start();
    ControllerRouter::RouteRequest($_REQUEST['__page'], 'default');
}
?>