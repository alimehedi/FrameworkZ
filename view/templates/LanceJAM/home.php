<header class="page_header">
	<nav class="top">
		<ul class="hmenu topmenu">
			<li class="current"><a href="#">LanceJAM.com</a></li>
			<li><a href="#">HIRE DEVELOPER</a>
				<ul>
					<li><a href="#">POST PROJECT FOR FREE</a></li>
					<li><a href="#">POST REQUEST FOR PROPOSAL</a></li>
				</ul>
			</li>
			<li><a href="#">FIND WORK</a></li>
			<li><a href="#">MANAGE</a></li>
			<li><a href="#">START A PROJECT!</a></li>
			<li style="float: right;">
				<a href="#">SETTINGS</a>
			</li>
		</ul>
	</nav>
	<div class="banner">
		<div class="left">
			<div id="criteria">
				<button class="button" role="button">
				  Button #1
				</button>
				
				<button class="button" role="button">
				  Button #2
				</button>
			</div>
			<div id="search">
				<form>
			        <input id="field" name="field" type="text" />
			        <div id="delete"><span id="x">x</span></div>
			        <input id="submit" name="submit" type="submit" value="Search" />
			    </form>
			</div>
			<div class="clear"></div>
		</div>
		<div class="right">
			
		</div>
		<div class="clear"></div>
	</div>
</header>
<section class="page_body">

</section>		
<footer class="page_footer">

	<div class="clear"></div>
</footer>
<script>
$(document).ready(function() {	
    $("#field").keyup(function() {
        $("#x").fadeIn();
        if ($.trim($("#field").val()) == "") {
            $("#x").fadeOut();
        }
    });
    // on click of "X", delete input field value and hide "X"
    $("#x").click(function() {
        $("#field").val("");
        $(this).hide();
    });
});
</script>