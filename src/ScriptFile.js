
//unslider scripts
    jQuery(document).ready(function($) {
    	$('.my-slider').unslider();
});
    

//shows the current date in the footer
window.onload = function() {
showDate();
}
function showDate() {
var dNow = new Date();
var localdate= (dNow.getMonth()+1) + '/' + dNow.getDate() + '/' + dNow.getFullYear();
$('#currentDate').text(localdate)
document.getElementById("CurrentDateID").innerHTML = localdate;
}

//Opens external links in a new window/tab
$(document).ready(function(){
 $("a[href^='http'],a[href^='https']").attr('target','_blank');
});

//Google maps

// Create an array of alphabetical characters used to label the markers.
function initMap() {
    
    var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: 46.728163, lng: -95.701632}
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
       
        {lat: 46.728163, lng: -95.701632},
        {lat: 46.827632, lng: -95.832673},
      ]
       
// Set initial data
setState({
  contacts: [
    {key: 1, name: "Brody Holmer", email: "1bholmer@gmail.com"},
  ],
  newContact: Object.assign({}, CONTACT_TEMPLATE),
});
