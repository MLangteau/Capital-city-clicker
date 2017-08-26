@extends('layouts.app')
{{--@component('components.who')--}}
{{--@endcomponent--}}
@section('content')

    <div class="menuTitle">
        Games Menu!
    </div>
    @if(count($games) > 0)
        {{--<div class="all-games">--}}
            @foreach($games as $game)
                <div class="col-lg-4 col-md-4 col-sm-9 games-rect">
                    <strong class="gm-title">{{$game->name}}</strong><br><br>
                    <small>{{$game->description}}</small><hr>
                    @if ($game->status)
                        <button class="gm-btn btn-lg"><a href="/game{{$game->id}}">Press to Play!</a></button>
                    @else
                        {{--<button class="gm-btn btn-lg"><a href="/game3">Press to Play!</a></button>--}}
                    @endif
                </div>
            @endforeach
        {{--</div>--}}
    @else
        <p>No Games found</p>
    @endif

@endsection