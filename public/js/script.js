$(document).ready(function () {

//  Near the center of the USA
    let initialCenter = {
        lat: 39.498621,
        lng: -98.54201
    };

    let optionsBeg = {
        zoom: 4,
        // removes map and satellite options from the page
        mapTypeControl: false,
        maxZoom:6,
        minZoom:4,
        // Map begins at initial center
        center: initialCenter,
        styles: [{
            "featureType": "all",
            "elementType": "labels",
            "stylers": [{"visibility": "off"}]
        }]
    };

    let map = new google.maps.Map(document.getElementById('map'), optionsBeg);

    google.maps.event.addListener(map, 'click', function (event) {
        // alert('click');
        // cannot click on again if new map is set
        map = new google.maps.Map(document.getElementById('map'), optionsBeg);

        // console.log('location', location);

        // Saves the latitude and logitude of the click
        eventLat = event.latLng.lat();
        eventLng = event.latLng.lng();

        // Add a marker for the area that was clicked
        addMarker({coords: event.latLng});

    });

    // Add Marker Function
    function addMarker(props) {
        let marker = new google.maps.Marker({
            position: props.coords,
            map: map,
            icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
            animation: google.maps.Animation.DROP
        });

        // Check for custom icon
        if (props.iconImage) {
            // Set icon image
            marker.setIcon(props.iconImage);
        }

        // Check content for info window
        if (props.content) {
            let infoWindow = new google.maps.InfoWindow({
                content: props.content
            });
        }
        else {
            let infoWindow = new google.maps.InfoWindow({
                content: '<h1>Your Guess </h1>'
            });
        }

        marker.addListener('click', function () {
            infoWindow.open(map, marker);
        });
    } // end of addMarker function

    function toggleBounce() {
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }

});