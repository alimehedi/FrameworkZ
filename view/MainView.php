<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title>
        	<?php 
        		echo $PAGE['TITLE'];
        	?>
        </title>
        <meta name="description" content="">

        <?php 
        	foreach($PAGE['META'] as $key => $val) {
        		echo $val;
        	}
        ?>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
 
        <?php 
        	foreach($PAGE['LINK'] as $key => $val) {
        		echo $val;
        	}
        ?>
        
        <?php 
        	foreach($PAGE['SCRIPT'] as $key => $val) {
        		echo $val;
        	}
        ?>

        <!--[if lt IE 9]>
		<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
		<![endif]-->
		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<![endif]-->

    </head>
    <body>   
    	<?php 
    		$layout = $_REQUEST['_BASE_DIRECTORY_'].'/view/templates/'.$PAGE['TEMPLATE'].'/'.strtolower($PAGE['NAME']).'.php';
    		if(file_exists($layout)) {
    			include('templates/'.$PAGE['TEMPLATE'].'/'.strtolower($PAGE['NAME']).'.php');
    		} else {
    			include('templates/default/default.php');
    		}
    	?>
	</body>
</html>