$(document).ready(function () {

//  Near the center of the USA (including Hawaii and Alaska)
    let initialCenter = {
        lat: 40.498621,
        lng: -128.54201
    };
//  Near the center of the contiguous USA
    // let initialCenter = {
    //     lat: 39.498621,
    //     lng: -98.54201
    // };

    let optionsBeg = {
        zoom: 3,
        // removes map and satellite options from the page
        mapTypeControl: false,
        maxZoom:10,
        minZoom:3,
        // Map begins at initial center
        center: initialCenter,
        styles: [
            //  makes the thick yellow lines for the interstate roads thinner
            {   "featureType": "road",
                "elementType": "geometry.stroke",
                "stylers": [{"visibility": "off"}]
            },
            // places dotted line borders on each of the state lines (not a whole outline)
            {   "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{"color": "#c9323b"}, {"weight": 1.2}]
            },

            //  This one is to unLABEL various cities
            {   "featureType": "administrative.locality",
                                    "elementType": "labels",
                    "stylers": [{"visibility": "off"}]
            }
            //,
            //   FOR LATER USE
            //  This one is to unLABEL each state in the USA as well as other areas of the world
            // {   "featureType": "administrative.province",
            //                         "elementType": "labels",
            //         "stylers": [{"visibility": "off"}]
            // }
        ]
    };

    let optionsStopWhenClick = {
        // removes map and satellite options from the page
        mapTypeControl: false,
        // Map begins at initial center
        center: initialCenter,
        // scrollwheel: false,
        // draggable: false,
        disableDoubleClickZoom: true,
        styles: [
            //  makes the thick yellow lines for the interstate roads thinner
            {   "featureType": "road",
                "elementType": "geometry.stroke",
                "stylers": [{"visibility": "off"}]
            },
            // places dotted line borders on each of the state lines (not a whole outline)
            {   "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{"color": "#c9323b"}, {"weight": 1.2}]
            },

            //  This one is to unLABEL various cities
            {   "featureType": "administrative.locality",
                "elementType": "labels",
                "stylers": [{"visibility": "off"}]
            }
        //,
        //   FOR LATER USE
        //  This one is to unLABEL each state in the USA as well as other areas of the world
        // {   "featureType": "administrative.province",
        //                         "elementType": "labels",
        //         "stylers": [{"visibility": "off"}]
        // }
        ]
    };

    let map = new google.maps.Map(document.getElementById('map'), optionsBeg);

    google.maps.event.addListener(map, 'click', function (event) {
        // alert('click');
        // cannot click on again if new map is set
        map = new google.maps.Map(document.getElementById('map'), optionsStopWhenClick);

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