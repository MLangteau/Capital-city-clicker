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
        maxZoom:5,
        minZoom:3,
        // Map begins at initial center
        center: initialCenter,
        styles: [{
            "featureType": "all",
            "elementType": "labels",
            "stylers": [{"visibility": "off"}]
        }]
    };

    let map = new google.maps.Map(document.getElementById('map'), optionsBeg);

    function searchCaps (lat,lng) {

    }


});