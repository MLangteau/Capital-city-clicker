$(document).ready(function () {

//  Near the center of the United States (including Hawaii and Alaska), with screen adjustment
    let initialCenter = {
        lat: 39.598621,
        lng: -115.54201
    };
//  Near the Geographical center of the contiguous United States
    // let initialCenter = {
    //     lat: 39.833333,
    //     lng: -98.585522
    // };

    let optionsBeg = {
        zoom: 4,
        maxZoom:10,
        minZoom:3,
        // Map begins at initial center
        center: initialCenter,
        styles: [
            // {   zoomControl: true,
            //     zoomControlOptions: {
            //     position: google.maps.ControlPosition.LEFT_TOP
            // }},
            {
                mapTypeControl: true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                    position: google.maps.ControlPosition.TOP_CENTER
                },
            },
            {
                scaleControl: true,
                streetViewControl: true,
                streetViewControlOptions: {
                    position: google.maps.ControlPosition.LEFT_TOP
                },
                // fullscreenControl: true
            },
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
            //   FOR LATER USE to take label off
            //  This is to take labels off of each state in the USA as well as other areas of the world
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
            // places dotted line borders on each of the state lines (not a full state outline)
            {   "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{"color": "#c9323b"}, {"weight": 1.2}]
            },

            //  This is to take labels off of various cities
            {   "featureType": "administrative.locality",
                "elementType": "labels",
                "stylers": [{"visibility": "off"}]
            }
        //,
            //   FOR LATER USE to take label off
            //  This is to take labels off of each state in the USA as well as other areas of the world
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
        map = new google.maps.Map(document.getElementById('map'), optionsBeg);

        //  The following passes the values from the blade to javaScript (hidden input on blade)

        // location is just the combination of the real capital and state
        let location = $("#real_location").val();
        console.log('location: ', location);

        let capital = $("#real_capital").val();
        console.log('real capital: ', capital);

        let state = $("#real_state").val();
        console.log('real state: ', state);

        let realLat = $("#real_lat").val();
        console.log('real lat: ', realLat);
        parseLat = parseFloat(realLat);

        let realLng = $("#real_lng").val();
        console.log('real lng: ', realLng);
        parseLng = parseFloat(realLng);

        // Saves the latitude and longitude of the click (for comparison)
        eventLat = event.latLng.lat();
        eventLng = event.latLng.lng();
        // console.log('eventLat: ', eventLat, 'eventLng: ', eventLng);

        // locality and political if you just want the city name. If you want states as well they are tagged with
        //     administrative_area_level_1 (google.maps geocoding - may use later)

        //  Capital location
        let latLngCap = new google.maps.LatLng(parseLat, parseLng);
        //  Clicked location
        let latLngEvent = new google.maps.LatLng(eventLat,eventLng);
        //  Calculate the distance between two points in miles
        let distance = google.maps.geometry.spherical.computeDistanceBetween(latLngCap, latLngEvent)*0.000621371192;

        // Array of markers
        let markers = [
            {
                coords:{lat: parseLat, lng: parseLng},
                content: '<h6>Actual Capital: '+ location +'</h6>'
            },
            {
                coords:{lat: eventLat, lng: eventLng},
                iconImage: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                content: '<h6>You were ' + Math.round(distance) + ' miles off</h6>'
            }
        ];

        // Loop through markers
        for(i = 0;i < markers.length;i++){
            // Add marker
            console.log('markers[i]: ',markers[i]);
            addMarker(markers[i]);
        }

        //Draws a line from the location of the Capital to the clicked location
        let line = new google.maps.Polyline({
            path: [
                new google.maps.LatLng(realLat, realLng),
                new google.maps.LatLng(eventLat, eventLng)
            ],
            strokeColor: "red",
            strokeWeight: 2,
            strokeOpacity: 1,
            map: map
        });

    });

    // Add Marker Function
    function addMarker(props){
        console.log('i: ',i);
        let marker = new google.maps.Marker({
            position:props.coords,
            map:map,
        });

        // Check for customicon
        if(props.iconImage){
            // Set icon image
            marker.setIcon(props.iconImage);
        }

        // Check content
        if(props.content){
            let infoWindow = new google.maps.InfoWindow({
                content:props.content
            });

            marker.addListener('click', function(){
                infoWindow.open(map, marker);
            });
        }
    }

    function toggleBounce() {
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }

});