@extends('admin.index')

@section('content2')
<strong><i class="glyphicon glyphicon-globe"></i> Peta</strong>
<hr>
<div id="map" style="width: 80%;"></div>

@stop

@section('script')
<!-- peta -->
<script>
var map;
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: -34.397, lng: 150.644},
		zoom: 8
	});
	var infoWindow = new google.maps.InfoWindow({map: map});

  	// Try HTML5 geolocation.
  	if (navigator.geolocation) {
  		navigator.geolocation.getCurrentPosition(function(position) {
	  		var pos = {
	  			lat: position.coords.latitude,
	  			lng: position.coords.longitude
	  		};

	  		infoWindow.setPosition(pos);
	  		infoWindow.setContent('Location found.');
	  		map.setCenter(pos);
  		}, function() {
  			handleLocationError(true, infoWindow, map.getCenter());
  		});
  	} else {
	    // Browser doesn't support Geolocation
	    handleLocationError(false, infoWindow, map.getCenter());
	}
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(browserHasGeolocation ?
		'Error: The Geolocation service failed.' :
		'Error: Your browser doesn\'t support geolocation.');
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKGnrU99_YZNYBR9Kid4-hjrxDW0lmZsY&callback=initMap" async defer></script>
@stop