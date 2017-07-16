@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>Game Results!</h1>
    </div>
    <div class="container">

        <h2>Correct Answers: {{$u_count_correct}}</h2>
        <h2>Incorrect Answers: {{$u_count_incorrect}}</h2>

        <h2>Questions Answered: {{$u_count_total}}</h2>

        <button class="results-btn"><a href="/game1">Press to Play Again!</a></button>
        <button class="results-btn"><a href="/home">Go to Games Menu!</a></button>

        <h2>RESULTS for questions answered:</h2>

        <?php
        for($i=0; $i < count($actualArray); $i++){
            echo ("<h4>". $questionsArray[$i]."</h4>");
            if ($actualArray[$i] == $chosenArray[$i]){
                echo ("<p>You Chose Correctly: ". $actualArray[$i]."</p>");
            }
            else {
                echo ("<p>Incorrect: <s>". $chosenArray[$i]."</s> Correct: ". $actualArray[$i]."</p>");
            }
        }
        ?>
    </div>
@endsection