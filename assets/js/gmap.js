var geocoder;
var circle;
var map;
var infoWindow;

//INITIALISE
function initializeGoogleMap()	{
	google.maps.event.addDomListener(window, 'load', initialize);
}

function initialize()	{
  var mapOptions = {center: new google.maps.LatLng(12.9192, 77.6534),zoom: 12};
  map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
  geocoder = new google.maps.Geocoder();
  // Define the circle and set its editable property to true.
  circle = new google.maps.Circle({center: mapOptions.center,editable: true,draggable: true,radius:10000});

  circle.setMap(map);
  // Add an event listener on the circle.
  google.maps.event.addListener(circle, 'bounds_changed', showNewRect);
  // Define an info window on the map.
  infoWindow = new google.maps.InfoWindow();
  setFormData(10, circle.getCenter().toString());

}


// GEOCODING
function codeAddress(address) {

  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
      });
      circle.setCenter(results[0].geometry.location)
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}


//MAPPING
function showNewRect(event) {
  var radius_result = Math.ceil(circle.getRadius()/1000);
  var contentString = /*circle.getCenter().toString()+ '<br>' +*/'Radius '+radius_result + " KM"
  // Set the info window's content and position.
  setFormData(radius_result, circle.getCenter().toString());
  infoWindow.setContent(contentString);
  infoWindow.setPosition(circle.getCenter());
  infoWindow.open(map);
}

function setFormData(radius,latlng)	{
	$("#radius_id").val(radius+ "KM");
	$("#latlong_id").val(latlng);
}




