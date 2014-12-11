<?php
	include("header.php");
?>
<section class="page_body">
	<header class="breadcrumbs">

	</header>
	<section id="container">
		
		<div class="clear"></div>
	</section>
</section>	
<?php
	include("footer.php");
?>	
<script>
$(document).ready(function() {	
    // if text input field value is not empty show the "X" button
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