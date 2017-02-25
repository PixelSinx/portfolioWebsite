
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


//slides the navigation bar into the frame

$(document).ready(function() { 
  $('#dashboard').hover(
     function() {
		$(this).stop().animate(
		{
			left: '0',
			backgroundColor: 'rgb(255,140,0)'
		},
		500,
		'easeInSine'
		); // end animate
	 }, 
	 function() {
		 $(this).stop().animate(
		{
			left: '-215px',
			backgroundColor: 'rgb(27,45,94)'
		},
		1500,
		'easeOutBounce'
		); // end animate
	 }
  ); // end hover
}); // end ready

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
       
var CONTACT_TEMPLATE = {name: "", email: "", description: "", errors: null};



//Contact Scripts

function updateNewContact(contact) {
  setState({ newContact: contact });
}


function submitNewContact() {
  var contact = Object.assign({}, state.newContact, {key: state.contacts.length + 1, errors: {}});
  
  if (!contact.name) {
    contact.errors.name = ["Please enter your new contact's name"];
  }
  if (!/.+@.+\..+/.test(contact.email)) {
    contact.errors.email = ["Please enter your new contact's email"];
  }

  setState(
    Object.keys(contact.errors).length === 0
    ? {
        newContact: Object.assign({}, CONTACT_TEMPLATE),
        contacts: state.contacts.slice(0).concat(contact),
      }
    : { newContact: contact }
  );
}


/*
 * Model
 */


// The app's complete current state
var state = {};

// Make the given changes to the state and perform any required housekeeping
function setState(changes) {
  Object.assign(state, changes);
  
  ReactDOM.render(
    React.createElement(ContactView, Object.assign({}, state, {
      onNewContactChange: updateNewContact,
      onNewContactSubmit: submitNewContact,
    })),
    document.getElementById('react-app')
  );
}

// Set initial data
setState({
  contacts: [
    {key: 1, name: "Brody Holmer", email: "1bholmer@gmail.com"},
  ],
  newContact: Object.assign({}, CONTACT_TEMPLATE),
});
