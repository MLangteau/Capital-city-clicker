@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>In the questions Array</h1>
    </div>

    {{--@if(count($questions) > 0)--}}
        {{--<div class="all-questions">--}}
            {{--@foreach($questions as $question)--}}
                {{--<div class="col-lg-4 col-md-4 col-sm-9 quiz-rect">--}}
                    {{--<strong class="gm-title">{{$question->name}}</strong><hr>--}}
                    {{--<small>{{$question->description}}</small><hr>--}}
                    {{--@if ($question->status)--}}
                        {{--<button class="gm-btn"><a href="/question{{$question->id}}">Press to Play!</a></button>--}}
                    {{--@else--}}
                        {{--<button class="gm-btn"><a href="/question3">Press to Play!</a></button>--}}
                    {{--@endif--}}


                    <form action="php-forms-get-post-checkbox-radio-data.php" method="post">

                        Why don't they play poker in the jungle?<br>
                        <input type="radio" name="jungle" value="treefrog"> Too many tree frogs.<br>
                        <input type="radio" name="jungle" value="cheetah"> Too many cheetahs.<br>
                        <input type="radio" name="jungle" value="river"> Too many rivers.<br><br>

                        {{--Check the box if you want your answer to be graded:--}}
                        {{--<input type="checkbox" name="grade" value="yes"><br><br>--}}

                        <input type="submit" name="submit" value="Submit"><br>

                    </form>

                    <?php
                    if (isset($_POST['submit'])) {
//                        if (!empty($_POST['grade'])) { /* Grade the question. */ }
//                        else { echo "Your answer will not be graded."; }
                    } else { echo "Please submit the form."; }
                    ?>

                    <?php
                    if (isset($_POST['submit'])) {
//                        if (!empty($_POST['grade'])) {
                            if (!empty($_POST['jungle'])) { /* Get Radio Button Value */ }
                            else { echo "You did not choose an answer."; }
//                        } else { echo "Your answer will not be graded."; }
                    } else { echo "Please submit the form."; }
                    ?>

                    <?php
                    if (isset($_POST['submit'])) {
//                        if (!empty($_POST['grade'])) {
                            if (!empty($_POST['jungle'])) {
                                if ($_POST['jungle']=="cheetah") { echo "You got the right answer!"; }
                                else { echo "Sorry, wrong answer."; }
                            } else { echo "You did not choose an answer."; }
//                        } else { echo "Your answer will not be graded."; }
                    } else { echo "Please submit the form."; }
                    ?>

                {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--@else--}}
        {{--<p>No Games found</p>--}}
    {{--@endif--}}

@endsection