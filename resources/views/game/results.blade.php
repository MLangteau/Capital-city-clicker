@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>Game Results!</h1>
    </div>
    <div class="container">

        <h2>Number of Correct Answers: {{$u_count_correct}}</h2>
        <h2>Number of Incorrect Answers: {{$u_count_incorrect}}</h2>
        <h2>Number of Questions Answered: {{$u_count_total}}</h2>

        <button class="results-btn"><a href="/game1">Press to Play Again!</a></button>
        <button class="results-btn"><a href="/home">Go to Games Menu!</a></button>


    </div>
@endsection