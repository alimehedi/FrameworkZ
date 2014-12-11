<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css" type="text/css" />

<script src="assets/js/fullscreen.js" type="text/javascript"></script>

<title>Template</title>
</head>
<body class="fssb">
	<img id="bg-image" class="bg-img" src="images/bg/abg21.jpg" alt="Image not found." />
	<div class="bg"></div>
	<div id="top-menu">
		<div class="content">
			<div class="left">
				<img src="view/templates/default/images/tltdb-logo.png" class="logo" />
			</div>
			<div class="right">
				<div class="search-box">
					<form>
				        <input type="text" value="Search for local sports and tournaments..." size="40" required />
				        <button type="submit">Search</button>
				    </form>   
					
				</div>
				<div class="user-box">
					<div id="user-profile">
						<img class="profile" src="view/templates/default/images/user1.gif" />
						<span id="user-name">Ali Mehedi</span>
						<ul id="nav">
						  <li><a href="#" id="settings"><img src="view/templates/default/images/Settings-32.png" /></a>
						      <ul class="page_nav">
						      	<li>
						      		
						      	</li>
						      </ul>
						  </li>
						</ul>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
	<div id="main-body">
		<div id="scroll-position" title="Scroll position on page."></div>
		<div class="body-content">
			
		</div>
		<div class="clear"></div>
	</div>
	<div id="footer-top">
		
	</div>
	<div id="footer-bottom">
		
	</div>
	<script type="text/javascript">
		var FullscreenrOptions = {  width: 907, height: 680, bgID: '#bg-image'};
		jQuery.fn.fullscreenr(FullscreenrOptions); 
		$(document).ready(function () {
			$('#bg-image').hide();
			var images=[
	   				"view/templates/default/images/bg/abg1.jpg",
	 				"view/templates/default/images/bg/abg2.jpg",
	 				"view/templates/default/images/bg/abg3.jpg",
	 				"view/templates/default/images/bg/abg4.jpg",
	 				"view/templates/default/images/bg/abg5.jpg",
	 				"view/templates/default/images/bg/abg6.jpg",
	 				"view/templates/default/images/bg/abg7.jpg",
	 				"view/templates/default/images/bg/abg8.jpg",
	 				"view/templates/default/images/bg/abg9.jpeg",
	 				"view/templates/default/images/bg/abg10.jpeg",
	 				"view/templates/default/images/bg/abg11.jpeg",
	 				"view/templates/default/images/bg/abg12.jpg",
	 				"view/templates/default/images/bg/abg13.jpg",
	 				"view/templates/default/images/bg/abg14.jpg",
	 				"view/templates/default/images/bg/abg15.jpg",
	 				"view/templates/default/images/bg/abg16.jpg",
	 				"view/templates/default/images/bg/abg17.jpg",
	 				"view/templates/default/images/bg/abg18.jpg",
	 				"view/templates/default/images/bg/abg19.jpg",
	 				"view/templates/default/images/bg/abg20.jpg",
	 				"view/templates/default/images/bg/abg21.jpg", 
	 				"view/templates/default/images/bg/abg22.jpg"];
			$('<img/>').attr('src', images[3]).load(function() {
	   			$('#bg-image').attr('src', images[3]).fadeIn(function(){
		   			setInterval (function () {
		   				var random = Math.floor(Math.random() * 22);
		    			$('<img/>').attr('src', images[random]).load(function() {
		    				$('#bg-image').fadeOut(function(){
		    					$('#bg-image').attr('src', images[random]).fadeIn('slow');
		    				});
		    			});
					}, 10000);				
	   			});
			});
			var stop = $(window).scrollTop();
			$('#scroll-position').css('top', (stop+43));
			$(window).scroll(function () { 
	      		stop = $(window).scrollTop();
				$('#scroll-position').css('top', (stop+43));
	    	});
	    	$("#nav > li").hover( function(){
			    $('ul.page_nav', this).slideDown('fast');
			}, function(){
			    $('ul.page_nav', this).slideUp('fast');
			});
		});
	</script>
</body>
</html>