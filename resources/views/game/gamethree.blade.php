@extends('layouts.app')
<!--{{--@component('components.who')--}}-->
<!--{{--@endcomponent--}}-->
@section('content')

    <div class="text-center">
        <h1>GAMES THAT ARE COMING SOON!</h1>
        <hr>
    </div>
    @if(count($games) > 0)
        <div class="all-games">
            @foreach($games as $game)
                {{--HELLO {{$id}}--}}
                @if (($game->id) > 2)
                <div class="col-lg-4 col-md-4 col-sm-9 quiz-rect">
                    <h1>{{$game->name}}</h1>
                </div>
                @endif
            @endforeach
        </div>
    @else
        <p>No Games found</p>
    @endif
@endsection