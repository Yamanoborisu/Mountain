<!-- The div element for the map -->
<div id="map">
<script>
	// Initialize and add the map
function initMap() {
  // The location of Fuji
  var fuji = {lat: 35.358056, lng: 138.731111};
  // The map, centered at Fuji
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 9, center: fuji});
  // The marker, positioned at Fuji
  var marker = new google.maps.Marker({position: fuji, map: map});
  
  // This event listener will call addMarker() when the map is clicked.
  map.addListener('click', function(event) {
    addMarker(event.latLng);
  });
  
  // Adds a marker to the map.
      function addMarker(location) {
        marker.setMap(null);
        marker = new google.maps.Marker({
          position: location,
          map: map
        });
        map.panTo(location);
        document.getElementById("lat").value = location.lat();
        document.getElementById("lng").value = location.lng();
      }
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVpvd7SOVCDWe3XiCps1r6428suI7BMq0&callback=initMap">
</script>
</div>
