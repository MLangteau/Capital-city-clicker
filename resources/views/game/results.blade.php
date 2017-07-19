@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>Game Results!</h1>
    </div>
    <div class="container">

        <h2>Correct Answers: {{$u_count_correct}} Incorrect Answers: {{$u_count_incorrect}} Questions Answered: {{$u_count_total}}</h2>

        <button class="results-btn"><a href="/game1">Press to Play Again!</a></button>
        <button class="results-btn"><a href="/home">Go to Games Menu!</a></button>

        {{--<h2>RESULTS for questions answered:</h2>--}}

        <?php
        $percentCorrect = round(($u_count_correct/$u_count_total) * 100);
        if ($percentCorrect > 80){
            echo("<h2>"."Percentage correct for questions answered:  ".$percentCorrect."%     FANTASTIC :) !</h2>");
        }
        else
            if ($percentCorrect > 60){
            echo("<h2>"."Percentage correct for questions answered: ".$percentCorrect."% Almost Great.</h2>");
        }
        else
            {
            echo("<h2>"."Percentage correct for questions answered: ".$percentCorrect."% Better Luck Next Time.</h2>");
        }
        for($i=0; $i < count($actualArray); $i++){
            echo ("<h4>". $questionsArray[$i]."</h4>");
            if ($actualArray[$i] == $chosenArray[$i]){
                echo ("<p>Yay: <strong style='background-color: green; color:white'>".$actualArray[$i]."</strong></p>");
            }
            else {
                echo ("<p><s><strong style='background-color: red; color:white'>".$chosenArray[$i].
                    "</strong></s> Corrected: <strong style='background-color: green; color:white'>".
                    $actualArray[$i]."</strong></p>");
            }
        }
        ?>
    </div>
@endsection