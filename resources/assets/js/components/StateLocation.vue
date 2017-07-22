<script>

    export default {
        data () {
            return {
                location: {
//                    lat: 39.498621,
//                    lng: -98.54201
                    lat: 49.498621,
                    lng: -798.54201
                }
            }
        },
        markers: [{

        }],
        methods: {
            setPlace(place){
//                this.location = {
//                    ????????
//                }
            },

            markerDrag (position){

            }
        }
    }

</script>

<template>
    <div id="StateLocation__Wrapper">
        <h3 class="map-notes">Click as CLOSE to the State Capital as possible! Find: {{$capitalIs->body}}
            , {{$capST->body}}</h3>


        <?php
    $randomCity = $capitalIs->body;
        $randomST = $capST->body;
        $location = $randomCity . ", " . $randomST;
        ?>

        <div id="map"></div>

    </div>
</template>