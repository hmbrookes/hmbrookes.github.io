function myMap() {
	var myMarkerLoc = {lat: 55.9107555, lng: -3.3175649};
	var myMarker2Loc = {lat: 55.932655, lng: -3.0744477};
	var myMarker3Loc = {lat: 55.9421746,lng: -3.2715189};
	var myCenter = {lat: 55.9530282, lng: -3.1956276};
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 11,
		center: myCenter,
		disableDefaultUI: true
	});
	var marker = new google.maps.Marker({
		position: myMarkerLoc,
		map: map,
		title: 'Heriot Watt University'
	});
	var marker2 = new google.maps.Marker({
		position: myMarker2Loc,
		map: map,
		title: 'Queen Margaret University'
	});
	var marker3 = new google.maps.Marker({
		position: myMarker3Loc,
		map: map,
		title: 'Edinburgh Zoo'
	});
	marker.addListener('click', function() {
		map.setZoom(14);
		map.setCenter(marker.getPosition());
		window.alert("Heriot Watt University");
	});
	marker2.addListener('click', function() {
		map.setZoom(14);
		map.setCenter(marker2.getPosition());
		window.alert("Queen Margaret University");
	});
	marker3.addListener('click', function() {
		map.setZoom(14);
		map.setCenter(marker3.getPosition());
		window.alert("Edinburgh Zoo");
	});
}
