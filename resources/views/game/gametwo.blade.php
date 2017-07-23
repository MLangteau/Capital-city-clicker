@extends('layouts.app')
<!--{{--@component('components.who')--}}-->
<!--{{--@endcomponent--}}-->
@section('content')
<div>
        <div id="floating-panel">*********<br>Click State Capital:<br> {{$capitalIs->body}}
        , {{$capST->body}} <br> **** </div>

        <?php
        $randomCity = $capitalIs->body;
        $randomST = $capST->body;
        $location = $randomCity . ", " . $randomST;
        ?>

        <div id="map"></div>

    {{--<state-location></state-location>--}}
</div>
@endsection

{{-- For Google Script Only for certain pages --}}
@section('footer-script')


@endsection

@section('header-styles')

    <style>
        body {
            background: white;
        }
        #map {
            height: 600px;
            width: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        /*html, body {*/
            /*height: 100%;*/
            /*margin: 0;*/
            /*padding: 0;*/
        /*}*/
        #floating-panel {
            position: absolute;
            top: 40%;
            left: 2%;
            z-index: 5;
            background-color: #fff;
            color: #2b542c;
            padding: 5px;
            border: 3px solid red;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }
        /*#mapper_notes {*/
            /*opacity: 1;*/
            /*color: white;*/
            /*border-color: red;*/
        /*}*/

    </style>
    {{--<style>--}}
        {{--#map {--}}
            {{--height: 400px;--}}
            {{--width: 90%;--}}
        {{--}--}}
    {{--</style>--}}
@endsection