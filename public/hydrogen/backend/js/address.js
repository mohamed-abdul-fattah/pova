var marker;
// Create initial map.
function initMap() {
  var uluru = {lat: 26.820553, lng: 30.802498};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: uluru
  });
  google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(map, event.latLng);
  });
  if (isEdit) {
    var location = {
      lat: lat, lng: lng
    }
    placeMarker(map, location);
  }
}

// Add marker on map.
function placeMarker(map, location) {
  // Add marker.
  if (marker) {
    marker.setPosition(location);
  } else {
    marker = new google.maps.Marker({
      position: location,
      map: map
    });
  }
  // Change lat and lng input values.
  $('#lat').val(location.lat);
  $('#lng').val(location.lng);
}
