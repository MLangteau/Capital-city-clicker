@extends('layouts.app')
<!--{{--@component('components.who')--}}-->
<!--{{--@endcomponent--}}-->
@section('content')
<div>
    <div id="floating-panel">****<strong>  Directions:  </strong>****<br><strong>1. Zoom</strong> In/Out or <strong> Scroll</strong> to
        <strong> {{$location}}</strong> then <br><strong>Click on </strong>that State Capital:<br>2. After you click
        </strong>the Capital, <strong> Click on red marker (Your click) and flag (Capital)</strong>
        <br>
        <button class="results-btn btn-success"><a href="/game2">Reset this Game</a></button><br>
        <button class="results-btn btn-success"><a href="/home">Go to Games Menu!</a></button>
    </div>
    <input type="hidden" value="<?php echo $location; ?>" id="real_location" />
    <input type="hidden" value="<?php echo $capitalIs->body; ?>" id="real_capital" />
    <input type="hidden" value="<?php echo $capitalIs->lat; ?>" id="real_lat" />
    <input type="hidden" value="<?php echo $capitalIs->lng; ?>" id="real_lng" />
    <input type="hidden" value="<?php echo $capST->body; ?>" id="real_state" />

    <div id="map"></div>

    {{--<state-location></state-location>--}}
</div>
@endsection

{{-- For Google Script Only for certain pages ; The folowing section is for javascript--}}
@section('footer-script')
<script type="javascript">

</script>

@endsection

@section('header-styles')

    <style>
        body {
            background: white;
        }

        #map {
            /*height: 560px;*/
            height: 42em;
            width: 100%;
        }

        #floating-panel {
            top: 30%;
            left: 2%;
            border: 3px solid blue;
            position: absolute;
            z-index: 5;
            background-color: #fff;
            color: #2b542c;
            padding: 5px;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
            opacity: .6;
        }

        #Alaska_pointer {
            top: 15%;
            left: 10%;
            border: 3px solid red;
            position: absolute;
            z-index: 5;
            background-color: #fff;
            color: #2b542c;
            padding: 5px;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
            opacity: .6;
        }

        #Hawaii_pointer {
            top: 55%;
            left: 10%;
            border: 3px solid red;
            position: absolute;
            z-index: 5;
            background-color: #fff;
            color: #2b542c;
            padding: 5px;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
            opacity: .6;
        }
    </style>
@endsection