@extends('layouts.app')
<!--{{--@component('components.who')--}}-->
<!--{{--@endcomponent--}}-->
@section('content')
    <div class="panel-heading">
        <div class="text-center quiz-rect">
            <h1>Click as CLOSE to the State Capital as possible!</h1>
            <h3>Find: {{$capitalIs->body}}, {{$capST->body}}</h3>
        </div>
    </div>
@endsection