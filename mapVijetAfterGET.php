<!-- The div element for the map -->
<div id="map" data-lat='<?php echo $lat; ?>' data-lng='<?php echo $lng; ?>'>
<!-- Replace the value of the key parameter with your own API key. -->
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVpvd7SOVCDWe3XiCps1r6428suI7BMq0&callback=initMap">
</script>

<script>
// Initialize and add the map
function initMap() {
  // The location of currentPoint, take it from GET-array
  var currentPoint = {lat: 35.358056, lng: 138.731111};
  currentPoint.lat = Number(document.getElementById('map').dataset.lat); 
  currentPoint.lng = Number(document.getElementById('map').dataset.lng);

  
    // The map, centered at currentPoint
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 9, center: currentPoint});
  // The marker, positioned at currentPoint
  var marker = new google.maps.Marker({position: currentPoint, map: map});
  
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
</div>