@extends('layouts.app')
<!--{{--@component('components.who')--}}-->
<!--{{--@endcomponent--}}-->
@section('content')

        <h3 class="map-notes">Click as CLOSE to the State Capital as possible! Find: {{$capitalIs->body}}
        , {{$capST->body}}</h3>

        <?php
        $randomCity = $capitalIs->body;
        $randomST = $capST->body;
        $location = $randomCity . ", " . $randomST;
        ?>

        <div id="map"></div>

    {{--<state-location></state-location>--}}

@endsection

{{-- For Google Script Only for certain pages --}}
@section('footer-script')


@endsection

@section('header-styles')
    {{--<style>--}}
        {{--#map {--}}
            {{--height: 400px;--}}
            {{--width: 90%;--}}
        {{--}--}}
    {{--</style>--}}
@endsection