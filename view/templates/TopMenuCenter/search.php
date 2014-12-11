<script type="text/javascript">
var map = null;
var geocoder = null;
var markersArray = [];
var infowindow = null;

function initialize(id, zum) {
  geocoder = null;
  map = null;
  
  var haightAshbury = new google.maps.LatLng(37.7699298, -122.4469157);
  var mapOptions = {
    zoom: zum,
    center: haightAshbury,
    mapTypeControl: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map =  new google.maps.Map(document.getElementById(id), mapOptions);
  geocoder = new google.maps.Geocoder();
  infowindow = new google.maps.InfoWindow({
        content: 'Hibijibi.com',
        maxWidth: 200
  });
  addMarker(haightAshbury);
}

function placeMarker(location, gltd, glgd) {
  	    if (marker) {
  	        marker.setMap(null);
  	        marker = null;
  	        placeMarker(location, gltd, glgd);
  	    }
  	    else {
  	    	marker = new google.maps.Marker({
  	            position: location, 
  	            map: map,
  	            draggable:true
  	        });
  	    }
  	    google.maps.event.addListener (
          	    marker,
          	    'drag',
      	    function() {
      	    	document.getElementById(gltd).value = marker.position.lat();
      	    	document.getElementById(glgd).value = marker.position.lng();
      	    }
       );
}
	  	
function codeAddress(id, lanid, lunid) {
	    var address = document.getElementById(id).value;
	    geocoder.geocode( { 'address': address}, function(results, status) {
	      if (status == google.maps.GeocoderStatus.OK) {
	        map.setCenter(results[0].geometry.location);
	        document.getElementById(lanid).value = results[0].geometry.location.lat();
	        document.getElementById(lunid).value = results[0].geometry.location.lng();
	        placeMarker(results[0].geometry.location, lanid, lunid);
	      } else {
	        alert("Geocode was not successful for the following reason: " + status);
	      }
	   });
  }

function deinitialize() {
  geocoder = null;
  map = null;	
}

function addMarker(location, contentString) {
  var letter = String.fromCharCode("A".charCodeAt(0) + (markersArray.length - 1));
  var letterIcon = "http://maps.google.com/mapfiles/marker" + letter + ".png";
  
  marker = new google.maps.Marker({
    position: location,
    icon:letterIcon,
    map: map
  });
  markersArray.push(marker);
  marker.html = contentString;
  google.maps.event.addListener(marker, 'click', function(){
    infowindow.setContent(this.html);
    infowindow.open(map, this);
  });
}

// Removes the overlays from the map, but keeps them in the array
function clearOverlays() {
  if (markersArray) {
    for (i in markersArray) {
      markersArray[i].setMap(null);
    }
  }
}

// Shows any overlays currently in the array
function showOverlays() {
  if (markersArray) {
    for (i in markersArray) {
      markersArray[i].setMap(map);
    }
  }
}

// Deletes all markers in the array by removing references to them
function deleteOverlays() {
  if (markersArray) {
    for (i in markersArray) {
      markersArray[i].setMap(null);
    }
    markersArray.length = 0;
  }
}

function init() {
  $('#map-view').empty().html('<img src="asset/images/loader.gif" alt="Loading page.." style="display: inline; width: 20px; height: 20px; "  />');
  initialize('map-view', 5);
}

</script>
<?php
	include("header.php");
?>
<section class="page_body">
	<header class="breadcrumbs">
		<ul class="hmenu">
			<li><a href="#">Home</a></li>
			<li class="next"></li>
			<li><a href="#">Vehicles</a></li>
			<li class="next"></li>
			<li><a href="#">Vans</a></li>
			<li class="next"></li>
			<li><a href="#">Camper Vans</a></li>
			<li class="next"></li>
			<li><a href="#">1989 VW Westfalia Vanagon</a></li>
		</ul>
<div style="float: right; width: 350px;">
	<div class="ui-buttonset" id="radioset" style="float: right;">
		<input class="ui-helper-hidden-accessible" id="radio0" name="view-type" checked="checked" type="radio" val="table-view" /><label aria-disabled="false" role="button" class="ui-state-active ui-button ui-widget ui-state-default ui-button-text-only ui-corner-left" for="radio0"><span class="ui-button-text"><img src="assets/images/table_insert_column.png" alt="Table view" />Table</span></label>
		<input class="ui-helper-hidden-accessible" id="radio1" name="view-type" type="radio" val="list-view" /><label aria-disabled="false" role="button" class="ui-button ui-widget ui-state-default ui-button-text-only ui-corner-left" for="radio1"><span class="ui-button-text"><img src="assets/images/view_outline.png" alt="List view" />List</span></label>
		<input class="ui-helper-hidden-accessible" id="radio2" name="view-type" type="radio" val="map-view" /><label aria-disabled="false" role="button" class="ui-button ui-widget ui-state-default ui-button-text-only" for="radio2"><span class="ui-button-text"><img src="assets/images/map_pin.png" alt="Map view" />Map</span></label>
		<input class="ui-helper-hidden-accessible" id="radio3" name="view-type" type="radio" val="thumb-view" /><label aria-disabled="false" role="button" class="ui-button ui-widget ui-state-default ui-button-text-only ui-corner-right" for="radio3"><span class="ui-button-text"><img src="assets/images/view_thumbnail.png" alt="Map view" />Thumb</span></label>
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>
	</header>
	<section id="container">
		<aside id="filter">
			<div  id="filter-content" class="filter-content">
				
			</div>
			<button id="collapse-filter" class="collapse-filter" title="Collapse left">.</button>
		</aside>
		<div class="main-container">
			<div class="view" id="table-view">
<table id="myTable" class="tablesorter"> 
<thead> 
<tr> 
    <th id="image" title="Sort">IMAGE</th> 
    <th id="title" title="Sort">TITLE</th> 
    <th id="date" title="Sort">DATE POSTED</th> 
    <th id="distance" title="Sort">DISTANCE</th> 
    <th id="price" title="Sort">PRICE</th> 
</tr> 
</thead> 
<tbody> 
<tr> 
    <td class="image">Smith</td> 
    <td class="title">John</td> 
    <td class="date">jsmith@gmail.com</td> 
    <td class="distance">$50.00</td> 
    <td class="price">http://www.jsmith.com</td> 
</tr> 
<tr> 
    <td class="image">Bach</td> 
    <td class="title">Frank</td> 
    <td class="date">fbach@yahoo.com</td> 
    <td class="distance">$50.00</td> 
    <td class="price">http://www.frank.com</td> 
</tr> 
<tr> 
    <td class="image">Doe</td> 
    <td class="title">Jason</td> 
    <td class="date">jdoe@hotmail.com</td> 
    <td class="distance">$100.00</td> 
    <td class="price">http://www.jdoe.com</td> 
</tr> 
<tr> 
    <td class="image">Conway</td> 
    <td class="title">Tim</td> 
    <td class="date">tconway@earthlink.net</td> 
    <td class="distance">$50.00</td> 
    <td class="price">http://www.timconway.com</td> 
</tr> 
<tr> 
    <td class="image">Doe</td> 
    <td class="title">Jason</td> 
    <td class="date">jdoe@hotmail.com</td> 
    <td class="distance">$100.00</td> 
    <td class="price">http://www.jdoe.com</td> 
</tr> 
<tr> 
    <td class="image">Conway</td> 
    <td class="title">Tim</td> 
    <td class="date">tconway@earthlink.net</td> 
    <td class="distance">$50.00</td> 
    <td class="price">http://www.timconway.com</td> 
</tr> 
<tr> 
    <td class="image">Doe</td> 
    <td class="title">Jason</td> 
    <td class="date">jdoe@hotmail.com</td> 
    <td class="distance">$100.00</td> 
    <td class="price">http://www.jdoe.com</td> 
</tr> 
<tr> 
    <td class="image">Conway</td> 
    <td class="title">Tim</td> 
    <td class="date">tconway@earthlink.net</td> 
    <td class="distance">$50.00</td> 
    <td class="price">http://www.timconway.com</td> 
</tr> 
<tr> 
    <td class="image">Doe</td> 
    <td class="title">Jason</td> 
    <td class="date">jdoe@hotmail.com</td> 
    <td class="distance">$100.00</td> 
    <td class="price">http://www.jdoe.com</td> 
</tr> 
<tr> 
    <td class="image">Conway</td> 
    <td class="title">Tim</td> 
    <td class="date">tconway@earthlink.net</td> 
    <td class="distance">$50.00</td> 
    <td class="price">http://www.timconway.com</td> 
</tr> 
<tr> 
    <td class="image">Doe</td> 
    <td class="title">Jason</td> 
    <td class="date">jdoe@hotmail.com</td> 
    <td class="distance">$100.00</td> 
    <td class="price">http://www.jdoe.com</td> 
</tr> 
<tr> 
    <td class="image">Conway</td> 
    <td class="title">Tim</td> 
    <td class="date">tconway@earthlink.net</td> 
    <td class="distance">$50.00</td> 
    <td class="price">http://www.timconway.com</td> 
</tr> 
<tr> 
    <td class="image">Doe</td> 
    <td class="title">Jason</td> 
    <td class="date">jdoe@hotmail.com</td> 
    <td class="distance">$100.00</td> 
    <td class="price">http://www.jdoe.com</td> 
</tr> 
<tr> 
    <td class="image">Conway</td> 
    <td class="title">Tim</td> 
    <td class="date">tconway@earthlink.net</td> 
    <td class="distance">$50.00</td> 
    <td class="price">http://www.timconway.com</td> 
</tr> 
<tr> 
    <td class="image">Doe</td> 
    <td class="title">Jason</td> 
    <td class="date">jdoe@hotmail.com</td> 
    <td class="distance">$100.00</td> 
    <td class="price">http://www.jdoe.com</td> 
</tr> 
<tr> 
    <td class="image">Conway</td> 
    <td class="title">Tim</td> 
    <td class="date">tconway@earthlink.net</td> 
    <td class="distance">$50.00</td> 
    <td class="price">http://www.timconway.com</td> 
</tr> 
<tr> 
    <td class="image">Doe</td> 
    <td class="title">Jason</td> 
    <td class="date">jdoe@hotmail.com</td> 
    <td class="distance">$100.00</td> 
    <td class="price">http://www.jdoe.com</td> 
</tr> 
</tbody> 
</table> <a href="#" id="trigger-link">sort first and third columns</a><br><br>				
			</div>
			<div class="view" id="map-view">
				
			</div>
			<div class="view" id="list-view">
				<ul>
					<li>
						<figure>
							<img src="/FrameworkZ/data/images/car.gif" />
						</figure>
						<div>
							<h4 class="title">Ad title goes here....</h4>
							<span class="price">CAD $302.12</span>
							<span class="description">
Are you STILL stuck RENTING in 2013? That's a paddlin'

If you're old enough to recognize this character it's time you got into a home of your own. 

Quit wasting your hard earned money on rent making someone else rich every month. Why not own your home and start building equity for YOU.

Even if you've been turned down for a mortgage due to something on your credit bureau, we can help. 
							</span>
							<span class="toolbox">
								sadasd
							</span>
						</div>
					</li>
					<li>
						<figure>
							<img src="/FrameworkZ/data/images/car.gif" />
						</figure>
						<div>
							<h4 class="title">Ad title goes here....</h4>
							<span class="price">CAD $302.12</span>
							<span class="description">
Are you STILL stuck RENTING in 2013? That's a paddlin'

If you're old enough to recognize this character it's time you got into a home of your own. 

Quit wasting your hard earned money on rent making someone else rich every month. Why not own your home and start building equity for YOU.

Even if you've been turned down for a mortgage due to something on your credit bureau, we can help. 
							</span>
							<span class="toolbox">
								sadasd
							</span>
						</div>
					</li>
					<li>
						<figure>
							<img src="/FrameworkZ/data/images/car.gif" />
						</figure>
						<div>
							<h4 class="title">Ad title goes here....</h4>
							<span class="price">CAD $302.12</span>
							<span class="description">
Are you STILL stuck RENTING in 2013? That's a paddlin'

If you're old enough to recognize this character it's time you got into a home of your own. 

Quit wasting your hard earned money on rent making someone else rich every month. Why not own your home and start building equity for YOU.

Even if you've been turned down for a mortgage due to something on your credit bureau, we can help. 
							</span>
							<span class="toolbox">
								sadasd
							</span>
						</div>
					</li>
					<li>
						<figure>
							<img src="/FrameworkZ/data/images/car.gif" />
						</figure>
						<div>
							<h4 class="title">Ad title goes here....</h4>
							<span class="price">CAD $302.12</span>
							<span class="description">
Are you STILL stuck RENTING in 2013? That's a paddlin'

If you're old enough to recognize this character it's time you got into a home of your own. 

Quit wasting your hard earned money on rent making someone else rich every month. Why not own your home and start building equity for YOU.

Even if you've been turned down for a mortgage due to something on your credit bureau, we can help. 
							</span>
							<span class="toolbox">
								sadasd
							</span>
						</div>
					</li>
					<li>
						<figure>
							<img src="/FrameworkZ/data/images/car.gif" />
						</figure>
						<div>
							<h4 class="title">Ad title goes here....</h4>
							<span class="price">CAD $302.12</span>
							<span class="description">
Are you STILL stuck RENTING in 2013? That's a paddlin'

If you're old enough to recognize this character it's time you got into a home of your own. 

Quit wasting your hard earned money on rent making someone else rich every month. Why not own your home and start building equity for YOU.

Even if you've been turned down for a mortgage due to something on your credit bureau, we can help. 
							</span>
							<span class="toolbox">
								sadasd
							</span>
						</div>
					</li>
					<li>
						<figure>
							<img src="/FrameworkZ/data/images/car.gif" />
						</figure>
						<div>
							<h4 class="title">Ad title goes here....</h4>
							<span class="price">CAD $302.12</span>
							<span class="description">
Are you STILL stuck RENTING in 2013? That's a paddlin'

If you're old enough to recognize this character it's time you got into a home of your own. 

Quit wasting your hard earned money on rent making someone else rich every month. Why not own your home and start building equity for YOU.

Even if you've been turned down for a mortgage due to something on your credit bureau, we can help. 
							</span>
							<span class="toolbox">
								sadasd
							</span>
						</div>
					</li>
					<li>
						<figure>
							<img src="/FrameworkZ/data/images/car.gif" />
						</figure>
						<div>
							<h4 class="title">Ad title goes here....</h4>
							<span class="price">CAD $302.12</span>
							<span class="description">
Are you STILL stuck RENTING in 2013? That's a paddlin'

If you're old enough to recognize this character it's time you got into a home of your own. 

Quit wasting your hard earned money on rent making someone else rich every month. Why not own your home and start building equity for YOU.

Even if you've been turned down for a mortgage due to something on your credit bureau, we can help. 
							</span>
							<span class="toolbox">
								sadasd
							</span>
						</div>
					</li>
				</ul>
			</div>
			<div class="view" id="thumb-view">
				
			</div>
			<div class="clear"></div>
		</div>			
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
    
    $( "#radioset" )
      .buttonset()
      .live('click', function() {
      	$('.main-container div.view').hide();
        var id = '#'+$("#radioset input[type='radio']:checked").attr('val');
        $(id).fadeIn();
        if(id == '#map-view') {
        	 	init();
        } else {
        	deinitialize();
        	$('#map-view').empty();
        }
      });
    $('#collapse-filter').bind('click', function(e){
		e.preventDefault(); 
    	var id = $("#radioset input[type='radio']:checked").attr('val');
    	var toggleWidth = $(".view").width() == 735 ? "945px" : "735px";
    	if(toggleWidth == '945px') {
    		$('#filter-content').animate({ width: '0px' }, 10, function(){
    			$(".view").animate({ width: toggleWidth }, 10);
    		});	
    	} else {
    		$(".view").animate({ width: toggleWidth }, 10, function(){
    			$('#filter-content').animate({ width: '210px' }, 10);
    		});
    	}
    	if(id == 'map-view') {
        	 init();
        }
        if(id == 'map-view') {
        	 $("#myTable").tablesorter(); 	
        }
    });  
    
    $("#myTable").tablesorter();
    $("#trigger-link").click(function() { 
        // set sorting column and direction, this will sort on the first and third column the column index starts at zero 
        var sorting = [[0,0],[2,0]]; 
        // sort on the first column 
        $("#myTable").trigger("sorton",[sorting]); 
        // return false to stop default link action 
        return false; 
    }); 
    
    $('#myTable th').hover(
    function(){
      $('.'+$(this).attr('id')).css('background', '#CEE3F6');
    },
    function(){
      $('.'+$(this).attr('id')).css('background', '');
    }
  	);
  	$('#myTable tr').hover(
	    function(){
	      $(this).find('td').css('background', '#CEE3F6');
	    },
	    function(){
	      $(this).find('td').css('background', '');
    });
});
</script>