@extends('layouts.app')
@component('components.who')
@endcomponent
@section('content')
    <div class="text-center">
        <h1>Games Dashboard!</h1>
    </div>
    @if(count($games) > 0)
        @foreach($games as $game)
            <div class="col-lg-4 col-md-4 col-sm-9 quiz-rect">
                <strong class="gm-title">{{$game->id}} {{$game->name}}</strong><hr>
                <small>{{$game->description}}</small><hr>
                <button class="gm-btn"><a href="/games/{{$game->id}}">Press to Play!</a></button>
            </div>
        @endforeach
    @else
        <p>No Games found</p>
    @endif
@endsection