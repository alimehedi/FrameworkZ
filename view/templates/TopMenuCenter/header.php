<header class="page_header">
	<nav class="top">
		<ul class="hmenu topmenu">
			<li class="logo">
				Hibijibi.com
				<span>Organized chaos of creative classified ads!</span>
			</li>
			<li class="<?php if(strtolower($PAGE['NAME']) == 'home') {echo 'current'; } ?>" style="margin-left: 200px;"><a href="?__page=home">BROWSE</a></li>
			<li class="<?php if(strtolower($PAGE['NAME']) == 'search') {echo 'current'; } ?>"><a href="?__page=search">SEARCH</a></li>
			<li class="<?php if(strtolower($PAGE['NAME']) == 'watchlist') {echo 'current'; } ?>"><a href="?__page=watch-list">WATCH LIST (2)</a></li>
			<li class="<?php if(strtolower($PAGE['NAME']) == 'savedsearch') {echo 'current'; } ?>"><a href="?__page=saved-search">SAVED (5)</a></li>
			<li class="<?php if(strtolower($PAGE['NAME']) == 'myads') {echo 'current'; } ?>"><a href="?__page=my-ads">MY ADS</a></li>
			<li style="float: right;">
				<a href="#account">ACCOUNT</a>
			</li>
			<li style="float: right;">
				<a href="#city">Toronto</a>
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