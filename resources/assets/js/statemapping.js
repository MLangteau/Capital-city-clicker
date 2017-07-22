//  Center of the USA

let initialCenter = {
    lat: 39.498621,
    lng: -98.54201
};
let marker = initialCenter;
let randomStCapMarker = initialCenter;
let questionCounter = 0;

// Options at the beginning of the game
let optionsBeg = {
    zoom: 4,
    // removes map and satellite options from the page
    mapTypeControl: false,
    // Map begins at initial center
    center: initialCenter,
    styles: [{
        "featureType": "all",
        "elementType": "labels",
        "stylers": [{"visibility": "off"}]
    }, {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [{"visibility": "off"}]
    }, {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [{"visibility": "off"}]
    }, {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [{"color": "#c9323b"}]
    }, {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [{"color": "#c9323b"}, {"weight": 1.2}]
    }, {
        "featureType": "administrative.locality",
        "elementType": "geometry.fill",
        "stylers": [{"lightness": "-1"}]
    }, {
        "featureType": "administrative.neighborhood",
        "elementType": "labels.text.fill",
        "stylers": [{"lightness": "0"}, {"saturation": "0"}]
    }, {
        "featureType": "administrative.neighborhood",
        "elementType": "labels.text.stroke",
        "stylers": [{"weight": "0.01"}]
    }, {
        "featureType": "administrative.land_parcel",
        "elementType": "labels.text.stroke",
        "stylers": [{"weight": "0.01"}]
    }, {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [{"color": "#f42d18"}]
    }, {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [{"color": "#f42d18"}]
    }, {
        "featureType": "road",
        "elementType": "geometry.stroke",
        "stylers": [{"visibility": "off"}]
    }, {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [{"color": "#f42d18"}]
    }, {
        "featureType": "road.highway.controlled_access",
        "elementType": "geometry.stroke",
        "stylers": [{"color": "#f42d18"}]
    }, {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [{"color": "#f42d18"}]
    }, {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [{"color": "#f42d18"}]
    }, {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [{"color": "#f42d18"}]
    }, {"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#81aaff"}]}]
};

let optionsStopWhenClick = {
//                zoom: 4,
    // removes map and satellite options from the page
    mapTypeControl: false,
    // Map begins at initial center
    center: initialCenter,
    styles: [{
        "featureType": "all",
        "elementType": "labels",
        "stylers": [{"visibility": "off"}]
    }, {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [{"visibility": "off"}]
    }, {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [{"visibility": "off"}]
    }, {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [{"color": "#f42d18"}]
    }, {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [{"color": "#f42d18"}, {"weight": 1.2}]
    }, {
        "featureType": "administrative.locality",
        "elementType": "geometry.fill",
        "stylers": [{"lightness": "-1"}]
    }, {
        "featureType": "administrative.neighborhood",
        "elementType": "labels.text.fill",
        "stylers": [{"lightness": "0"}, {"saturation": "0"}]
    }, {
        "featureType": "administrative.neighborhood",
        "elementType": "labels.text.stroke",
        "stylers": [{"weight": "0.01"}]
    }, {
        "featureType": "administrative.land_parcel",
        "elementType": "labels.text.stroke",
        "stylers": [{"weight": "0.01"}]
    }, {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [{"color": "#f42d18"}]
    }, {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [{"color": "#f42d18"}]
    }, {
        "featureType": "road",
        "elementType": "geometry.stroke",
        "stylers": [{"visibility": "off"}]
    }, {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [{"color": "#f42d18"}]
    }, {
        "featureType": "road.highway.controlled_access",
        "elementType": "geometry.stroke",
        "stylers": [{"color": "#f42d18"}]
    }, {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [{"color": "#f42d18"}]
    }, {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [{"color": "#f42d18"}]
    }, {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [{"color": "#f42d18"}]
    }, {"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#81aaff"}]}],
    draggable: false,
    scrollwheel: false,
    disableDoubleClickZoom: true
};

function initMap() {
    // New map

    let map = new google.maps.Map(document.getElementById('map'), optionsBeg);

    // Listen for click on map
    google.maps.event.addListener(map, 'click', function (event) {

        // cannot click on again if new map is set
        map = new google.maps.Map(document.getElementById('map'), optionsBeg);

        //  Calls geocode to get the longitude and latitude from an axios call for each random state capital
        let randomCoords = geocode(location);
        alert(randomCoords);

        // Saves the latitude and logitude of the click
        eventLat = event.latLng.lat();
        eventLng = event.latLng.lng();

        // Add marker
        addMarker({coords: event.latLng});

    });

    function geocode(location) {
        // Prevent actual submit
//                e.preventDefault();

        axios.get('https://maps.googleapis.com/maps/api/geocode/json', {
            params: {
                address: location,
                // key: env('GOOGLE_MAP_API_KEY')       ******************************
            }
        })
            .then(function (response) {
                // Log full response
                console.log(response);

                // Geometry
                let mygeolat = response.data.results[0].geometry.location.lat;
                let mygeolng = response.data.results[0].geometry.location.lng;
            })
            .catch(function (error) {
                console.log(error);
            });
        return newCoords;
    };

    // Add marker
    let marker = new google.maps.Marker({
        position: {lat: mygeolat, lng: mygeolng},
        map: map,
        icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
    });
    /*
     let infoWindow = new google.maps.InfoWindow({
     content:'<h1>Lynn MA</h1>'
     });

     marker.addListener('click', function(){
     infoWindow.open(map, marker);
     });
     */

    // Array of markers
    let markers = [
        {
            coords: {lat: 42.4668, lng: -70.9495},
            iconImage: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
            content: '<h1>Lynn MA</h1>'
        },
        {
            coords: {lat: 42.8584, lng: -70.9300},
            content: '<h1>Amesbury MA</h1>'
        },
        {
            coords: {lat: 42.7762, lng: -71.0773}
        }
    ];

//            // Loop through markers
//            for(let i = 0;i < markers.length;i++){
//                // Add marker
//                addMarker(markers[i]);
//            }

    // Add Marker Function
    function addMarker(props) {
        let marker = new google.maps.Marker({
            position: props.coords,
            map: map,
            //icon:props.iconImage
        });

        // Check for customicon
        if (props.iconImage) {
            // Set icon image
            marker.setIcon(props.iconImage);
        }

        // Check content
        if (props.content) {
            let infoWindow = new google.maps.InfoWindow({
                content: props.content
            });

            marker.addListener('click', function () {
                infoWindow.open(map, marker);
            });
        }
    } // end of addMarker function
}
