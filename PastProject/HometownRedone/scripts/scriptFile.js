//unslider scripts
    jQuery(document).ready(function($) {
    	$('.my-slider').unslider();
});
    
//Google maps

// Create an array of alphabetical characters used to label the markers.
function initMap() {
    
    var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: {lat: 46.728126, lng: -95.701211}
        });
    
var labels = 'AB';

 var markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length]
          });
        });        
var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'images/marker/m'});
      }  
      var locations = [
        {lat: 46.728126, lng: -95.701211},
      ]