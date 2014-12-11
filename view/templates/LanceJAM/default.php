<header class="page_header">
	<nav class="top">
		<ul class="hmenu topmenu">
			<li><a href="#">LanceJAM.com</a></li>
			<li style="margin-left: 200px;"><a href="#">BROWSE</a></li>
			<li class="current"><a href="#">SEARCH</a></li>
			<li><a href="#">WATCH LIST (2)</a></li>
			<li><a href="#">SAVED (5)</a></li>
			<li><a href="#">MY ADS</a></li>
			<li style="float: right;">
				<a href="#">ACCOUNT</a>
			</li>
			<li style="float: right;">
				<a href="#">CITY: Toronto</a>
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
			<a id="post-button" href="#">
				Post your ad!
			</a>
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