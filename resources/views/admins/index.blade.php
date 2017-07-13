@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        ADMIN Dashboard
                    </div>
                    <div class="panel-body">
                        @component('components.who')
                        @endcomponent
                        @if(count($games) > 0)
                            <div class="all-games">
                                @foreach($games as $game)
                                    <div class="col-lg-4 col-md-4 col-sm-9 quiz-rect">
                                        <strong class="gm-title">{{$game->name}}</strong><hr>
                                        <small>{{$game->description}}</small><hr>
                                        @if ($game->status)
                                            <button class="gm-btn"><a href="/games/{{$game->id}}">Press to Play!</a></button>
                                        @else
                                            <button class="gm-btn"><a href="/games/3">Press to Play!</a></button>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>No Games found</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
