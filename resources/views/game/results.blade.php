@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>Game Results!</h1>
    </div>
    <div class="container result">

        <h3>Correct Answers: {{$u_count_correct}} Incorrect Answers: {{$u_count_incorrect}} Questions Answered: {{$u_count_total}}</h3>

        <?php
            $percentCorrect = 0;
            if ($u_count_total > 0) {
                $percentCorrect = round(($u_count_correct/$u_count_total) * 100);
                if ($percentCorrect > 80){
                    echo("<h3>"."Percentage correct for questions answered:  ".$percentCorrect."% FANTASTIC SCORE!</h3>");
                }
                else
                    if ($percentCorrect > 60){
                    echo("<h3>"."Percentage correct for questions answered: ".$percentCorrect."% Almost Great.</h3>");
                }
                else
                    {
                    echo("<h3>"."Percentage correct for questions answered: ".$percentCorrect."% You may need a refresher on Geography.</h3>");
                }
                for($i=0; $i < count($actualArray); $i++){
                    echo ("<h4>State: ". $questionsArray[$i]."</h4>");
                    if ($actualArray[$i] == $chosenArray[$i]){
                        echo ("<p>Yay: <strong style='background-color: green; color:white'>".$actualArray[$i]."</strong></p><hr>");
                    }
                    else {
                        echo ("<p><s><strong style='background-color: red; color:white'>".$chosenArray[$i].
                            "</strong></s> Corrected: <strong style='background-color: green; color:white'>".
                            $actualArray[$i]."</strong></p><hr>");
                    }
                }
            }
        ?>
        <button class="results-btn btn-success"><a href="/game1">Press to Play Again!</a></button><br>
        <button class="results-btn btn-success"><a href="/home">Go to Games Menu!</a></button>
    </div>

@endsection